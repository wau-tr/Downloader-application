<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskCollection;
use App\Models\Task;
use App\Http\Resources\Task as TaskResource;
use App\Http\Requests\StoreTask;
use App\Jobs\ProcessTask;
use App\Traits\TaskTrait;

/**
 * Resource task controller for API endpoints.
 */
class TaskController extends Controller
{

    use TaskTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        return response()
            ->json($this->createTask($request->all()), 201);
    }

}
