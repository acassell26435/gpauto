<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Clients;
use App\Models\Company_social;
use App\Models\Contact;
use App\Models\Facts;
use App\Models\Gallery;
use App\Models\HomeSection;
use App\Models\HomeSlider;
use App\Models\Opening_hour;
use App\Models\Service;
use App\Models\Social_team;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Vehicle_company;
use App\Models\Vehicle_modal;
use App\Models\Vehicle_type;
use App\Models\Washing_plan;
use App\Models\Washing_plan_include;
use App\Models\Washing_price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $services = Service::all();
        $galleries = Gallery::all();
        $teams = Team::all();
        $facts = Facts::all();
        $testimonials = Testimonial::all();
        $socials = Social_team::with('teams')->get();
        $washing_plans = Washing_plan::all();
        $washing_includes = Washing_plan_include::with('washing_plan')->get();
        $washing_prices = Washing_price::all();
        $vehicle_companies = Vehicle_company::all();
        $Vehicle_modals = Vehicle_modal::all();
        $vehicle_types = Vehicle_type::all();
        $blogs = Blog::orderBy('id', 'DESC')->get();
        $clients = Clients::all();
        $opening_times = Opening_hour::all();
        $company_socials = Company_social::all();
        $contacts = Contact::all();
        $slider = HomeSlider::all();
        $homeSection = HomeSection::first();

        $washing_plan_lists = Washing_plan::pluck('name', 'id')->all();
        $vehicle_company_lists = Vehicle_company::pluck('vehicle_company', 'id')->all();
        $vehicle_modal_lists = Vehicle_modal::pluck('vehicle_modal', 'id')->all();
        $vehicle_type_lists = Vehicle_type::pluck('type', 'id')->all();

        return view('index', compact('galleries', 'services', 'teams', 'socials', 'facts', 'testimonials', 'washing_prices', 'washing_includes', 'washing_plans', 'washing_plan_lists', 'vehicle_company_lists', 'vehicle_modal_lists', 'contacts', 'vehicle_type_lists', 'blogs', 'clients', 'opening_times', 'company_socials', 'vehicle_types', 'slider', 'homeSection'));
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

        if (Auth::check()) {

            $input = $request->all();

            $user_name = User::findOrFail($input['user_id'])->name;
            $user_email = User::findOrFail($input['user_id'])->email;
            $washing_plan = Washing_plan::findOrFail($input['washing_plan_id'])->name;
            $vehicle_company = Vehicle_company::findOrFail($input['vehicle_company_id'])->vehicle_company;
            $vehicle_modal = Vehicle_modal::findOrFail($input['vehicle_modal_id'])->vehicle_modal;
            $vehicle_type = Vehicle_type::findOrFail($input['vehicle_types_id'])->type;
            $appointment_date = $input['appointment_date'];
            $time_frame = $input['time_frame'];

            $input['appointment_date'] = date('Y/m/d', strtotime($request->appointment_date));

            $new = Appointment::create($input);

            $user = User::findOrFail(Auth::user()->id);

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
                'time_frame' => $time_frame,
            ];

            Mail::send('emails.home_appointment_emails', compact('data'), function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'));
                $message->to($data['email']);
            });

            Mail::send('emails.home_appointment_emails', compact('data'), function ($message) {
                $message->to(env('MAIL_USERNAME'));
            });

            return back()->with('added', 'Appointment Has Been Booked Thanks!');

        } else {
            $password = bcrypt($request->password);

            $user = User::create(['name' => $request->email, 'email' => $request->email, 'password' => $password, 'sex' => $request->sex, 'dob' => $request->dob, 'mobile' => $request->mobile]);

            $input = $request->except(['name', 'email', 'password', 'sex', 'dob', 'mobile']);

            $input['user_id'] = $user->id;

            $input['appointment_date'] = date('Y/m/d', strtotime($request->appointment_date));

            $new = Appointment::create($input);

            $user = User::findOrFail($input['user_id']);

            $user->appointment()->save($new);

            if (env('MAIL_USERNAME') == '' && env('MAIL_PASSWORD') == '') {
                if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_token)) {
                    return back()->with('appointment_added', 'Appointment Has Been Booked!');
                }
            }

            $data = [
                'name' => $user_name,
                'email' => $user_email,
                'washing_plan' => $washing_plan,
                'vehicle_company' => $vehicle_company,
                'vehicle_modal' => $vehicle_modal,
                'vehicle_type' => $vehicle_type,
                'date' => $appointment_date,
                'time_frame' => $time_frame,
            ];

            Mail::send('emails.home_appointment_emails', compact('data'), function ($message) use ($data) {
                $message->from(env('MAIL_USERNAME'));
                $message->to($data['email']);
            });

            Mail::send('emails.home_appointment_emails', compact('data'), function ($message) {
                $message->to(env('MAIL_USERNAME'));
            });

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember_token)) {
                return back()->with('appointment_added', 'Appointment Has Been Booked Thanks With Email');
            }
        }

    }

    public function mailError()
    {
        return back()->with('error', 'Please Provide MailChimp API Key...!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        //
    }
}
