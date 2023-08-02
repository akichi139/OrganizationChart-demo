<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function jobPosition()
    {
        return $this->belongsTo(JobPosition::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function organizationUnits()
    {
        return $this->belongsToMany(OrganizationUnit::class, 'employee_has_organization_units', 'employee_id', 'organization_unit_id')->withPivot('start_date', 'job_role_id');
    }
}
