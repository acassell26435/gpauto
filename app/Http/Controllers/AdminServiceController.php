<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //
        $services = Service::all();

        return view('admin.services.index', compact('services'));
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

        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();

        if ($file = $request->file('icon')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/services', $name);

            $input['icon'] = $name;

        }

        Service::create($input);

        return back()->with('added', 'Service has been added');
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

        $request->validate([
            'icon' => 'image|mimes:jpeg,png,jpg',
        ]);

        $service = Service::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('icon')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/services', $name);

            unlink(public_path().'images/services/'.$name);

            $input['icon'] = $name;

        }

        $service->update($input);

        return back()->with('updated', 'Service has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
        $service = Service::findOrFail($id);

        if ($service->icon) {

            unlink(public_path().'/images/services/'.$service->icon);

        }

        $service->delete();

        return back()->with('deleted', 'Service has been deleted');
    }
}
