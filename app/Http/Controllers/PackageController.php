<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PackageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::where('package_status','!=','D')->orderBy('package_id','desc')->get();

        return view('back.package.index',compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.package.create');
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
            'package_name'=>'required|string|max:191',
            'package_heading'=>'required|string|max:191',
            'package_price'=>'required|max:99999',
            'package_time'=>'required|max:191',
            'package_details'=>'required'
        ]);

        if($valid->fails()){
            $this->message('error','Some Error Found');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{

            $package = new Package();
            $package->package_name = $request->package_name;
            $package->package_heading = $request->package_heading;
            $package->package_tag = $request->package_tag;
            $package->package_price = $request->package_price;
            $package->package_time = $request->package_time;
            $package->package_details = $request->package_details;
            $package->package_status = ($request->package_status)?$request->package_status:'A';
            $package->created_by = Auth::id();
            $package->save();

            if($package){
                $this->message('success','Package Store Successfully');
                return redirect()->back();
            }else{
                $this->message('warning','Package Not Store');
                return redirect()->back()->withInput($request->all());
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('back.package.view', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('back.package.edit', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Package $package)
    {
        $valid = Validator::make($request->all(),[
            'package_name'=>'required|string|max:191',
            'package_heading'=>'required|string|max:191',
            'package_price'=>'required',
            'package_time'=>'required|max:191',
            'package_details'=>'required'
        ]);

        if($valid->fails()){
            $this->message('error','Some Error Found');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{

            $package->package_name = $request->package_name;
            $package->package_heading = $request->package_heading;
            $package->package_tag = $request->package_tag;
            $package->package_price = $request->package_price;
            $package->package_time = $request->package_time;
            $package->package_details = $request->package_details;
            $package->package_status = ($request->package_status)?$request->package_status:'A';
            $package->updated_by = Auth::id();
            $package->save();

            if($package){
                $this->message('success','Package Update Successfully');
                return redirect()->route('package.index');
            }else{
                $this->message('warning','Package Not Update');
                return redirect()->back()->withInput($request->all());
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->package_status = 'D';
        $package->deleted_by = Auth::id();
        $package->save();
        if($package){
            $this->message('success','Package Delete Successfully');
            return redirect()->route('package.index');
        }else{
            $this->message('warning','Package Not Delete');
            return redirect()->route('package.index');
        }
    }
}
