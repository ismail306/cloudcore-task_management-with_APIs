<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Interfaces\TaskInterface;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskInterface $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }

    public function index(Request $request)
    {
        return $this->taskRepository->all($request);
    }


    public function show($task)
    {
        return $this->taskRepository->show($task);
    }


    public function store(TaskStoreRequest $request)
    {
        $parms = $request->all();
        return $this->taskRepository->store($parms);
    }

    public function update(Request $request, Task $task)
    {
        $parms = $request->all();

        return $this->taskRepository->update($parms, $task);
    }

    public function destroy($task)
    {
        return $this->taskRepository->destroy($task);
    }
}
