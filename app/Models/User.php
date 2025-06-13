<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'first_name',
        'last_name', 
        'email',
        'password',
        'street',
        'city',
        'state',
        'country',
        'zip',
        'mobile',
        'phone',
        'organization_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relationships
    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function managedOrganization()
    {
        return $this->hasOne(Organization::class, 'user_id');
    }

    public function createdCandidates()
    {
        return $this->hasMany(Candidate::class, 'created_by');
    }

    // Helper Methods
    public function isSuperAdmin()
    {
        return $this->hasRole('superadmin');
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isOrganizationAdmin()
    {
        return $this->hasRole('organization-admin');
    }

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Scope for organization-specific queries
    public function scopeForOrganization($query, $organizationId)
    {
        return $query->where('organization_id', $organizationId);
    }
}