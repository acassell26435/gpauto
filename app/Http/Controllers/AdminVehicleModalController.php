<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Vehicle_company;
use App\Models\Vehicle_modal;
use Illuminate\Http\Request;

class AdminVehicleModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {

        $vehicle_companies = Vehicle_company::pluck('vehicle_company', 'id')->all();

        $vehicle_modals = Vehicle_modal::all();

        return view('admin.vehicle_modal.index', compact('vehicle_companies', 'vehicle_modals'));

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

        Vehicle_modal::create($input);

        return back()->with('added', 'Vehicle modal added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $vehicle_modal = Vehicle_modal::findOrFail($id);

        $input = $request->all();

        $vehicle_modal->update($input);

        return back()->with('updated', 'Vehicle modal updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $vehicle_modal = Vehicle_modal::findOrFail($id);

        $vehicle_modal->delete();

        return back()->with('deleted', 'Vehicle modal deleted');
    }
}
