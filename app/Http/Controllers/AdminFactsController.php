<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Facts;
use Illuminate\Http\Request;

class AdminFactsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $facts = Facts::all();

        return view('admin.facts.index', compact('facts'));
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

        Facts::create($input);

        return back()->with('added', 'Facts has been added');
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
        $fact = Facts::findOrFail($id);

        $input = $request->all();

        $fact->update($input);

        return back()->with('updated', 'Facts has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $fact = Facts::findOrFail($id);

        $fact->delete();

        return back()->with('deleted', 'Facts has been deleted');
    }
}
