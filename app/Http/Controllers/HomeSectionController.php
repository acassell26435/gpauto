<?php

namespace App\Http\Controllers;

use App\HomeSection;
use Illuminate\Http\Request;

class HomeSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->homeSection = HomeSection::query();
    }

    public function index()
    {
        $homesection = $this->homeSection->first();

        return view('admin.home_section.index', compact('homesection'));
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

        $home_section = $this->homeSection->first();
        $input['slider_section'] = $request->slider_section ? 1 : 0;
        $input['about_section'] = $request->about_section ? 1 : 0;
        $input['service_section'] = $request->service_section ? 1 : 0;
        $input['gallery_section'] = $request->gallery_section ? 1 : 0;
        $input['facts_section'] = $request->facts_section ? 1 : 0;
        $input['team_section'] = $request->team_section ? 1 : 0;
        $input['plan_section'] = $request->plan_section ? 1 : 0;
        $input['appointment_section'] = $request->appointment_section ? 1 : 0;
        $input['testinomial_section'] = $request->testinomial_section ? 1 : 0;
        $input['blog_section'] = $request->blog_section ? 1 : 0;
        $input['client_section'] = $request->client_section ? 1 : 0;
        try {
            if ($home_section == null) {
                $query = $this->homeSection->create($input);

                return back()->with('added', 'Home Section has been successfully inserted!');
            } else {
                $query = $this->homeSection->update($input);

                return back()->with('added', 'Home Section has been successfully updated!');
            }
        } catch (\Exception $e) {
            return back()->with('deleted', $e->getMessage());
        }

    }
}
