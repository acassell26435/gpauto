<?php

namespace App\Http\Controllers;

use App\Models\Company_social;
use App\Models\Contact;
use App\Models\Opening_hour;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Mail;

class contactMailController extends Controller
{
    public function index(): View
    {
        $company_socials = Company_social::all();
        $services = Service::all();
        $opening_times = Opening_hour::all();
        $contacts = Contact::all();

        return view('contact', compact('company_socials', 'services', 'opening_times', 'contacts'));
    }

    public function send(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'mail_message' => 'required|min:10',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'mail_message' => $request->mail_message,
        ];

        Mail::send('emails.contact_mail', compact('data'), function ($message) use ($data) {
            $message->from($data['email']);
            $message->to(env('MAIL_USERNAME'));
            $message->subject($data['subject']);
        });

        return back()->with('added', 'Email Send Successfully...');
    }
}
