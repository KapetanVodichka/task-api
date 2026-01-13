<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $tasks = Task::query()->latest()->get();

        return TaskResource::collection($tasks);
    }

    public function show(int $id): TaskResource
    {
        $task = Task::query()->findOrFail($id);

        return new TaskResource($task);
    }

    public function store(StoreTaskRequest $request): TaskResource
    {
        $task = Task::query()->create($request->validated());

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, int $id): TaskResource
    {
        $task = Task::query()->findOrFail($id);
        $task->fill($request->validated());
        $task->save();

        return new TaskResource($task);
    }

    public function destroy(int $id): Response
    {
        $task = Task::query()->findOrFail($id);
        $task->delete();

        return response()->noContent();
    }
}
