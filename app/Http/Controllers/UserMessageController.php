<?php

namespace App\Http\Controllers;

use App\UserMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserMessageController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = UserMessage::where('status', 'A')->latest()->get();

        return view('back.user-message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message_read_at(UserMessage $userMessage)
    {
        $userMessage->reading=1;
        $userMessage->save();

        $this->message('success', 'Message Read Successfully.!');
        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name'=>'required|string|max:191',
            'phone_no'=>'required|string|max:191',
            'subject'=>'required|string|max:191',
            'message'=>'required|string'
        ]);

        if($validation->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validation);
        }else{

            $data = UserMessage::create([
               'name'=>$request->name,
               'email'=>$request->email,
               'phone_no'=>$request->phone_no,
               'subject'=>$request->subject,
               'message'=>$request->message,
            ]);

            if($data){
                $this->message('success', 'Thank You For Your message.');
                return redirect()->back();
            }else{
                $this->message('error', 'Sorry.! Your message NOt Send Successfully');
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(UserMessage $userMessage)
    {
        return view('back.user-message.show', compact('userMessage'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function message_replied(UserMessage $userMessage)
    {

       $userMessage->replied=1;
       $userMessage->save();

        $this->message('success', 'Message Replied Successfully.!');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserMessage $userMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserMessage $userMessage)
    {
        $message = $userMessage->update(['status'=>'D']);

        $this->message('success', 'Message Deleted Successfully.!');
        return redirect()->back();
    }
}
