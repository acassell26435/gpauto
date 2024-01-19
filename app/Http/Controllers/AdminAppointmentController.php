<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Status;
use App\User;
use App\Vehicle_company;
use App\Vehicle_modal;
use App\Vehicle_type;
use App\Washing_plan;
use App\Washing_price;
use Illuminate\Http\Request;
use Mail;
use PDF;

class AdminAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::pluck('name', 'id')->all();
        $vehicle_companies = Vehicle_company::pluck('vehicle_company', 'id')->all();
        $vehicle_modals = Vehicle_modal::pluck('vehicle_modal', 'id')->all();
        $vehicle_types = Vehicle_type::pluck('type', 'id')->all();
        $washing_plans = Washing_plan::pluck('name', 'id')->all();
        $status = Status::pluck('status', 'id')->all();
        $appointments = Appointment::all();
        $washing_prices = Washing_price::all();

        return view('admin.appointment.index', compact('users', 'vehicle_companies', 'vehicle_modals', 'vehicle_types', 'washing_plans', 'status', 'appointments', 'washing_prices'));

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

        $user_name = User::findOrFail($input['user_id'])->name;
        $user_email = User::findOrFail($input['user_id'])->email;
        $washing_plan = Washing_plan::findOrFail($input['washing_plan_id'])->name;
        $vehicle_company = Vehicle_company::findOrFail($input['vehicle_company_id'])->vehicle_company;
        $vehicle_modal = Vehicle_modal::findOrFail($input['vehicle_modal_id'])->vehicle_modal;
        $vehicle_type = Vehicle_type::findOrFail($input['vehicle_types_id'])->type;
        $appointment_date = $input['appointment_date'];
        $vehicle_no = $input['vehicle_no'];
        $time_frame = $input['time_frame'];

        $input['appointment_date'] = date('Y/m/d', strtotime($request->appointment_date));

        $new = Appointment::create($input);

        $user = User::findOrFail($request->user_id);

        $user->appointment()->save($new);

        if (env('MAIL_USERNAME') == '' && env('MAIL_PASSWORD') == '') {
            return back()->with('added', 'Your Appointment Has Been Booked');
        }

        $data = [
            'name' => $user_name,
            'email' => $user_email,
            'washing_plan' => $washing_plan,
            'vehicle_company' => $vehicle_company,
            'vehicle_modal' => $vehicle_modal,
            'vehicle_type' => $vehicle_type,
            'date' => $appointment_date,
            'vehicle_no' => $vehicle_no,
            'time_frame' => $time_frame,
        ];

        Mail::send('emails.appointment_emails', compact('data'), function ($message) use ($data) {
            $message->from(env('MAIL_USERNAME'));
            $message->to($data['email']);
        });

        Mail::send('emails.appointment_emails', compact('data'), function ($message) {
            $message->to(env('MAIL_USERNAME'));
        });

        return back()->with('added', 'Your Appointment Has Been Booked With Emails');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        $input = $request->all();

        $input['appointment_date'] = date('Y/m/d', strtotime($request->appointment_date));

        $appointment->update($input);

        return back()->with('updated', 'Appointment Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);

        $appointment->delete();

        return back()->with('deleted', 'Appointment Has Been Deleted');
    }

    public function report(Request $request)
    {

        return view('admin.report');
    }

    public function ajaxonLoad(Request $request)
    {

        $month = $request->month_id;
        $year = $request->year_id;

        $date = $request->date;

        $appointments = collect();

        if ($request->date == '') {

            $appointments[] = Appointment::orderby('created_at', 'desc')->get();
        } else {

            $appointments[] = Appointment::where('appointment_date', $date)->orderby('created_at', 'desc')->get();
        }

        $appointments = $appointments->flatten();

        if (! count($appointments)) {

            $appointments = '<table class="table table-hover teams-table">
                            <thead>
                              <tr class="info">
                                <th>Booking No.</th>
                                <th>customer Name</th>
                                <th>Services</th>
                                <th>Appointment Date</th>
                                <th>Time Frame</th>
                                <th>Status</th>
                                <th>Transaction Date</th>
                                
                              </tr>
                            </thead>
                                     <th colspan="7"> <center> <b> No Result Found </b> <center> <th>
                                              
                            </table>';

            return $appointments;

        } else {

        }

        return view('admin.data', compact('appointments'));

    }

    public function downloadPDF(Request $request)
    {
        //$appointments = Appointment::orderby('created_at','desc')->get();

        $date = $request->date;

        $appointments = collect();

        if ($request->date == '') {

            $appointments[] = Appointment::orderby('created_at', 'desc')->get();
        } else {

            $appointments[] = Appointment::where('appointment_date', $date)->orderby('created_at', 'desc')->get();
        }

        $appointments = $appointments->flatten();

        view()->share('appointments', $appointments);

        $pdf = PDF::loadView('admin/myPDF', $appointments);

        return $pdf->download('booking_report.pdf');

    }
}
