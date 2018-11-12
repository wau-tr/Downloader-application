<?php

namespace Tests\Feature\Console;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Traits\TaskTestTrait;
use Illuminate\Support\Facades\Queue;

/**
 * Class for testing artisan command related to tasks.
 */
class TaskCommandsTest extends TestCase
{

    use TaskTestTrait;

    /**
     * Tests artisan task:create {url}.
     *
     * @return void
     */
    public function testCreateCommand()
    {
        Queue::fake();
        $task = $this->createTask();
        $this->artisan('task:create', ['url' => $task->url])
        ->assertExitCode(0);
        Queue::assertPushed($this->taskJob);
        ($this->model)::destroy($task['id']);
    }

    /**
     * Tests artisan task:all.
     * 
     * @return void
     */
    public function testAllCommand()
    {
        $this->artisan('task:all')
            ->assertExitCode(0);
    }
}
