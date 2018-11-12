<?php

namespace Tests\Feature\API;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Task;
use Illuminate\Support\Testing\Fakes\QueueFake;
use Illuminate\Support\Facades\Queue;
use App\Jobs\ProcessTask;
use Tests\Traits\TaskTestTrait;

/**
 * Class for testing API resource controller.
 */
class TaskControllerTest extends TestCase
{

    use TaskTestTrait;

    /**
     * Tests POST /api/tasks.
     *
     * @return void
     */
    public function testStore()
    {
        Queue::fake();
        $task = $this->createTask()->toArray();
        $response = $this->json('POST', $this->apiEndpoint, $task);
        Queue::assertPushed($this->taskJob);
        ($this->model)::destroy($task['id']);
        $response
            ->assertStatus(201);
    }

    /**
     * Tests GET /api/tasks.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->json('GET', $this->apiEndpoint);
        $response
            ->assertStatus(200)
            ->assertJson(['data' => []]);
    }
}
