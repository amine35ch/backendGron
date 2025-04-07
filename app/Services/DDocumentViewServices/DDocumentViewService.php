<?php

namespace App\Services\DDocumentViewServices;

use App\Models\DDocumentView;

use Illuminate\Database\Eloquent\Collection;

class DDocumentViewService
{
    public function __construct(private DDocumentView $dDocumentView)
    {
    }

    public function create($dProject,$pDocument)
    {
        $user=auth()->user();
        $dProjectDocument=$dProject->documents->where('type_doc',$pDocument->type)->first();
        $dDocumentView=$dProjectDocument->viewDocuments->where('user_id',$user->id)->where('version_count',$dProjectDocument->version_count)->first();
        if (!$dDocumentView) {
            $data=[
                'user_id'=>$user->id,
                'd_project_document_id'=>$dProjectDocument->id,
                'version_count'=>$dProjectDocument->version_count
            ];
            return $this->dDocumentView::create($data);
        }
        return true;
    }

    public function edit(array $data, DDocumentView $dDocumentView)
    {
      return  $dDocumentView->update($data);
    }

    public function delete(DDocumentView $dDocumentView): void
    {
        $dDocumentView->delete();
    }

    public function getById(int $id)
    {
        return $this->dDocumentView::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dDocumentView,$filters);
    }

}
