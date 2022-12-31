<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'employee_id',
        'password',
    ];

    // protected $attribute

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAuth() {
        return auth('web')->user();
    }

    /**
     * Order Permission
     */
    public function getOrderFieldPermissionsAttribute()
    {
        // 'report_number',
        // 'order_date',
        // 'order_project',
        // 'debitur_name',
        // 'asset_location',
        // 'report_type',
        // 'type_asset',
        // 'upload_spk',
        // 'grader_id',
        // 'finish_date',
        // 'status',
        $role_ids = Auth::user()
            ->roles()
            ->pluck('role_id')
            ->toArray();

        $permission = [];
        if (in_array(1, $role_ids)) {
            $permission = [
                'report_number',
                'order_date',
                'order_project',
                'debitur_name',
                'asset_location',
                'report_type',
                'type_asset',
                'upload_spk',
                'grader_id',
                'survey_date',
                'upload_survey',
                'checking_date',
                'reviewer_id',
                'finish_date',
                'status',
            ];
        } else if (in_array(2, $role_ids)) {
            $permission = [
                'report_number',
                'order_date',
                'order_project',
                'debitur_name',
                'asset_location',
                'report_type',
                'type_asset',
                'upload_spk',
                'status'
            ];
        } else if (in_array(3, $role_ids)) {
            $permission = [
                'status',
                'grader_id',
                'survey_date',

                'reviewer_id',
            ];
        } else if (in_array(4, $role_ids)) {
            $permission = [
                'status',
                'upload_survey',
                'checking_date'
            ];
        } else if (in_array(5, $role_ids)) {
            $permission = [
                'status',
                'finish_date'
            ];
        } else if (in_array(7, $role_ids)) {
            $permission = [
                'report_number',
                'order_date',
                'order_project',
                'debitur_name',
                'asset_location',
                'report_type',
                'type_asset',
                'upload_spk',
                'grader_id',
                'survey_date',
                'upload_survey',
                'checking_date',
                'reviewer_id',
                'finish_date',
                'status',
            ];
        }

        return $permission;
    }

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_accesses', 'user_id', 'role_id');
    }
}
