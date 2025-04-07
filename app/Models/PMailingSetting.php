<?php

namespace App\Models;

use App\Enums\DProjectEnum\P_mailing_type;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PMailingSetting extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'entitled'];

    // Define the casts to use the enum class for the 'type' and 'entitled' attributes

}
