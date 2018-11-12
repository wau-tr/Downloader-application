<?php

namespace App\Console\Commands\Task;

use Illuminate\Console\Command;
use App\Models\Task;
use App\Jobs\ProcessTask;
use Illuminate\Support\Facades\Validator;
use App\Traits\TaskTrait;

/**
 * Class of artisan command for creating task.
 */
class CreateTask extends Command
{

    use TaskTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'task:create
    {url : The URL of the resuorce for dowload.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates task for downloading resource by url.';

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
        $validator = Validator::make($this->arguments(), $this->rules());
        if ($validator->fails()) {
            return $this->error($validator->messages());
        }
        $this->createTask($this->arguments());
        $this->info('Task created.');
    }

    /**
     * Retrieves validation rules.
     *
     * @return array
     *  Validation rules.
     */
    private function rules(): array 
    {
        return [
            'url' => 'required|url',
        ];
    }

}
