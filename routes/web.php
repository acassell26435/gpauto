<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AdminClientsController;
use App\Http\Controllers\AdminCompanySocialController;
use App\Http\Controllers\AdminFactsController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminOpeningHoursController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\AdminPaymentModeController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminTaskStatusController;
use App\Http\Controllers\AdminTeamController;
use App\Http\Controllers\AdminTeamSocialController;
use App\Http\Controllers\AdminTeamTaskController;
use App\Http\Controllers\AdminTestimonialController;
use App\Http\Controllers\AdminUsersController;
use App\Http\Controllers\AdminVehicleCompController;
use App\Http\Controllers\AdminVehicleModalController;
use App\Http\Controllers\AdminVehicleTypeController;
use App\Http\Controllers\AdminWashingIncludeController;
use App\Http\Controllers\AdminWashingPlanController;
use App\Http\Controllers\AdminWashingPriceController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\HomeSectionController;
use App\Http\Controllers\MailChimpController;
use App\Http\Controllers\PWAController;
use App\Http\Controllers\SocialLoginController;
use App\Http\Controllers\contactMailController;
use Illuminate\Support\Facades\Route;
use App\Company_social;
use App\Contact;
use App\Gallery;
use App\Opening_hour;
use App\Service;
use App\Social_team;
use App\Team;
use App\Vehicle_type;
use App\Washing_plan;
use App\Washing_plan_include;
use App\Washing_price;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', HomePageController::class);

Auth::routes();

Route::get('/home', function () {
    return Redirect('/');
});

