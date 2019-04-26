<?php

namespace App\Http\Controllers;

use App\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ImageHandler;

class ContactUsController extends BaseController
{
    use ImageHandler;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs = ContactUs::where('status', '!=', 'D')->orderBy('id','desc')->get();

        return view('back.contactUs.index', compact('contactUs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.contactUs.create');
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
           'title'=>'required|max:195',
           'address'=>'required',
//           'phone_no'=>'required',
           'email'=>'required',
           'status'=>'required|max:10',
        ]);

        if($valid->fails()){
            $this->message('warning', 'Some Errors Found');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{
            $image_path = '';
            $imageInfo = $request->file('image_path');
            if($imageInfo){
                $image_path = $this->_singleImageUpload($imageInfo, ContactUs::WIDTH, ContactUs::HEIGHT, 'contactUs');
            }
            $phone_no = ['no1'=>$request->no1, 'no2'=>$request->no2, 'no3'=>$request->no3];

            $contactUs = new ContactUs();
            $contactUs->title = $request->title;
            $contactUs->address = $request->address;
            $contactUs->phone_no = $phone_no;
            $contactUs->email = $request->email;
            $contactUs->maps = $request->maps;
            $contactUs->image_path = $image_path;
            $contactUs->details = $request->details;
            $contactUs->status = ($request->status)?$request->status:'A';
            $contactUs->created_by = Auth::id();
            $contactUs->save();

            if($contactUs){
                $this->message('success', 'Store Successfully');
                return redirect()->back();
            }else{
                $this->message('error', 'Store Not Successful');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contactUs = ContactUs::find($id);
        return view('back.contactUs.show', compact('contactUs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contactUs = ContactUs::find($id);
        return view('back.contactUs.edit', compact('contactUs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $valid = Validator::make($request->all(),[
            'title'=>'required|max:195',
            'address'=>'required',
//           'phone_no'=>'required',
            'email'=>'required',
            'status'=>'required|max:10',
        ]);

        if($valid->fails()){
            $this->message('warning', 'Some Errors Found');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{
            $image_path = '';
            $imageInfo = $request->file('image_path');
            $old_image = $request->old_image;
            if($imageInfo){
                $image_path = $this->_singleImageUpload($imageInfo, 400, 600, 'contactUs');
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

            $phone_no = ['no1'=>$request->no1, 'no2'=>$request->no2, 'no3'=>$request->no3];

            $contactUs = ContactUs::find($id);
            $contactUs->title = $request->title;
            $contactUs->address = $request->address;
            $contactUs->phone_no = $phone_no;
            $contactUs->email = $request->email;
            $contactUs->maps = $request->maps;
            $contactUs->image_path = $image_path;
            $contactUs->details = $request->details;
            $contactUs->status = ($request->status)?$request->status:'A';
            $contactUs->updated_by = Auth::id();
            $contactUs->save();

            if($contactUs){
                $this->message('success', 'Update Successfully');
                return redirect()->route('contactUs.index');
            }else{
                $this->message('error', 'Update Not Successful');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contactUs = ContactUs::find($id);
        $contactUs->status = 'D';
        $contactUs->deleted_by = Auth::id();
        $contactUs->save();

        if($contactUs){
            $this->message('success', 'Delete Successfully');
            return redirect()->route('contactUs.index');
        }else{
            $this->message('error', 'Delete Not Successful');
            return redirect()->back();
        }
    }
}
