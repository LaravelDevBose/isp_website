<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use App\Traits\ImageHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class GalleryController extends BaseController
{
    use ImageHandler;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::where('gallery_status', '!=','D')->orderBy('gallery_id','desc')->get();
        return view('back.gallery.index', compact('galleries'));
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
        $valid = Validator::make($request->all(),[
                'gallery_title'=>'required|max:190',
                'gallery_type'=>'required|max:10',
                'gallery_status'=>'required|max:10',
            ]);

        if($valid->fails()){
            $this->message('warning','Some Error Found');
            return redirect()->back()->withInput($request->all())->withErrors($valid);
        }else{
            if($request->gallery_type == 'Image'){
                $imageInfo = $request->file('image_path');
                if($imageInfo){
                    $image_path = $this->_singleImageUpload($imageInfo,400,400, 'gallery');
                }else{
                    $image_path = $this->default_member;
                }

            }else{
                $image_path = $request->video_path;
            }

            $gallery = new Gallery();
            $gallery->gallery_title = $request->gallery_title;
            $gallery->gallery_url = $image_path;
            $gallery->gallery_type = $request->gallery_type;
            $gallery->gallery_status = ($request->gallery_status)?$request->gallery_status:'A';
            $gallery->created_by = Auth::id();
            $gallery->save();

            if($gallery){
                $this->message('success','Gallery Store Successfully');
                return redirect()->route('gallery.index');
            }else{
                $this->message('warning','Gallery Not Store');
                return redirect()->back()->withInput($request->all());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->gallery_status = 'D';
        $gallery->deleted_by = Auth::id();
        $gallery->save();

        if($gallery){
            $this->message('success','Gallery Delete Successfully');
            return redirect()->route('gallery.index');
        }else{
            $this->message('warning','Gallery Not Delete');
            return redirect()->back();
        }
    }
}
