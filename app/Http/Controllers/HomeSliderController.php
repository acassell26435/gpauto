<?php

namespace App\Http\Controllers;

use App\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->sliders = HomeSlider::query();
    }
    public function index()
    {
        $sliders = $this->sliders->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'heading'=> 'required|string',
            'sub_heading'=>'required|string',
            'detail'=> 'required|string',
            'image' => 'required'
        ]);

       

        $input = $request->all();

        if(isset($request->button1) && $request->button1 != NULL){
            $request->validate([
                'button_text1' => 'required|string',
                'button_link1' => 'required|url'
            ]);

            $input['button1'] = 1;

        }

        if(isset($request->button2) && $request->button2 != NULL){
            $request->validate([
                'button_text2' => 'required|string',
                'button_link2' => 'required|url'
            ]);

             $input['button2'] = 1;
        }

       

        if ($file = $request->file('image')) {

                $name = "slider_" . time() . $file->getClientOriginalName();
                $file->move('images/slider', $name);
                $input['image'] = $name;
            }

       
        try{
            $query = $this->sliders->create($input);
            return redirect()->route('slider.index')->with('added','Slider has been added Successfully!');
        }catch(\Exception $e){
            return back()->with('deleted',$e->getMessage());
        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $slider = $this->sliders->find($id);
       return view('admin.slider.edit',compact('id','slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'heading'=> 'required|string',
            'sub_heading'=>'required|string',
            'detail'=> 'required|string',
        ]);

        $input = $request->all();

        $slider = $this->sliders->find($id);

        if(isset($request->button1) && $request->button1 != NULL){
            $request->validate([
                'button_text1' => 'required|string',
                'button_link1' => 'required|url'
            ]);

            $input['button1'] = 1;

        }else{
            $input['button1'] = 0;
        }

        if(isset($request->button2) && $request->button2 != NULL){
            $request->validate([
                'button_text2' => 'required|string',
                'button_link2' => 'required|url'
            ]);

             $input['button2'] = 1;
        }else{
            $input['button2'] = 0;
        }

        

        if ($file = $request->file('image')) {

            $name =  "slider_" . time() . $file->getClientOriginalName();
            if ($slider->image != null) {
                $content = @file_get_contents(public_path() . '/images/slider/' . $slider->image);
                if ($content) {
                    unlink(public_path() . "/images/slider/" . $slider->image);
                }
               
                  
            }
            $file->move('images/slider', $name);
              
             $input['image'] = $name;
          
        }

       // return $input;
       
        try{
           $query = $slider->update($input);
            return redirect()->route('slider.index')->with('updated','Slider has been updated Successfully!');
        }catch(\Exception $e){
            return back()->with('deleted',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HomeSlider  $homeSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = $this->sliders->find($id);
        if($query){
            $query->delete();
            return back()->with('deleted','Slider has been deleted successfully!');
        }else{
             return back()->with('deleted','Slider Not found!');
        }
    }
}
