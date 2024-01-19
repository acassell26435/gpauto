<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class HelpController extends Controller
{
    public function getremove_public()
    {
        return view('admin.help.removepublic');
    }

    public function remove_public()
    {
        $getstatus = @file_get_contents('../.htaccess');
        if (! $getstatus) {
            $code = '<IfModule mod_rewrite.c>
                RewriteEngine On
                RewriteRule ^(.*)$ public/$1 [L]
              </IfModule>';
            @file_put_contents('../.htaccess', $code);

            return back()->with('added', 'Remove public from URL Successfully!');
        } else {
            return back()->with('updated', 'Already Remove public from URL!');
        }
    }

    public function clearcahe()
    {
        try {
            Artisan::call('cache:clear');
            Artisan::call('view:cache');
            Artisan::call('view:clear');

            return back()->with('added', 'Clear cache Successfully! ');
        } catch (\Exception $e) {
            return back()->with('deleted', $e->getMessage());
        }
    }

    public function system_status()
    {
        return view('admin.help.systemstatus');
    }
}
