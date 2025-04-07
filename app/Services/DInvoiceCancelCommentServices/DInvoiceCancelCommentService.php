<?php

namespace App\Services\DInvoiceCancelCommentServices;

use App\Enums\DInvoiceCancelCommentEnum\DInvoiceCancelCommentState;
use App\Models\DInvoiceCancelComment;

class DInvoiceCancelCommentService
{
    public function __construct(private DInvoiceCancelComment $dInvoiceCancelComment)
    {
    }

    public function create(array $data)
    {
        return $this->dInvoiceCancelComment::create($data);

    }

    public function edit(array $data, DInvoiceCancelComment $dInvoiceCancelComment)
    {
        return $dInvoiceCancelComment->update($data);
    }

    public function delete(DInvoiceCancelComment $dInvoiceCancelComment): void
    {
        $dInvoiceCancelComment->delete();
    }

    public function getById(int $id)
    {
        return $this->dInvoiceCancelComment::find($id);
    }

    public function getAll($filters)
    {
        return collection($this->dInvoiceCancelComment, ($filters));
    }

    public function commentTraited($dInvoiceCancelComment){

        $dInvoiceCancelComment->update([
            'state'=>DInvoiceCancelCommentState::TRAITED->value
        ]);

    }
}
