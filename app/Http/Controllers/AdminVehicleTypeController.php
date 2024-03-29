<?php

namespace App\Http\Controllers;

use App\Models\Vehicle_type;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminVehicleTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vehicle_types = Vehicle_type::all();

        return view('admin.vehicle_type.index', compact('vehicle_types'));
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

        Vehicle_type::create($input);

        return back()->with('added', 'Vehicle type added');
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
        $vehicle_type = Vehicle_type::findOrFail($id);

        $input = $request->all();

        $vehicle_type->update($input);

        return back()->with('updated', 'Vehicle type updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $vehicle_type = Vehicle_type::findOrFail($id);

        $vehicle_type->delete();

        return back()->with('deleted', 'Vehicle type deleted');
    }
}
