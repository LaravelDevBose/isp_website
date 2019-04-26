<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Traits\ImageHandler;

class ServiceController extends BaseController
{
    use ImageHandler;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('service_status','!=', 'D')->orderBy('service_id','desc')->get();
        return view('back.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.service.create');
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
            'service_title'=>'required|string|max:191',
            'service_heading'=>'required|string|max:191',
            'service_details'=>'required|string',
        ]);

        if($valid->fails()){
            $this->message('error','Some Error Found..!');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{



            $image_path = '';
            $image_info = $request->file('service_logo');
            if($image_info){
                $image_path = $this->_singleImageUpload($image_info, Service::WIDTH, Service::HEIGHT, 'service');
            }

            $service = new Service();
            $service->service_title = $request->service_title;
            $service->service_heading = $request->service_heading;
            $service->service_details = $request->service_details;
            $service->service_logo = $image_path;
            $service->service_status = (isset($request->service_status))?$request->service_status:'A';
            $service->created_by = Auth::id();
            $service->save();

            if($service){
                $this->message('success','Service Store Successfully..!');
                return redirect()->back();
            }else{
                $this->message('error', 'Service Not Store');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('back.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('back.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $valid = Validator::make($request->all(),[
            'service_title'=>'required|string|max:191',
            'service_heading'=>'required|string|max:191',
            'service_details'=>'required|string',
        ]);

        if($valid->fails()){
            $this->message('error','Some Error Found..!');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{

            $service->service_title = $request->service_title;
            $service->service_heading = $request->service_heading;
            $service->service_details = $request->service_details;
            $service->service_logo = $request->service_logo;
            $service->service_status = (isset($request->service_status))?$request->service_status:'A';
            $service->updated_by = Auth::id();
            $service->save();

            if($service){
                $this->message('success','Service Update Successfully..!');
                return redirect()->route('service.index');
            }else{
                $this->message('error', 'Service Not Updated');
                return redirect()->route('service.index');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->service_status = 'D';
        $service->deleted_by = Auth::id();
        $service->save();

        if($service){
            $this->message('success','Service Delete Successfully..!');
            return redirect()->back();
        }else{
            $this->message('error', 'Service Not Deleted');
            return redirect()->back();
        }
    }
}
