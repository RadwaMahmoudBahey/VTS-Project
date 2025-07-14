<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\LeaveRuleService;

class LeaveRuleController extends Controller
{
    protected $leaveRuleService;

    public function __construct(LeaveRuleService $leaveRuleService)
    {
        $this->leaveRuleService = $leaveRuleService;
    }

    public function index()
    {
        return response()->json($this->leaveRuleService->getAll());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'rule_name' => 'required|string',
            'annual_leave' => 'required|integer',
            'sick_leave' => 'required|integer'
        ]);
        return response()->json($this->leaveRuleService->create($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->leaveRuleService->getById($id));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->leaveRuleService->update($id, $request->all()));
    }

    public function destroy($id)
    {
        $this->leaveRuleService->delete($id);
        return response()->json(null, 204);
    }
}