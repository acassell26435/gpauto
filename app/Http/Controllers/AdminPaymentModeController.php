<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Payment_mode;
use Illuminate\Http\Request;

class AdminPaymentModeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $modes = Payment_mode::all();

        return view('admin.payment_mode.index', compact('modes'));
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

        Payment_mode::create($input);

        return back()->with('added', 'Payment mode added');
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
        $mode = Payment_mode::findOrFail($id);

        $input = $request->all();

        $mode->update($input);

        return back()->with('updated', 'Payment mode updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $mode = Payment_mode::findOrFail($id);

        $mode->delete();

        return back()->with('deleted', 'Payment mode deleted');
    }
}
