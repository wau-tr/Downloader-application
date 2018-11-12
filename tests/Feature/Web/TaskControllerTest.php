<?php

namespace Tests\Feature\Web;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Traits\TaskTestTrait;
use Illuminate\Support\Facades\Queue;

/**
 * Class for testing resource task controller.
 */
class TaskControllerTest extends TestCase
{

    use TaskTestTrait;

    /**
     * Tests GET /tasks.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->call('GET', 'tasks');
        $response->assertViewIs('tasks.index');
    }

    /**
     * Tests POST /tasks.
     *
     * @return void
     */
    public function testStore() 
    {
        Queue::fake();
        $task = $this->createTask()->toArray();
        $response = $this->json('POST', $this->webEndpoint, $task);
        Queue::assertPushed($this->taskJob);
        ($this->model)::destroy($task['id']);
        $response
            ->assertRedirect('tasks');
    }




}
