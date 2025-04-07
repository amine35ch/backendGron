<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DInvoiceCancelComment extends Model
{
    use HasFactory;

    protected $fillable=[
        'comment',
        'd_project_id',
        'd_project_invoice_header_id',
        'state'
    ];
}
