<?php

namespace App\Services\DProjectWorkServices;

use App\Models\DProjectWork;

class DProjectWorkService
{
    public function __construct()
    {
    }

    public function create(array $data)
    {
        return DProjectWork::create($data);
    }

    public function edit(array $data, DProjectWork $dProjectWork)
    {
        // if (isset($data['document'])) {
        //     (new DDocumentService())->attachDocuments(
        //         $dProjectWork->project,
        //         ['file' => $data['document'], 'name' => $data['name']],
        //         'd_work_id',
        //         null,
        //         // $dProjectWork->work->id
        //     );
        // }
        return $dProjectWork->update($data);
    }

    public function delete(DProjectWork $dProjectWork): void
    {
        $dProjectWork->delete();
    }

    public function getById(int $id)
    {
        return DProjectWork::find($id);
    }

    public function getAll($filters)
    {
        return collection(DProjectWork::class, $filters);
    }
}
