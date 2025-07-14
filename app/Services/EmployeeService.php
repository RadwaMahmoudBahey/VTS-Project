<?php
namespace App\Services;

use App\Models\Employee;

class EmployeeService
{
    public function getAll()
    {
        return Employee::with('leaveRule', 'manager')->get();
    }

    public function create($data)
    {
        return Employee::create($data);
    }

    public function getById($id)
    {
        return Employee::with('leaveRule', 'manager')->findOrFail($id);
    }

    public function update($id, $data)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($data);
        return $employee;
    }

    public function delete($id)
    {
        Employee::destroy($id);
    }
}


