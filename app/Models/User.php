<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Enums\RoleEnum\RoleEnum;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

/**
 * @OA\Schema(
 *     schema="User",
 *     title="Utilisateur",
 *     description="Modèle d'utilisateur avec détails complets",
 *     @OA\Property(property="id", type="integer", format="int64", example=1, description="Identifiant unique de l'utilisateur"),
 *     @OA\Property(property="username", type="string", example="john.doe", description="Nom d'utilisateur"),
 *     @OA\Property(property="email", type="string", format="email", example="john.doe@example.com", description="Adresse email de l'utilisateur"),
 *     @OA\Property(property="first_name", type="string", example="John", description="Prénom de l'utilisateur"),
 *     @OA\Property(property="last_name", type="string", example="Doe", description="Nom de famille de l'utilisateur"),
 *     @OA\Property(property="full_name", type="string", example="John Doe", description="Nom complet de l'utilisateur"),
 *     @OA\Property(property="state", type="string", example="active", description="État du compte utilisateur"),
 *     @OA\Property(property="profile", type="string", example="ADM", description="Code du profil utilisateur"),
 *     @OA\Property(property="last_login", type="string", format="date-time", example="2023-05-30T14:30:00Z", description="Dernière connexion"),
 *     @OA\Property(property="ip", type="string", example="192.168.1.1", description="Dernière adresse IP connue"),
 *     @OA\Property(property="city", type="string", example="Paris", description="Ville de l'utilisateur"),
 *     @OA\Property(property="zip_code", type="string", example="75001", description="Code postal"),
 *     @OA\Property(property="phone_number", type="string", example="+33123456789", description="Numéro de téléphone"),
 *     @OA\Property(property="address", type="string", example="123 Rue de Paris", description="Adresse postale"),
 *     @OA\Property(property="signature", type="string", example="data:image/png;base64,...", description="Signature numérisée"),
 *     @OA\Property(property="role", type="string", example="admin", description="Rôle principal de l'utilisateur"),
 *     @OA\Property(property="display_role_name", type="string", example="Administrateur", description="Nom du rôle affiché"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00Z", description="Date de création du compte"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00Z", description="Date de dernière mise à jour"),
 *     @OA\Property(property="email_verified_at", type="string", format="date-time", nullable=true, example="2023-01-01T00:00:00Z", description="Date de vérification de l'email")
 * )
 * 
 * @OA\Schema(
 *     schema="UserList",
 *     title="Liste d'utilisateurs",
 *     description="Représentation d'une liste paginée d'utilisateurs",
 *     @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/User")),
 *     @OA\Property(property="current_page", type="integer", example=1),
 *     @OA\Property(property="per_page", type="integer", example=15),
 *     @OA\Property(property="total", type="integer", example=50),
 *     @OA\Property(property="last_page", type="integer", example=4)
 * )
 */
class User extends Authenticatable
{
    use Filterable, HasApiTokens, HasFactory, HasRoles, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'first_name',
        'last_name',
        'password',
        'state',
        'profile',
        'company_code',
        'userable_id',
        'userable_type',
        'last_login',
        'ip',
        'city',
        'zip_code',
        'phone_number',
        'address',
        'signature',
        'state',
        'auth',
        'deleted_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'company_code',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function scopeDeletedBy($query)
    {
        $user = auth()->user();
        $admins = $user->company->admins->pluck('id');
        if (!$user->hasRole(RoleEnum::MARADM->value)) {
            return $query->whereIn('deleted_by', $admins);
        }
        return $query;
    }
    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by', 'id')->withTrashed();
    }
    public function company(): MorphTo
    {
        return $this->morphTo('userable');
    }

    public function visits()
    {
        return $this->hasMany(DProjectVisit::class);
    }

    public function projectHistories(): MorphMany
    {
        return $this->morphMany(DProjectHistory::class, 'userable');
    }

    public function notifications(): MorphMany
    {
        return $this->morphMany(DNotification::class, 'userable');
    }

    public function operations()
    {
        return $this->belongsToMany(
            POperation::class,
            'd_user_operations'
        )
            ->withTimestamps();
    }

    public function getPermissionListAttribute()
    {
        $user = $this;

        return PResource::all()->map(function ($resource) use ($user) {
            $resourceTitle = $resource->local_fr;
            $resourceTitleEn = $resource->entitled;
            $authorized = false;
            $resourcePermissions = [];

            $permissions = $resource->permissions()->whereHas(
                'spatiePermission',
            )->get()->pluck('spatiePermission');
            foreach ($permissions as $permission) {
                $permissionEntitled = $permission->name;
                $hasPermission = $user->can($permissionEntitled);

                if (data_get($user->getRoleNames(), 0) === "VAE::admin") {
                    $hasPermission = true;
                }
                $resourcePermissions[] = [
                    'id' => $permission->id,
                    'name' => $permissionEntitled,
                    'authorized' => $hasPermission,
                ];
                if ($hasPermission || data_get($user->getRoleNames(), 0) === "VAE::admin") {
                    $authorized = true;
                }
            }

            return [
                'resource_name' => $resourceTitle,
                'resource_name_en' => $resourceTitleEn,
                'authorized' => $authorized,
                'permissions' => $resourcePermissions,
            ];
        }) ?? [];
    }

    public function pNotifications()
    {
        return $this->hasMany(PUserNotification::class, 'user_id');
    }

    public function teamUsers()
    {
        return $this->hasMany(
            TeamUser::class,
            'supervisor_id',
            'id'
        );
    }

    public function supervisor()
    {
        return $this->hasOne(
            TeamUser::class,
            'user_id',
            'id'
        );
    }

    public function userProfile()
    {
        return $this->belongsTo(PProfile::class, 'profile', 'reference');
    }

    public function getRoleAttribute()
    {
        return $this->roles[0]?->name ?? null;
    }

    public function getDisplayRoleNameAttribute()
    {
        return $this->roles[0]?->display_name ?? null;
    }
    public function viewDocuments()
    {
        return $this->hasMany(DDocumentView::class);
    }

    public function deletePreviousTokens()
    {
        $this->tokens->each(function ($token) {
            $token->delete();
        });
    }


    public function createNewToken()
    {
        $this->deletePreviousTokens();
        return $this->createToken('GRON Token')->accessToken;
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function generalNotification()
    {
        return $this->belongsToMany(DGeneralNotification::class, 'd_view_general_notifications', 'user_id', 'd_general_notification_id')->withPivot('viewed');
    }
}
