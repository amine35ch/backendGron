<?php

namespace App\Services\BasketServices;

use App\Enums\RoleEnum\RoleEnum;
use App\Enums\UserEnum\UserProfileEnum;
use App\Models\DClient;
use App\Models\DProjectOperation;
use App\Models\PArticleType;

class BasketService
{
    public function __construct()
    {
    }

    // public function getAll($model)
    // {
    //     if ($model) {
    //         $model = class_basename($model);
    //         $modelClassName = "App\\Models\\{$model}";
    //         $user = auth()->user();
    //         if ($model == 'User') {
    //             $collectionModel = $modelClassName::where('userable_id', $user->userable_id)->onlyTrashed()->get();

    //         } elseif ($model == 'DCompany') {
    //             $collectionModel = $modelClassName::onlyTrashed()->whereHas('company.parentCompany', function ($query) {
    //                 $query->where('id', getMarCompany()[0]);
    //             })->get();
    //         } else {
    //             $collectionModel = $modelClassName::onlyTrashed()->where('d_company_id', getMarCompany()[0])->get();
    //         }
    //         $collectionModel = $modelClassName::onlyTrashed()->get();
    //         $collectionModel->each(function ($item) use ($model) {
    //             $item->setAttribute('model', $model);
    //         });
    //     } else {
    //         $collectionModel = collect([]);
    //         $models = $this->listModels();
    //         $user = auth()->user();
    //         foreach ($models as $model) {
    //             $model = class_basename($model);
    //             $modelClassName = "App\\Models\\{$model}";
    //             if ($model == 'User') {

    //                 $list = $modelClassName::where('userable_id', $user->userable_id)->onlyTrashed()->get();

    //                 $list->each(function ($item) use ($model) {
    //                     $item->setAttribute('entitled', $item->username);
    //                     $item->setAttribute('model', $model);
    //                 });
    //             } elseif ($model == 'DCompany') {
    //                 $list = $modelClassName::onlyTrashed()->whereHas('parentCompany', function ($query) {
    //                     $query->where('id', getMarCompany()[0]);
    //                 })->get();
    //                 $list->each(function ($item) use ($model) {
    //                     $item->setAttribute('entitled', $item->reference);
    //                     $item->setAttribute('model', $model);
    //                 });
    //             } else {
    //                 $list = $modelClassName::onlyTrashed()->where('d_company_id', getMarCompany()[0])->get();
    //                 $list->each(function ($item) use ($model) {
    //                     if ($model == 'DArticle') {
    //                         $item->setAttribute('entitled', $item->designation);
    //                         $item->setAttribute('model', $model);

    //                     } else {
    //                         $item->setAttribute('entitled', $item->reference);
    //                         $item->setAttribute('model', $model);
    //                     }
    //                 });
    //             }
    //             $collectionModel = $collectionModel->merge($list);
    //         }
    //     }

    //     return $collectionModel;
    // }

    public function listModels()
    {
        return [
            'DCompany',
            'DProject',
            'DClient',
            'DArticle',
            'User',
        ];
    }

    public function getAll($model){
        if ($model) {
           return $this->basketFiltred($model);
        }
        else {
           return $this->basketNotFiltred();
        }
    }

    public function backRecord($model, $id)
    {
        $model = class_basename($model);
        $modelClassName = "App\\Models\\{$model}";
        $record = $modelClassName::find($id);
        $record = $modelClassName::withTrashed()->find($id);
        $record->restore();
        if ($model== 'DProject') {
            $dProjectOperations=DProjectOperation::withTrashed()->where('d_project_id',$id)->get();
            foreach ($dProjectOperations as $operation) {
                $operation->restore();
            }
        }
        return true;
    }

