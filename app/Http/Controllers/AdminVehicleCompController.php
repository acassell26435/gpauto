<?php

namespace App\Http\Controllers;

use App\Models\Vehicle_company;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminVehicleCompController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $vehicle_companies = Vehicle_company::all();

        return view('admin.vehicle_company.index', compact('vehicle_companies'));
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

        Vehicle_company::create($input);

        return back()->with('added', 'The Vehicle Company Added');
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
        $vehicle_company = Vehicle_company::findOrFail($id);

        $input = $request->all();

        $vehicle_company->update($input);

        return back()->with('updated', 'Vehicle Company Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $vehicle_company = Vehicle_company::findOrFail($id);

        $vehicle_company->delete();

        return back()->with('deleted', 'Vechile Company Deleted');
    }
}
