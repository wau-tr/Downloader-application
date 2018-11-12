<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Models\Task;

/**
 * Job for dowloading resource by url of task.
 */
class ProcessTask implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    protected $task;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Task $task)
    {
        $this->task = $task;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle( )
    {
        $this->task->update(['status' => 'downloading']);
        try{
            $this->task
                ->addMediaFromUrl($this->task->url)
                ->toMediaCollection('resource');
            $this->task->update(['status' => 'complete']);
        } catch (\Exception $e) {
            $this->failed($e);
        }
       
    }


     /**
      * The job failed to process.
      *
      * @param  Exception $exception
      * @return void
      */
    public function failed($exception)
    {
        $this->task
            ->update(['status' => 'error']);
    }
  
}
