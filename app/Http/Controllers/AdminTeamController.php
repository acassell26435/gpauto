<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamCreateRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Social_team;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $socials = Social_team::with('teams')->get();
        $teams = Team::all();

        return view('admin.team.index', compact('teams', 'socials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamCreateRequest $request): RedirectResponse
    {
        //
        $input = $request->all();

        if ($file = $request->file('photo')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/Teams', $name);

            $input['photo'] = $name;

        }

        $input['dob'] = date('Y/m/d', strtotime($request->dob));
        $input['join_date'] = date('Y/m/d', strtotime($request->join_date));

        Team::create($input);

        return redirect('admin/team')->with('added', 'Team Member added');
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
     */
    public function edit(int $id): View
    {
        //

        $team = Team::findOrFail($id);

        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, int $id): RedirectResponse
    {

        $team = Team::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('photo')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/teams', $name);

            if ($team->photo) {

                unlink(public_path().'/images/teams/'.$team->photo);

            }

            $input['photo'] = $name;

        }

        $input['dob'] = date('Y/m/d', strtotime($request->dob));
        $input['join_date'] = date('Y/m/d', strtotime($request->join_date));

        $team->update($input);

        return redirect('admin/team')->with('updated', 'Team Member Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {
        //
        $team = Team::findOrFail($id);

        if ($team->photo) {

            unlink(public_path().'/images/teams/'.$team->photo);

        }

        $team->delete();

        Session::flash('delete_user', 'User has been deleted');

        return redirect('admin/team')->with('deleted', 'Team Member deleted');
    }
}
