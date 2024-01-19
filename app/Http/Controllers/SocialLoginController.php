<?php

namespace App\Http\Controllers;

use App\SocialLogin;
use DotenvEditor;
use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    public function index()
    {
        $social_login = SocialLogin::first();
        $env_files = [
            'FACEBOOK_CLIENT_ID' => env('FACEBOOK_CLIENT_ID') ? env('FACEBOOK_CLIENT_ID') : '',
            'FACEBOOK_CLIENT_SECRET' => env('FACEBOOK_CLIENT_SECRET') ? env('FACEBOOK_CLIENT_SECRET') : '',
            'FACEBOOK_CALLBACK' => env('FACEBOOK_CALLBACK') ? env('FACEBOOK_CALLBACK') : '',
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID') ? env('GOOGLE_CLIENT_ID') : '',
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET') ? env('GOOGLE_CLIENT_SECRET') : '',
            'GOOGLE_CALLBACK' => env('GOOGLE_CALLBACK') ? env('GOOGLE_CALLBACK') : '',

        ];

        return view('admin.sociallogin.index', compact('social_login', 'env_files'));
    }

    public function facebook()
    {
        $env_files = [
            'FACEBOOK_CLIENT_ID' => env('FACEBOOK_CLIENT_ID') ? env('FACEBOOK_CLIENT_ID') : '',
            'FACEBOOK_CLIENT_SECRET' => env('FACEBOOK_CLIENT_SECRET') ? env('FACEBOOK_CLIENT_SECRET') : '',
            'FACEBOOK_CALLBACK' => env('FACEBOOK_CALLBACK') ? env('FACEBOOK_CALLBACK') : '',
            'GOOGLE_CLIENT_ID' => env('GOOGLE_CLIENT_ID') ? env('GOOGLE_CLIENT_ID') : '',
            'GOOGLE_CLIENT_SECRET' => env('GOOGLE_CLIENT_SECRET') ? env('GOOGLE_CLIENT_SECRET') : '',
            'GOOGLE_CALLBACK' => env('GOOGLE_CALLBACK') ? env('GOOGLE_CALLBACK') : '',
        ];

        return view('admin.sociallogin.index', compact('env_files'));

    }

    public function updateFacebookKey(Request $request)
    {
        //return $request;
        $input = $request->all();
        if (isset($request->fb_check)) {

            $request->validate([
                'FACEBOOK_CLIENT_ID' => 'required',
                'FACEBOOK_CLIENT_SECRET' => 'required',
                'FACEBOOK_CALLBACK' => 'required',
            ],
                [
                    'FACEBOOK_CLIENT_ID.required' => 'Forget to Enter Facebook client id',
                    'FACEBOOK_CLIENT_SECRET.required' => 'Forget to Enter Facebook client secret key',
                    'FACEBOOK_CALLBACK.required' => 'Forget to Enter Facebook Callback url',
                ]);
        }
        // some code

        $env_update = DotenvEditor::setKeys([
            'FACEBOOK_CLIENT_ID' => $request->FACEBOOK_CLIENT_ID,
            'FACEBOOK_CLIENT_SECRET' => $request->FACEBOOK_CLIENT_SECRET,
            'FACEBOOK_CALLBACK' => $request->FACEBOOK_CALLBACK,
        ]);

        if (isset($request->fb_check)) {
            SocialLogin::where('id', '=', 1)->update(['fb_login' => '1']);
        } else {
            SocialLogin::where('id', '=', 1)->update(['fb_login' => '0']);
        }
        $env_update->save();

        return back()->with('updated', 'Facebook Config Enabled');

    }

    public function updateGoogleKey(Request $request)
    {
        $input = $request->all();
        if (isset($request->google_login)) {

            $request->validate([
                'GOOGLE_CLIENT_ID' => 'required',
                'GOOGLE_CLIENT_SECRET' => 'required',
                'GOOGLE_CALLBACK' => 'required',
            ],
                [
                    'GOOGLE_CLIENT_ID.required' => 'Forget to Enter Google client id',
                    'GOOGLE_CLIENT_SECRET.required' => 'Forget to Enter Google client secret key',
                    'GOOGLE_CALLBACK.required' => 'Forget to Enter Google Callback url',
                ]);
        }
        // some code

        $env_update = DotenvEditor::setKeys([
            'GOOGLE_CLIENT_ID' => $request->GOOGLE_CLIENT_ID,
            'GOOGLE_CLIENT_SECRET' => $request->GOOGLE_CLIENT_SECRET,
            'GOOGLE_CALLBACK' => $request->GOOGLE_CALLBACK,
        ]);

        if (isset($request->google_login)) {
            SocialLogin::where('id', '=', 1)->update(['google_login' => 1]);
        } else {
            SocialLogin::where('id', '=', 1)->update(['google_login' => 0]);
        }

        $env_update->save();

        return back()->with('updated', 'Google Config updated');

    }
}
