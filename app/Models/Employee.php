<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'role_name',
        'manager_id',
    ];

    public function manager()
    {
        return $this->belongsTo(Employee::class, 'manager_id');
    }

    public function subordinates()
    {
        return $this->hasMany(Employee::class, 'manager_id');
    }

    public function leaveRule()
    {
        return $this->belongsTo(LeaveRule::class, 'role_name', 'role_name');
    }

    public function vacationRequests()
    {
        return $this->hasMany(VacationRequest::class, 'employee_id', 'employee_id');
    }
    
}