    public function basketFiltred($model){

        $model = class_basename($model);
        $modelClassName = "App\\Models\\{$model}";
        $user = auth()->user();
        if ($model == 'User') {
            $CompanyIds=$user->company->children->pluck('d_company_child_id');
            $CompanyIds[]=$user->userable_id;
            $collectionModel =  $modelClassName::query()->deletedBy()->whereIn('userable_id', $CompanyIds)->onlyTrashed()->with('deletedBy')->get();
            $collectionModel->each(function ($item) {
                $enum = strval($item->profile);
                $model = 'Utilisateur : ' . constant("App\\Enums\\UserEnum\\UserProfileEnum::".$enum)->value;
                $item->setAttribute('model',$model);
            });
        }
        elseif ($model == 'DCompany') {
            $collectionModel = $modelClassName::query()->deletedBy()->onlyTrashed()->with('deletedBy')->whereHas('parentCompany', function ($query) {
                $query->where('id', getMarCompany()[0]);
            })->get();

            $collectionModel->each(function ($item) {
                $enum = strval($item->profile);
                $model='Société : '.constant("App\\Enums\\UserEnum\\UserProfileEnum::".$enum)->value;
                $item->setAttribute('model',$model);
            });
        }
        else {
            $collectionModel = $modelClassName::query()->deletedBy()->onlyTrashed()->with('deletedBy')->whereIn('d_company_id', [getMarCompany()[0],auth()->user()->company->id])->get();
            if ($model == 'DArticle') {
                $collectionModel->each(function ($item) {
                    $type=PArticleType::where('type',$item->type)->first();
                    $model='Catalogue : '. $type->entitled;
                    $item->setAttribute('model',$model);
                });
            }
            elseif ($model == 'DProject') {
                $collectionModel->each(function ($item) {
                    $model='Dossier ';
                    $item->setAttribute('model',$model);
                });
            }
            elseif ($model == 'DClient') {
                $collectionModel->each(function ($item) {
                    $model='Client ';
                    $item->setAttribute('model',$model);
                });
            }
        }
        return $collectionModel;
    }

    public function basketNotFiltred(){

        $collectionModel = collect([]);
        $models = $this->listModels();
        $user = auth()->user();
        foreach ($models as $model) {
            $list=[];
            $model = class_basename($model);
            $modelClassName = "App\\Models\\{$model}";
            if ($model == 'User') {
                $CompanyIds=$user->company->children->pluck('d_company_child_id');
                $CompanyIds[]=$user->userable_id;
                $arrayRoles=[
                    RoleEnum::MARADM->value,
                    RoleEnum::MARCOl->value,
                    RoleEnum::MARINS->value,
                    RoleEnum::MARSUP->value,
                    RoleEnum::AUDADM->value,
                    RoleEnum::INSADM->value,
                    RoleEnum::INSINS->value,
                    RoleEnum::INSSUP->value,
                ];
                $list = $modelClassName::query()->deletedBy()->whereIn('userable_id', $CompanyIds)->whereHas('roles', function ($q) use ($arrayRoles) {
                    $q->whereIn('name', $arrayRoles);
                })->onlyTrashed()->with('deletedBy')->get();
                $list->each(function ($item) use($model) {
                    $item->setAttribute('modelReference',$model);
                    $item->setAttribute('entitled', $item->username);
                    $enum = strval($item->profile);
                    $model='Utilisateur : '.constant("App\\Enums\\UserEnum\\UserProfileEnum::".$enum)->value;
                    $item->setAttribute('model',$model);
                });
            } elseif ($model == 'DCompany') {
                $list = $modelClassName::query()->deletedBy()->onlyTrashed()->with('deletedBy')->whereHas('parentCompany', function ($query) {
                    $query->where('id', getMarCompany()[0]);
                })->get();
                $list->each(function ($item) use($model) {
                    $item->setAttribute('modelReference',$model);
                    $item->setAttribute('entitled', $item->reference);
                    $enum = strval($item->profile);
                    $model='Société : '.constant("App\\Enums\\UserEnum\\UserProfileEnum::".$enum)->value;
                    $item->setAttribute('model',$model);
                });
            } else {
                $list = $modelClassName::query()->deletedBy()->onlyTrashed()->with('deletedBy')->whereIn('d_company_id', [getMarCompany()[0],auth()->user()->company->id])->get();
                $list->each(function ($item) use ($model) {
                    if ($model == 'DArticle') {
                        $item->setAttribute('entitled', $item->designation);
                        $type=PArticleType::where('type',$item->type)->first();
                        $item->setAttribute('modelReference',$model);
                        $model='Catalogue : '. $type->entitled;
                        $item->setAttribute('model',$model);
                    }
                    elseif ($model == 'DProject') {
                            $item->setAttribute('modelReference',$model);
                            $item->setAttribute('entitled', $item->reference);
                            $model='Dossier ';
                            $item->setAttribute('model',$model);

                    }
                    elseif ($model == 'DClient') {

                            $item->setAttribute('modelReference',$model);
                            $item->setAttribute('entitled', $item->reference);
                            $model='Client ';
                            $item->setAttribute('model',$model);

                    }
                });
            }

            $collectionModel = $collectionModel->merge($list);

        }
        return $collectionModel;
    }

    public function forceDelete($model,$id){

        $model = class_basename($model);
        $modelClassName = "App\\Models\\{$model}";
        $record = $modelClassName::withTrashed()->find($id);
        $record->forceDelete();

        return true;
    }
}
