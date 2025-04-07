<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DMailing extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'd_mailings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'p_notification_id',
        'd_company_id',
        'status', // e.g., '1' or '0' default 0
        'statusWeb', // e.g., '1' or '0' default 0
    ];

    /**
     * Relationships
     */

    // Relationship to PNotification
    public function notification()
    {
        return $this->belongsTo(PNotification::class, 'p_notification_id');
    }

    // Relationship to DCompany
    public function company()
    {
        return $this->belongsTo(DCompany::class, 'd_company_id');
    }

    /**
     * Check if the mailing is activated.
     *
     * @return bool
     */
    public function isActivated()
    {
        return $this->status === 1;
    }

    /**
     * Check if the mailing is disabled.
     *
     * @return bool
     */
    public function isDisabled()
    {
        return $this->status === 0;
    }

    /**
     * Check if the platform notification is activated.
     *
     * @return bool
     */
    public function isPlatformActivated(): bool
    {
        return $this->statusWeb == 1;
    }

    /**
     * Check if the platform notification is disabled.
     *
     * @return bool
     */
    public function isPlatformDisabled(): bool
    {
        return $this->statusWeb == 0;
    }
}
