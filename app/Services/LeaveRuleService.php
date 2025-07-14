<?php
namespace App\Services;

use App\Models\LeaveRule;

class LeaveRuleService
{
    public function getAll()
    {
        return LeaveRule::all();
    }

    public function create($data)
    {
        return LeaveRule::create($data);
    }

    public function getById($id)
    {
        return LeaveRule::findOrFail($id);
    }

    public function update($id, $data)
    {
        $rule = LeaveRule::findOrFail($id);
        $rule->update($data);
        return $rule;
    }

    public function delete($id)
    {
        LeaveRule::destroy($id);
    }
}

