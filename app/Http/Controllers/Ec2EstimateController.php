<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEc2EstimateRequest;
use App\Repositories\Ec2EstimateRepository;
use App\Services\Ec2CostCalculatorService;

class Ec2EstimateController extends Controller
{
    protected Ec2EstimateRepository $repository;

    protected Ec2CostCalculatorService $calculator;

    public function __construct(
        Ec2EstimateRepository $repository,
        Ec2CostCalculatorService $calculator
    ) {
        $this->repository = $repository;
        $this->calculator = $calculator;
    }

    public function index()
    {
        $search = request('search');

        $estimates = $this->repository->allByUser(auth()->id(), $search);

        return view('ec2.index', compact('estimates', 'search'));
    }

    public function create()
    {
         return view('ec2.create');
    }

    public function store(StoreEc2EstimateRequest $request)
    {
         $data = $request->validated();

    $data['user_id'] = auth()->id();

    $data['monthly_cost'] = $this->calculator->calculate($data);

    $this->repository->create($data);

    return redirect()
        ->route('ec2.index')
        ->with('success', 'EC2 Estimate created successfully.');
    }

    public function show(string $id)
    {
         $estimate = $this->repository->find($id);

         return view('ec2.show', compact('estimate'));
    }

    public function edit(string $id)
    {
        $estimate = $this->repository->find($id);

        return view('ec2.edit', compact('estimate'));
    }

    public function update(StoreEc2EstimateRequest $request, string $id)
    {
        $estimate = $this->repository->find($id);

        $data = $request->validated();

        $data['monthly_cost'] = $this->calculator->calculate($data);

        $this->repository->update($estimate, $data);

        return redirect()
        ->route('ec2.index')
        ->with('success', 'EC2 Estimate updated successfully.');
        }

    public function destroy(string $id)
    {
        $estimate = $this->repository->find($id);

        $this->repository->delete($estimate);

        return redirect()
        ->route('ec2.index')
        ->with('success', 'EC2 Estimate deleted successfully.');
   }


    public function calculate(StoreEc2EstimateRequest $request)
    {
        $cost = $this->calculator->calculate($request->validated());

        return response()->json([
            'cost' => $cost
        ]);
    }
}