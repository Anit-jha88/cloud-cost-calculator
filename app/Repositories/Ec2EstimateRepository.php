<?php

namespace App\Repositories;

use App\Models\Ec2Estimate;

class Ec2EstimateRepository
{
    public function create(array $data)
    {
        return Ec2Estimate::create($data);
    }

    public function allByUser($userId, $search = null)
        {
            return \App\Models\Ec2Estimate::where('user_id', $userId)
                ->when($search, function ($query) use ($search) {
                    $query->where('instance_type', 'like', "%{$search}%")
                        ->orWhere('region', 'like', "%{$search}%")
                        ->orWhere('operating_system', 'like', "%{$search}%");
                })
                ->latest()
                ->paginate(10);
        }

    public function find($id)
    {
        return Ec2Estimate::findOrFail($id);
    }

    public function update(Ec2Estimate $estimate, array $data)
    {
        $estimate->update($data);

        return $estimate;
    }

    public function delete(Ec2Estimate $estimate)
    {
        return $estimate->delete();
    }
}