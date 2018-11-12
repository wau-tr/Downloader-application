<?php

namespace App\Http\Controllers\Web;

use App\Jobs\ProcessTask;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Http\Controllers\Controller;
use App\Traits\TaskTrait;

/**
 * Resource controller for tasks.
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
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreTask $request
     *  Request object.
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {
        $this->createTask($request->all());
        return redirect()->route('tasks.index');
    }

}
