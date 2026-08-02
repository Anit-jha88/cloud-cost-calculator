<?php

namespace App\Services;

class Ec2CostCalculatorService
{
    /**
     * Calculate EC2 Monthly Cost
     */
    public function calculate(array $data): float
    {
        $instanceType = $data['instance_type'];

        $instances = (int) $data['instances'];

        $hours = (int) $data['hours'];

        $storage = (int) $data['storage'];

        // Get hourly price from config
        $hourlyRate = config('aws_pricing.ec2')[$instanceType] ?? 0;

        if ($hourlyRate == 0) {
            return 0;
        }

        // Get storage price
        $storageRate = config('aws_pricing.ebs')['gp3'] ?? 0;

        // Calculate compute cost
        $computeCost = $hourlyRate * $instances * $hours;

        // Calculate storage cost
        $storageCost = $storageRate * $storage;

        // Total monthly cost
        return round($computeCost + $storageCost, 2);
    }
}