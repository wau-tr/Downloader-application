<?php

namespace App\Console\Commands\Task;

use Illuminate\Console\Command;
use App\Models\Task;
use Illuminate\Support\Collection;


/**
 * Class of artisan command for showing all tasks.
 */
class ShowTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Shows all tasks with statuses.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tasks = Task::all();
        ($tasks->count()) ? $this->showTasks($tasks) : $this->info('No tasks.');
    }

    /**
     * Shows all tasks in table.
     *
     * @param \Illuminate\Support\Collection $tasks
     *  Tasks collection.
     */
    private function showTasks(Collection $tasks)
    {
        $headers = ['id', 'status', 'url'];
        $rows = $tasks->map(function ($item, $key) {
            return [
                'id' => $item->id,
                'status' => $item->status,
                'url' => $item->getResourceUrl(),
            ];
        });
        $this->table($headers, $rows);
    }

}
