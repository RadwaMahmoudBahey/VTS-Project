<?php
// === app/Http/Controllers/Api/VacationRequestController.php ===
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VacationRequest;
use Illuminate\Http\Request;
use App\Services\VacationRequestService;
class VacationRequestController extends Controller
{
    protected $vacationRequestService;

    public function __construct(VacationRequestService $vacationRequestService)
    {
        $this->vacationRequestService = $vacationRequestService;
    }

    public function index()
    {
        return response()->json($this->vacationRequestService->getAll());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'employee_id' => 'required|exists:employees,employee_id',
            'leave_type' => 'required|string',
            'title' => 'required|string',
            'status' => 'nullable|string',
            'request_date' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'description' => 'nullable|string'
        ]);
        $data['vacation_duration'] = $this->vacationRequestService->GetDuration((object)$data);
        return response()->json($this->vacationRequestService->create($data), 201);
    }

    public function show($id)
    {
        return response()->json($this->vacationRequestService->getById($id));
    }

    public function update(Request $request, $id)
    {
        return response()->json($this->vacationRequestService->update($id, $request->all()));
    }

    public function destroy($id)
    {
        $this->vacationRequestService->delete($id);
        return response()->json(['message' => "Deletion of Vacation Request with id {$id} was successful."], 200);
    }

    public function GetallVacations($id)
    {
        return $this->vacationRequestService->getAllByEmployeeId($id);
    }
    
}
