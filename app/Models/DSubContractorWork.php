<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DSubContractorWork extends Model
{
    use HasFactory;

    protected $fillable = [
        'd_third_party_id',
        'd_sub_constractor_id',
    ];
}
