<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProcessTask implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        $event->task->update(['status' => 'downloading']);
        $event->task
            ->addMediaFromUrl($this->task->getAttribute('url'))
            ->toMediaCollection('resource');
        $event->task->update(['status' => 'complete']);
    }

    /**
     * Handle a job failure.
     *
     * @param  \App\Events\TaskCreated  $event
     * @param  \Exception  $exception
     * @return void
     */
    public function failed(TaskCreated $event, $exception)
    {
        $event->task->update(['status' => 'error']);
    }
}
