<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Sprint;
use App\Models\Subtask;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::select()->orderBy('id', 'DESC')->get();
        $projects = Project::select()->orderBy('id', 'DESC')->get();
        $sprints = Sprint::select()->orderBy('id', 'DESC')->get();

        return view('admin.tasks.index', compact(['tasks', 'projects', 'sprints']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $sprints = Sprint::select()->orderBy('id', 'DESC')->get();

        $projects = Project::select()->orderBy('id', 'DESC')->get();
        return view('admin.tasks.create', compact('sprints', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->type = $request->type;
        $task->duration = $request->duration;
        $task->priority = $request->priority;
        $task->status = $request->status;
        $task->notes = $request->notes;
        $task->start_at = $request->start_at;
        $task->end_at = $request->end_at;
        $task->sprint_id = $request->sprint_id;
        $task->project_id = $request->project_id;
        $task->save();

        session()->flash('flash.banner', 'Task created successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {

        $sprint = Sprint::where('id', $task->sprint_id)->first();
        $project = Project::where('id', $task->project_id)->first();


        return view('admin.tasks.show', compact('task', 'sprint', 'project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();


        session()->flash('flash.banner', 'Wallets deleted successfully!');
        session()->flash('flash.bannerStyle', 'danger');

        return redirect()->route('admin.tasks.index');
    }
}
