<?php

namespace App\Traits;

use App\Models\Task;
use App\Jobs\ProcessTask;

/**
 * Task trait. DRY.
 */
trait TaskTrait
{

    /**
     * Creates Task instance and dispatch job.
     *
     * @param array $data
     *  Data for creating task.
     * 
     * @return App\Models\Task
     *  Task object.
     */
    public function createTask(array $data)
    {
        $task = Task::create($data);
        ProcessTask::dispatch($task);
        return $task;
    }
}