<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $blogs = Blog::all();
        $users = User::pluck('name', 'id')->all();

        return view('admin.blog.index', compact('blogs', 'users'));
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
            'img' => 'image|mimes:jpeg,png,jpg',
        ]);

        $input = $request->all();

        if ($file = $request->file('img')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/blog', $name);

            $input['img'] = $name;

        }

        Blog::create($input);

        return back()->with('added', 'Blog has been added');
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
            'img' => 'image|mimes:jpeg,png,jpg',
        ]);

        $blog = Blog::findOrFail($id);

        $input = $request->all();

        if ($file = $request->file('img')) {

            $name = time().$file->getClientOriginalName();

            $file->move('images/blog', $name);

            unlink(public_path().'/images/blog/'.$blog->img);

            $input['img'] = $name;

        }

        $blog->update($input);

        return back()->with('updated', 'Blog has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->img) {

            unlink(public_path().'/images/blog/'.$blog->img);

        }

        $blog->delete();

        return back()->with('deleted', 'Blog has been deleted');
    }
}
