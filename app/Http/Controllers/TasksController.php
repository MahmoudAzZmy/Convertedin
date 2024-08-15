<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Jobs\UpdateStatistics;
use App\Models\Statistic;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with('assigned_to', 'assigned_by')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admins = User::where('role', 'admin')->pluck('name', 'id')->prepend('Please Select', '');
        $employees = User::where('role', 'employee')->pluck('name', 'id')->prepend('Please Select', '');
        return view('tasks.create', compact('admins', 'employees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $task = Task::create($request->all());
        UpdateStatistics::dispatch($request['assigned_to_id']);

        return redirect()->route('tasks.index');
    }


    // public function statistics()
    // {
    //     $employees = User::withcount('tasks')->orderBy('tasks_count', 'desc')->take(10)->get();
    //     return view('tasks.statistics', compact('employees'));
    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
