<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersCreateRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'A') {

            $users = User::where('id', '!=', Auth::id())->get();

            return view('admin.users.index', compact('users'));

        }

        if (Auth::user()->role == 'S') {

            return redirect('/admin');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->role == 'A') {

            return view('admin.users.create');

        }

        if (Auth::user()->role == 'S') {

            return redirect('/admin');

        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersCreateRequest $request): RedirectResponse
    {
        //
        $input = $request->all();

        if ($file = $request->file('photo')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/users', $name);

            $input['photo'] = $name;

        }

        $input['password'] = bcrypt($request->password);

        $input['dob'] = date('Y/m/d', strtotime($request->dob));

        User::create($input);

        return redirect('admin/users')->with('added', 'User has been added');
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersUpdateRequest $request, int $id): RedirectResponse
    {

        $user = User::findOrFail($id);

        if ($request->password == '') {

            $input = $request->except('password');

        } else {
            $input = $request->all();
        }

        if ($file = $request->file('photo')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/users', $name);

            if ($user->photo) {

                unlink(public_path().'/images/users/'.$user->photo);

            }

            $input['photo'] = $name;

        }

        if (! $request->password == '') {

            $input['password'] = bcrypt($request->password);

        }
        $input['dob'] = date('Y/m/d', strtotime($request->dob));

        $user->update($input);

        return redirect('admin/users')->with('updated', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): RedirectResponse
    {

        $user = User::findOrFail($id);

        if ($user->photo) {

            unlink(public_path().'/images/users/'.$user->photo);

        }

        $user->delete();

        Session::flash('delete_user', 'User has been deleted');

        return redirect('admin/users')->with('deleted', 'User has been deleted');

    }
}
