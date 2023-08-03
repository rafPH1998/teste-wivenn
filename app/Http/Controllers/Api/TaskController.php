<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('employee')->orderBy('id', 'DESC')->get();
        return TaskResource::collection($tasks);
    }

    public function store(TaskRequest $request)
    {
        $storeTask = Task::query()->create($request->validated());
        return response()->json(['data' => $storeTask]); 
    }

    public function show(string $taskId)
    {
        $task = Task::query()
                ->with('employee')
                ->find($taskId);

        if (!$task) {
            return response()->json(['error' => 'Tarefa não encontrada!'], 404);
        }

        return new TaskResource($task);
    }

    public function update(TaskRequest $request, string $taskId)
    {
        $task = Task::query()->find($taskId);

        if (!$task) {
            return response()->json(['error' => 'Tarefa não encontrada!'], 404);
        }

        return response()->json([
            'data'    => $task->update($request->validated()),
            'message' => 'Tarefa atualizada com sucesso!'
        ]);
    }

    public function destroy(string $taskId)
    {
        $task = Task::query()->find($taskId);

        if (!$task) {
            return response()->json(['error' => 'Tarefa não encontrada!'], 404);
        }

        return response()->json([
            'data'    => $task->delete(),
            'message' => 'Tarefa deletada com sucesso!'
        ]);
    }
}
