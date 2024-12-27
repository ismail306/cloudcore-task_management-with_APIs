<?php

namespace App\Repository;

use App\Http\Resources\Task as TaskResource;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use App\Traits\ApiResponser;
use Exception;

class TaskRepository implements TaskInterface
{
    use ApiResponser;

    public function all($request)
    {
        try {
            $task = new Task();

            // Filter by status
            $validStatuses = ['Pending', 'In Progress', 'Completed'];
            if ($request->has('status') && in_array($request->get('status'), $validStatuses)) {
                $task = $task->where('status', $request->get('status'));
            }

            // Sorting by due_date
            $validSortTypes = ['ASC', 'DESC', 'asc', 'desc'];
            $sortType = $request->has('sortType') && in_array($request->get('sortType'), $validSortTypes) ? $request->get('sortType') : 'ASC';

            // Apply sorting based on sortType, default to 'ASC' if not provided
            $task = $task->orderBy('due_date', $sortType);

            // Pagination
            $tasks = $task->paginate(100);

            return $this->successResponse(TaskResource::collection($tasks), 'Tasks fetched successfully!', 200);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to fetch tasks.');
        }
    }



    public function store(array $data)
    {
        try {
            $task = Task::create($data);
            return $this->successResponse(new TaskResource($task), 'Task created successfully!');
        } catch (Exception $e) {
            return $this->errorResponse('Failed to create task.', 400);
        }
    }



    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);
            return $this->successResponse(new TaskResource($task), 'Task fetched successfully!', 200);
        } catch (Exception $e) {
            return $this->errorResponse('Failed to fetch task.', 400);
        }
    }

    public function update(array $data, $task)
    {
        try {
            $task->update($data);
            return $this->successResponse(new TaskResource($task), 'Task updated successfully!');
        } catch (Exception $e) {
            return $this->errorResponse('Failed to update task.', 400);
        }
    }

    public function destroy($id)
    {
        try {

            $task = Task::findOrFail($id);
            $task->delete();
            return $this->successResponse(null, 'Task deleted successfully!');
        } catch (Exception $e) {
            return $this->errorResponse('Failed to delete task.', 400);
        }
    }
}
