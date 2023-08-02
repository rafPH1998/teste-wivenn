<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Department::orderBy('id', 'DESC')->get();
        return response()->json(['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentRequest $request)
    {
        $data = $request->validated();
        $response = Department::query()->create($data);
        return response()->json(['data' => $response]); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Department::query()->find($id);

        if (!$response) {
            return response()->json(['error' => 'Departamento não encontrado!'], 404);
        }
        return response()->json(['data' => $response]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentRequest $request, string $id)
    {
        $response = Department::query()->find($id);

        if (!$response) {
            return response()->json(['error' => 'Departamento não encontrado!'], 404);
        }

        return response()->json([
            'data'    => $response->update($request->validated()),
            'message' => 'Departamento atualizado com sucesso!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Department::query()->find($id);

        if (!$response) {
            return response()->json(['error' => 'Departamento não encontrado!'], 404);
        }

        return response()->json([
            'data'    => $response->delete(),
            'message' => 'Departamento deletado com sucesso!'
        ]);
    }
}
