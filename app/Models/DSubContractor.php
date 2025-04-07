<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class DSubContractor extends Model
{
    use Filterable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'trade_name',
        'represented_gender',
        'type_raison_sociale',
        'represented_name',
        'position',
        'phone_number_1',
        'zip_code',
        'city',
        'phone_number_2',
        'email',
        'web_site',
        'signature',
        'image',
        'd_third_party_id',
        'profile',
    ];

    public function users(): MorphMany
    {
        return $this->morphMany(User::class, 'company');
    }

    public function getDirectoryPathAttribute()
    {
        return 'Sub-contractors/sub-contractor-'.$this->id;
    }

    public function getDownloadPathAttribute()
    {
        return url('web/sub-contractors/'.$this->id.'/download');
    }

    public function getExtensionAttribute()
    {
        return pathinfo($this->path, PATHINFO_EXTENSION);
    }
}
