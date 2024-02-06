<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Team;
use App\Models\Team_task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminTeamTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::pluck('name', 'id')->all();
        $teams = Team::pluck('name', 'id')->all();
        $statuses = Status::pluck('status', 'id')->all();
        $tasks = Team_task::all();

        return view('admin.team_task.index', compact('users', 'teams', 'statuses', 'tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Team_task::create($input);

        return back()->with('added', 'Task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $task = Team_task::findOrFail($id);

        $input = $request->all();

        $task->update($input);

        return back()->with('updated', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $task = Team_task::findOrFail($id);

        $task->delete();

        return back()->with('deleted', 'Task has been deleted');
    }
}
