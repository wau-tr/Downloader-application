<?php

namespace Tests\Traits;

use App\Models\Task;
use App\Jobs\ProcessTask;

/**
 * Traits for tests related to tasks.
 */
trait TaskTestTrait {

    /**
     * Task model class.
     *
     * @var class
     */
    protected $model = Task::class;

    /**
     * API tasks ednpoint.
     *
     * @var string
     */
    protected $apiEndpoint = 'api/tasks';
    
    /**
     * Web tasks endpoint.
     *
     * @var string
     */
    protected $webEndpoint = 'tasks';

    /**
     * Process task class.
     *
     * @var class
     */
    protected $taskJob = ProcessTask::class;

    /*
     * Uses the model factory to generate a fake entry.
     *
     * @return \App\Models\Task
     */
    public function createTask()
    {
        return factory($this->model)->create();
    }
}
