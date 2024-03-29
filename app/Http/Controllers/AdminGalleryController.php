<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $galleries = Gallery::all();

        return view('admin.gallery.index', compact('galleries'));
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

        $request->validate([
            'gallery_img' => 'image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();

        $file = $request->file('gallery_img');

        $name = time().$file->getClientOriginalName();

        $file->move('images/gallery', $name);

        $input['gallery_img'] = $name;

        Gallery::create($input);

        return back()->with('added', 'Gallery has been added');
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

        $request->validate([
            'gallery_img' => 'image|mimes:jpeg,png,jpg',
        ]);

        $gallery = Gallery::findOrFail($id);

        $input = $request->all();

        $file = $request->file('gallery_img');

        $name = time().$file->getClientOriginalName();

        $file->move('images/gallery', $name);

        unlink(public_path().'/images/gallery/'.$gallery->gallery_img);

        $input['gallery_img'] = $name;

        $gallery->update($input);

        return back()->with('updated', 'Gallery has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $gallery = Gallery::findOrFail($id);

        unlink(public_path().'/images/gallery/'.$gallery->gallery_img);

        $gallery->delete();

        return back()->with('deleted', 'Gallery has been deleted');
    }
}
