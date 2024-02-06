<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Team;
use App\Models\Team_task;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Washing_plan;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
        $u_count = User::count();
        $teams = Team::count();
        $washing_plan = Washing_plan::count();
        $team_task = Team_task::count();
        $appointment = Appointment::count();
        $services = Service::count();
        $blogs = Blog::count();
        $testimonials = Testimonial::count();

        return view('admin.index', compact('users', 'u_count', 'teams', 'washing_plan', 'team_task', 'appointment', 'services', 'blogs', 'testimonials'));
    }
}
