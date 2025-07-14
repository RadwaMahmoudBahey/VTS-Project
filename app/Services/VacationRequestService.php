<?php
namespace App\Services;

use App\Models\VacationRequest;

class VacationRequestService
{
    public function getAll()
    {
        return VacationRequest::with('employee')->get();
    }

    public function create($data)
    {
        return VacationRequest::create($data);
    }

    public function getById($id)
    {
        return VacationRequest::with('employee')->findOrFail($id);
    }

    public function update($id, $data)
    {
        $vacation = VacationRequest::findOrFail($id);
        $vacation->update($data);
        return $vacation;
    }

    public function delete($id)
    {
        VacationRequest::destroy($id);
    }
}
