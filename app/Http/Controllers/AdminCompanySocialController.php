<?php

namespace App\Http\Controllers;

use App\Models\Company_social;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminCompanySocialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $socials = Company_social::all();

        return view('admin.company_social.index', compact('socials'));
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

        Company_social::create($input);

        return back()->with('added', 'Company social has been added');
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
        $social = Company_social::findOrFail($id);

        $input = $request->all();

        $social->update($input);

        return back()->with('updated', 'Company social has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $social = Company_social::findOrFail($id);

        $social->delete();

        return back()->with('deleted', 'Company social has been deleted');
    }
}
