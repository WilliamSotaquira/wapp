<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SprintRequest;
use App\Models\Sprint;
use Illuminate\Http\Request;

class SprintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sprints = Sprint::select()->orderBy('id', 'desc')->get();

        return view('admin.sprints.index', compact('sprints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sprints.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SprintRequest $request)
    {
        $sprint = new Sprint();
        $sprint->name = $request->name;
        $sprint->workhours = $request->workhours;
        $sprint->start_date = $request->start_date;
        $sprint->end_date = $request->end_date;
        $sprint->save();

        session()->flash('flash.banner', 'Sprint created successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.sprints.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function show(Sprint $sprint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function edit(Sprint $sprint)
    {
        return view('admin.sprints.edit', compact('sprint'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function update(SprintRequest $request, Sprint $sprint)
    {
        // return $request->all();

        $sprint->update($request->all());

        session()->flash('flash.banner', 'Sprint updated successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.sprints.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sprint  $sprint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sprint $sprint)
    {
        $sprint->delete();

        session()->flash('flash.banner', 'Sprint deleted successfully!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('admin.sprints.index');
    }
}
