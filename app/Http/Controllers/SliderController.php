<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use Auth;
use Session;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageHandler;

class SliderController extends BaseController
{
    use ImageHandler;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::where('status', 'A')->orderBy('id', 'desc')->get();
        return view('back.slider.index',compact('sliders'));
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
        $r = Validator::make($request->all(),[
                'h1'=>'required',
            ]);

        if($r->fails()){
            $this->message('error','Some Error Found..!');
            return redirect()->back()->withErrors($r);
        }else{
            $image_path = '';
            $image_info = $request->file('image_path');
            if($image_info){
                $image_path = $this->_singleImageUpload($image_info, 1920, 630, 'slider');
            }
            $slider = new Slider();
            $slider->headings = ['h1'=>$request->h1];
            $slider->image_path =$image_path;
            $slider->status= 'A';
            $slider->created_by = Auth::id();
            $slider->save();

            if($slider){
                Session::flash('success','Slider Information Store Successfully');
                return redirect()->back();
            }else{
                Session::flash('warning', 'Slider Information Not Store');
                return redirect()->back();
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('back.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $r = Validator::make($request->all(),[
            'h1'=>'required',
        ]);

        if($r->fails()){
            $this->message('error','Some Error Found..!');
            return redirect()->back()->withErrors($r);
        }else{
            $image_path = '';
            $image_info = $request->file('image_path');
            $old_image = $request->old_image;
            if($image_info){
                $image_path = $this->_singleImageUpload($image_info, 1920, 630, 'slider');

                if($image_path){
                    if(file_exists($old_image)){
                        unlink($old_image);
                    }
                }else{
                    $image_path = $old_image;
                }

            }else{
                $image_path = $old_image;
            }

            $slider->headings = ['h1'=>$request->h1];
            $slider->image_path =$image_path;
            $slider->status= 'A';
            $slider->updated_by = Auth::id();
            $slider->save();

            if($slider){
                Session::flash('success','Slider Information Store Successfully');
                return redirect()->back();
            }else{
                Session::flash('warning', 'Slider Information Not Store');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->status = 'D';
        $slider->deleted_by = Auth::id();
        $slider->save();

        if($slider){
            $this->message('success', 'Delete Successfully.');
            return redirect()->back();
        }else{
            $this->message('error','Delete UnSuccessful');
            return redirect()->back();
        }
    }
}
