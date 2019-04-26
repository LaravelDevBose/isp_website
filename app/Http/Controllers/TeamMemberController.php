<?php

namespace App\Http\Controllers;

use App\TeamMember;
use Illuminate\Http\Request;
use App\Traits\ImageHandler;
use Auth;
use Illuminate\Support\Facades\Validator;

class TeamMemberController extends BaseController
{
    use ImageHandler;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teamMembers = TeamMember::where('member_status', '!=','D')->orderBy('member_id','desc')->get();

        return view('back.member.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.member.create');
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
            'member_name'=>'required|string|max:191',
            'member_degi'=>'required|string|max:191',
            'member_position'=>'required|max:10',
            'member_status'=>'required|max:10',
        ]);

        if($valid->fails()){
            $this->message('info','Some Error Found');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{

            $image_path = '';

            $imageInfo = $request->file('member_image');


            if($imageInfo){
                $image_path = $this->_singleImageUpload($imageInfo,150,200,'member');

                if(!$image_path){
                    $image_path = $this->default_member;
                }
            }else{
                $image_path = $this->default_member;
            }
            $social_link = [
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'google'=>$request->google,
                'linkedin'=>$request->linkedin,
            ];

            $teamMember = new TeamMember();
            $teamMember->member_name = $request->member_name;
            $teamMember->member_degi = $request->member_degi;
            $teamMember->member_position = $request->member_position;
            $teamMember->member_image = $image_path;
            $teamMember->social_link = $social_link;
            $teamMember->member_status = ($request->member_status)?$request->member_status:'A';
            $teamMember->created_by = Auth::id();
            $teamMember->save();

            if($teamMember){
                $this->message('success','Team Member Store Successfully');
                return redirect()->back();
            }else{
                $this->message('warning','Team Member Not Store');
                return redirect()->back()->withInput($request->all());
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function show(TeamMember $teamMember)
    {
        return view('back.member.show',compact('teamMember'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function edit(TeamMember $teamMember)
    {
        return view('back.member.edit', compact('teamMember'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $valid = Validator::make($request->all(),[
            'member_name'=>'required|string|max:191',
            'member_degi'=>'required|string|max:191',
            'member_position'=>'required|max:10',
            'member_status'=>'required|max:10',
        ]);

        if($valid->fails()){
            $this->message('info','Some Error Found');
            return redirect()->back()->withErrors($valid)->withInput($request->all());
        }else{

            $image_path = '';

            $imageInfo = $request->file('member_image');
            $old_image = $request->old_image;

            if($imageInfo){
                $image_path = $this->_singleImageUpload($imageInfo,150,200,'member');

                if(!$image_path){
                    $image_path = $old_image;
                }
            }else{
                $image_path = $old_image;
            }
            $social_link = [
                'facebook'=>$request->facebook,
                'twitter'=>$request->twitter,
                'google'=>$request->google,
                'linkedin'=>$request->linkedin,
            ];

            $teamMember->member_name = $request->member_name;
            $teamMember->member_degi = $request->member_degi;
            $teamMember->member_position = $request->member_position;
            $teamMember->member_image = $image_path;
            $teamMember->social_link = $social_link;
            $teamMember->member_status = ($request->member_status)?$request->member_status:'A';
            $teamMember->updated_by = Auth::id();
            $teamMember->save();

            if($teamMember){
                $this->message('success','Team Member Update Successfully');
                return redirect()->route('teamMember.index');
            }else{
                $this->message('warning','Team Member Not Update');
                return redirect()->back()->withInput($request->all());
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TeamMember  $teamMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamMember $teamMember)
    {
        $teamMember->member_status = 'D';
        $teamMember->deleted_by = Auth::id();
        $teamMember->save();

        if($teamMember){
            $this->message('success','Team Member Update Successfully');
            return redirect()->route('teamMember.index');
        }else{
            $this->message('warning','Team Member Not Update');
            return redirect()->back();
        }
    }
}
