<?php

namespace App\Http\Controllers;

use App\Models\Appointment_user;
use App\Models\Payment_mode;
use App\Models\Washing_price;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $payments = Appointment_user::all();
        $washing_prices = Washing_price::all();
        $payment_mode_lists = Payment_mode::pluck('mode', 'id')->all();

        return view('admin.payment.index', compact('payments', 'washing_prices', 'payment_mode_lists'));
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
        //
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
        $payment = Appointment_user::findOrFail($id);

        $input = $request->all();

        $payment->update($input);

        return back()->with('updated', 'Payment Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $payment = Appointment_user::findOrFail($id);

        $payment->delete();

        return back()->with('deleted', 'Payment Has Been Deleted');
    }
}
