<?php

namespace App\Http\Controllers;

use Exception;
use App\OurClient;
use Illuminate\Http\Request;
use App\Traits\ImageHandler;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OurClientController extends BaseController
{
    use ImageHandler;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ourClients = OurClient::isActive()->latest()->get();

        return view('back.client.index',[
            'ourClients'=>$ourClients
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.client.create');
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
            'client_comp_name'=>'required|max:190',
            'client_logo'=>'required|image',
        ]);

        if($valid->fails()){
            $this->message('warning','Some Error Found');
            return redirect()->back()->withInput($request->all())->withErrors($valid);
        }else{
            try{
                DB::beginTransaction();
                $imageInfo = $request->file('image_path');
                if($imageInfo){
                    $image_path = $this->_singleImageUpload($imageInfo,OurClient::Width,OurClient::Height, 'client');
                }else{
                    throw  new Exception('Client Logo Not Insert', 400);
                }

                $client = OurClient::create([
                    'client_comp_name'=>$request->client_comp_name,
                    'client_website'=>$request->client_website,
                    'client_logo'=>$image_path,
                    'client_details'=>$request->client_details,
                    'client_status'=>(!empty($request->client_status))?$request->client_status:'A',
                    'created_by'=>Auth::id(),
                    'created_at'=>now(),
                ]);

                if($client){
                    DB::commit();
                    $this->message('success', 'New Client Info Added Successfully');
                    return redirect()->route('our-client.index');
                }else{
                    throw new Exception('Invalid information', 400);
                }

            }catch (Exception $ex){
                DB::rollBack();
                $this->message('error', $ex->getMessage());
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function show(OurClient $ourClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function edit(OurClient $ourClient)
    {
        return view('back.client.edit',[
            'ourClient'=>$ourClient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OurClient $ourClient)
    {
        $valid = Validator::make($request->all(),[
            'client_comp_name'=>'required|max:190',
        ]);

        if($valid->fails()){
            $this->message('warning','Some Error Found');
            return redirect()->back()->withInput($request->all())->withErrors($valid);
        }else{
            try{
                DB::beginTransaction();
                $imageInfo = $request->file('image_path');
                $old_image = $request->old_image;
                if($imageInfo){
                    $image_path = $this->_singleImageUpload($imageInfo,OurClient::Width,OurClient::Height, 'client');
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

                $ourClient->update([
                    'client_comp_name'=>$request->client_comp_name,
                    'client_website'=>$request->client_website,
                    'client_logo'=>$image_path,
                    'client_details'=>$request->client_details,
                    'client_status'=>(!empty($request->client_status))?$request->client_status:'A',
                    'updated_by'=>Auth::id(),
                    'updated_at'=>now(),
                ]);

                if($ourClient){
                    DB::commit();
                    $this->message('success', 'Client Info Updated Successfully');
                    return redirect()->route('our-client.index');
                }else{
                    throw new Exception('Invalid information', 400);
                }

            }catch (Exception $ex){
                DB::rollBack();
                $this->message('error', $ex->getMessage());
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OurClient  $ourClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(OurClient $ourClient)
    {
        $ourClient->client_status = 'D';
        $ourClient->deleted_by = Auth::id();
        $ourClient->save();

        if($ourClient){
            $this->message('success','Client Info Delete Successfully');
            return redirect()->route('our-client.index');
        }else{
            $this->message('warning','Client Info Not Delete');
            return redirect()->back();
        }

    }
}
