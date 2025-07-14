<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRule extends Model
{
    use HasFactory;
    protected $table = 'leave_rules';
    protected $primaryKey = 'rule_id';

    protected $fillable = [
        'role_name',
        'annual_leave',
        'sick_leave',
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'role_name', 'role_name');
    }
}
