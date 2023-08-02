<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('department')->orderBy('id', 'DESC')->get();
        return EmployeeResource::collection($employees);
    }

    public function store(EmployeeRequest $request)
    {
        $employee = Employee::query()->create($request->validated());
        return response()->json(['data' => $employee]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showEmployee = Employee::query()
                ->with('department')
                ->find($id);

        if (!$showEmployee) {
            return response()->json(['error' => 'Funcionário não encontrado!'], 404);
        }

        return new EmployeeResource($showEmployee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {
        $updateEmployee = Employee::query()->find($id);

        if (!$updateEmployee) {
            return response()->json(['error' => 'Funcionário não encontrado!'], 404);
        }

        return response()->json([
            'data'    => $updateEmployee->update($request->validated()),
            'message' => 'Funcionário atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::query()->find($id);

        if (!$employee) {
            return response()->json(['error' => 'Funcionário não encontrado!'], 404);
        }

        return response()->json([
            'data'    => $employee->delete(),
            'message' => 'Funcionário deletado com sucesso!'
        ]);
    }
}
