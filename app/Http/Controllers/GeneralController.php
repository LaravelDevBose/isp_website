<?php

namespace App\Http\Controllers;

use App\General;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\ImageHandler;

class GeneralController extends BaseController
{

    use ImageHandler;

    public function welcome_note_page()
    {
        $note = General::where('type','welcomeNote')->where('status', '!=','D')->first();
        return view('back.general.welcome_note', compact('note'));
    }

    public function company_profile_page()
    {
        $profile = General::where('type','CompanyProfile')->where('status', '!=','D')->first();
        return view('back.general.company_profile', compact('profile'));
    }


    public function about_us_page()
    {
        $aboutUs = General::where('type','aboutUs')->where('status', '!=','D')->first();
        return view('back.general.aboutUs_page', compact('aboutUs'));
    }

    public function coverage_page()
    {
        $coverage = General::where('type','coverage')->where('status', '!=','D')->first();
        return view('back.general.coverage_page', compact('coverage'));
    }

    public function corporate_page()
    {
        $corporate = General::where('type','corporate')->where('status', '!=','D')->first();
        return view('back.general.corporate_page', compact('corporate'));
    }

    public function billing_page()
    {
        $billing = General::where('type','billing')->where('status', '!=','D')->first();
        return view('back.general.billing_page', compact('billing'));
    }

    public function support_page()
    {
        $support = General::where('type','support')->where('status', '!=','D')->first();
        return view('back.general.support_page', compact('support'));
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
           'type'=>'required|max:10|string',
           'details'=>'required',
        ]);

        if($valid->fails()){
            $this->message('warning', 'Some Error Found');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{

            $imageInfo = $request->file('image_path');
            $old_image = $request->old_image;

            if($imageInfo){
                $image_path = $this->_singleImageUpload($imageInfo, General::WIDTH, General::HEIGHT, 'general');

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
            $general = General::updateOrCreate(
                ['type'=>$request->type],
                [
                    'details'=>$request->details,
                    'image_path'=>$image_path,
                    'created_by'=>Auth::id(),
                    'updated_by'=>Auth::id()
                ]
            );
            if($general){
                $this->message('success', $request->type.'Update Successfully');
                return redirect()->back();
            }else{
                $this->message('success', $request->type.'Update Not Successfully');
                return redirect()->back()->withInput($request->all())->withErrors($valid);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
