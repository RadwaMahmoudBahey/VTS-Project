<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VacationRequest extends Model
{
    use HasFactory;
    protected $table = 'vacation_requests';
    protected $primaryKey = 'request_id';

    protected $fillable = [
        'title',
        'status',
        'request_date',
        'start_date',
        'end_date',
        'vacation_duration',
        'description',
        'leave_type',
        'employee_id',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
