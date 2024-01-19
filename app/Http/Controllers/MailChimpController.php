<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Auth;
use Newsletter;

class MailChimpController extends Controller
{
  
   public function subscribe(Request $request)
    {
      	$this->validate($request, [
  	    	'email' => 'required|email',
        ]);

        // try {
        //     $this->mailchimp->lists->subscribe($this->listId,['email' => $request->input('email')]);
        //     return redirect()->back()->with('added','Email Subscribed successfully');
        // }
        // catch (\Mailchimp_List_AlreadySubscribed $e) {
        //     return redirect()->back()->with('error','Email is Already Subscribed');
        // }
        // catch (\Mailchimp_Error $e) {
        //     return redirect()->back()->with('error','Error from MailChimp');
        // }

        if(env('MAILCHIMP_API_KEY') != NULL && env('MAILCHIMP_LIST_ID') != NULL){

            $check = Newsletter::isSubscribed($request->email);

            if ($check == 1) {
                
                return redirect()->back()->with('error','Your email already has been subscribed!');

            } else {

                $subscribe_email = Newsletter::subscribe($request->email);

                if (isset($subscribe_email)) {
                    return redirect()->back()->with('added','Your email has been subscribe successfully!');
                } else {
                   return redirect()->back()->with('error','Please check your email!');
                }

            }
        }else{
            return redirect()->back()->with('error','Mailchimp keys are not available');
        }

       
    }

}