Route::get('login', [Auth\LoginController::class, 'getLogin'])->name('login');
Route::get('register', [Auth\RegisterController::class, 'getRegister'])->name('register');
Route::get('password/reset', [Auth\ForgotPasswordController::class, 'showResetPassword'])->name('password.reset');
Route::post('password/reset', [Auth\ResetPasswordController::class, 'reset'])->name('password.request');
Route::get('password/reset{token}', [Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset.token');

Route::post('subscribe', [MailChimpController::class, 'subscribe']);
Route::post('subscribe', [HomePageController::class, 'mailError']);

Route::get('/contact', [contactMailController::class, 'index']);
Route::post('/contact', [contactMailController::class, 'send']);

Route::get('/404', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();

    return view('404', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/403', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();

    return view('403', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/pricing_plan', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();
    $washing_plans = Washing_plan::all();
    $washing_includes = Washing_plan_include::with('washing_plan')->get();
    $vehicle_types = Vehicle_type::all();
    $washing_prices = Washing_price::all();

    return view('pricing_plan', compact('company_socials', 'services', 'opening_times', 'contacts', 'washing_plans', 'washing_includes', 'vehicle_types', 'washing_prices'));
});

Route::get('/faq', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();

    return view('faq', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/coming_soon', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();

    return view('coming_soon', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/under_construction', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();

    return view('under_construction', compact('company_socials', 'services', 'opening_times', 'contacts'));
});

Route::get('/gallery', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();
    $galleries = Gallery::all();

    return view('gallery', compact('company_socials', 'services', 'opening_times', 'contacts', 'galleries'));
});

Route::get('/team', function () {
    $company_socials = Company_social::all();
    $services = Service::all();
    $opening_times = Opening_hour::all();
    $contacts = Contact::all();
    $teams = Team::all();
    $socials = Social_team::with('teams')->get();

    return view('team', compact('company_socials', 'services', 'opening_times', 'contacts', 'teams', 'socials'));
});

Route::middleware('iscommon')->group(function () {

    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/profile', function () {
        return view('profile');
    });

    Route::resource('/admin/users', AdminUsersController::class);

    Route::resource('admin/appointment', AdminAppointmentController::class);

});
Route::get('admin/downloadPDF', [AdminAppointmentController::class, 'downloadPDF']);

Route::middleware('isadmin')->group(function () {

    Route::resource('/admin/team', AdminTeamController::class);

    Route::resource('/admin/team_social', AdminTeamSocialController::class);

    Route::resource('admin/services', AdminServiceController::class);

    Route::resource('admin/gallery', AdminGalleryController::class);

    Route::resource('admin/testimonial', AdminTestimonialController::class);

    Route::resource('admin/washing_plan', AdminWashingPlanController::class);

    Route::resource('admin/washing_include', AdminWashingIncludeController::class);

    Route::resource('admin/vehicle_type', AdminVehicleTypeController::class);

    Route::resource('admin/washing_price', AdminWashingPriceController::class);

    Route::resource('admin/status', AdminTaskStatusController::class);

    Route::resource('admin/team_task', AdminTeamTaskController::class);

    Route::resource('admin/facts', AdminFactsController::class);

    Route::resource('admin/blog', AdminBlogController::class);

    Route::resource('admin/clients', AdminClientsController::class);

    Route::resource('admin/opening_hours', AdminOpeningHoursController::class);

    Route::resource('admin/company_social', AdminCompanySocialController::class);

    Route::resource('admin/payment_mode', AdminPaymentModeController::class);

    Route::resource('admin/vehicle_company', AdminVehicleCompController::class);

    Route::resource('admin/vehicle_modal', AdminVehicleModalController::class);

    Route::resource('admin/payments', AdminPaymentController::class);

    Route::resource('admin/contact', AdminContactController::class);

    Route::post('admin/contact/{id}', [AdminContactController::class, 'update'])->name('contact.update');

    Route::resource('admin/payment', AdminPaymentController::class);

    Route::get('admin/mail-settings', [AdminContactController::class, 'mail_setting'])->name('get.mailsetting');
    Route::post('admin/mail-settings', [AdminContactController::class, 'store_mail_setting'])->name('store.mailsetting');

    Route::get('admin/mailchimp-settings', [AdminContactController::class, 'mailchimp_setting'])->name('get.othersetting');
    Route::post('admin/mailchimp-settings', [AdminContactController::class, 'store_mailchimp_setting'])->name('store.mailchimpsetting');

    Route::resource('admin/slider', HomeSliderController::class);

    Route::get('/admin/report', [AdminAppointmentController::class, 'report'])->name('booking.report');

    Route::get('/admin/report/index', [AdminAppointmentController::class, 'ajaxonLoad'])->name('ajaxreport');

    Route::get('/pwa-settings', [PWAController::class, 'index'])->name('pwa.setting.index');

    Route::post('/pwa/update/setting', [PWAController::class, 'updatesetting'])->name('pwa.setting.update');

    Route::post('/pwa/update/icons/setting', [PWAController::class, 'updateicons'])->name('pwa.icons.update');

    /*Social Login setting routes*/
    Route::get('/admin/social-login/', [SocialLoginController::class, 'index'])->name('social.login');
    Route::put('/admin/social-login/{id}', [SocialLoginController::class, 'updatePage'])->name('sociallogin.update');
    Route::get('admin/social-login/set', [SocialLoginController::class, 'facebook'])->name('set.facebook');
    Route::post('admin/facebook', [SocialLoginController::class, 'updateFacebookKey'])->name('key.facebook');
    Route::post('admin/google', [SocialLoginController::class, 'updateGoogleKey'])->name('key.google');

    /* HOme section */
    Route::get('/admin/home-setting', [HomeSectionController::class, 'index'])->name('home.section');
    Route::post('/admin/home-setting', [HomeSectionController::class, 'store'])->name('home.section.store');

    //help routes

    //clear cache
    Route::get('admin/clear-cache', [HelpController::class, 'clearcahe'])->name('clear.cache');

    // System Status
    Route::get('admin/system-status', [HelpController::class, 'system_status'])->name('system.status');

    // remove public
    Route::get('admin/remove/public', [HelpController::class, 'getremove_public'])->name('get.remove.public');
    Route::post('admin/remove-public', [HelpController::class, 'remove_public'])->name('remove.public');

});

// OAuth Routes
Route::get('auth/{provider}', [Auth\AuthController::class, 'redirectToProvider']);
Route::get('auth/{provider}/callback', [Auth\AuthController::class, 'handleProviderCallback']);
