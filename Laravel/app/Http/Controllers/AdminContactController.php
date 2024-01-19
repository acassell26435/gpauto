<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DotenvEditor;

class AdminContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::first();
        return view('admin.contact.index', compact('contacts'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'logo' => 'image|mimes:jpeg,png,jpg',
          'logo_two' => 'image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();

        $file = $request->file('logo');
        $file2 = $request->file('logo_two');

        $name = $file->getClientOriginalName();
        $name2 = $file2->getClientOriginalName();

        $file->move('images/logo', $name);
        $file2->move('images/logo', $name2);

        $input['logo'] = $name;
        $input['logo_two'] = $name2;

        Contact::create($input);

        return back()->with('added', 'Record Has Been Added');
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
    public function edit()
    {
        $contacts = Contact::first();
        return view('admin.contact.index', compact('contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'logo' => 'image|mimes:jpeg,png,jpg',
          'logo_two' => 'image|mimes:jpeg,png,jpg',
        ]);

        $contact = Contact::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('logo')) {

          $name = $file->getClientOriginalName();

          unlink(public_path(). '/images/logo/' . $contact->logo);

          $file->move('images/logo', $name);

           $input['logo'] = $name;

        }

        if ($file2 = $request->file('logo_two')) {

          $name2 = $file2->getClientOriginalName();

          unlink(public_path(). '/images/logo/' . $contact->logo_two);

          $file2->move('images/logo', $name2);
             $input['logo_two'] = $name2;

        }

       
     

        $input['inspect'] = isset($request->inspect) ? 1 : 0;
        $input['rightclick'] = isset($request->rightclick) ? 1 : 0;

        if (isset($request->APP_DEBUG)) {
            $env_update = DotenvEditor::setKeys(['APP_DEBUG' => 'true']);
        } else {
            $env_update = DotenvEditor::setKeys(['APP_DEBUG' => 'false']);
        }

        $env_update->save();

        $contact->update($input);

        return back()->with('updated', 'Record Has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);

        unlink(public_path() . '/images/logo/' . $contact->logo);

        $contact->delete();

        return back()->with('deleted', 'Record Has Been Deleted');
    }

    public function mail_setting(){
        $env_files = [
                        'MAIL_FROM_NAME' => env('MAIL_FROM_NAME'),
                        'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS'),
                        'MAIL_DRIVER' => env('MAIL_DRIVER'),
                        'MAIL_HOST' => env('MAIL_HOST'),
                        'MAIL_PORT' => env('MAIL_PORT'),
                        'MAIL_USERNAME' => env('MAIL_USERNAME'),
                        'MAIL_PASSWORD' => env('MAIL_PASSWORD'),
                        'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION'),
                        ];
        return view('admin.contact.mailsetting',compact('env_files'));
    }

    public function store_mail_setting(Request $request){

        $input = $request->all();
        $env_update = DotenvEditor::setKeys([
            'MAIL_FROM_NAME' => $request->MAIL_FROM_NAME,
            'MAIL_DRIVER' => $request->MAIL_DRIVER,
            'MAIL_HOST' => $request->MAIL_HOST,
            'MAIL_PORT' => $request->MAIL_PORT,
            'MAIL_USERNAME' => $request->MAIL_USERNAME,
            'MAIL_FROM_ADDRESS' => $string = preg_replace('/\s+/', '', $request->MAIL_FROM_ADDRESS),
            'MAIL_PASSWORD' => $request->MAIL_PASSWORD,
            'MAIL_ENCRYPTION' => $request->MAIL_ENCRYPTION,
        ]);
        $env_update->save();
         if ($env_update) {
            return back()->with('updated', 'Mail settings has been saved');
        } else {
            return back()->with('deleted', 'Mail settings could not be saved');
        }

       
    }


     public function mailchimp_setting(){
        $env_files = [
                        'MAILCHIMP_API_KEY' => env('MAILCHIMP_API_KEY'),
                        'MAILCHIMP_LIST_ID' => env('MAILCHIMP_LIST_ID'),
                        ];
        return view('admin.contact.mailchimp',compact('env_files'));
    }

    public function store_mailchimp_setting(Request $request){

        $input = $request->all();
        $env_update = DotenvEditor::setKeys([
            'MAILCHIMP_API_KEY' => $request->MAILCHIMP_API_KEY,
            'MAILCHIMP_LIST_ID' => $request->MAILCHIMP_LIST_ID,
        ]);
        $env_update->save();

         if ($env_update) {
            return back()->with('updated', 'Mail settings has been saved');
        } else {
            return back()->with('deleted', 'Mail settings could not be saved');
        }

       
    }
    

   

}
