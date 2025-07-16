<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\EmployeeService;

class EmployeeController extends Controller
{
    protected $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index()
    {
        return response()->json($this->employeeService->getAll());
    }

    function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:employees,email',
            'role_name' => 'required|exists:leave_rules,role_name',
            'manager_id' => 'nullable|exists:employees,id'
        ]);
        return response()->json($this->employeeService->create($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->employeeService->getById($id));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return response()->json($this->employeeService->update($id, $data));
    }

    public function destroy($id)
    {
        $this->employeeService->delete($id);
        return response()->json(['message' => "Deletion of Employee with id {$id} was successful."], 200);
    }
}

