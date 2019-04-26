<?php

namespace App\Http\Controllers\Api;

use App\ContactUs;
use App\General;
use App\Package;
use App\Service;
use App\Slider;
use App\UserMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{

    public function menu_list(){
        $services = Service::isActive()->pluck('service_title', 'service_id');

        return response()->json([
            'services'=>$services,
        ]);
    }

    public function footer_info(){
        $contactUs = ContactUs::select('address','email','phone_no', 'title')->first();

        return response()->json([
           'contactUs'=>$contactUs
        ]);
    }

    public function slider_images(){
        return Slider::all();

    }

    public function services_data(){
        return response()->json(Service::isActive()->get());
    }

    public function price_tables_data(){
        $tables = Package::isActive()->take(4)->get();

        return response()->json([
            'tables'=>$tables,
        ]);
    }

    public function price_list_data(){
        $tables = Package::isActive()->get();

        return response()->json([
            'tables'=>$tables,
        ]);
    }

    public function general_pages_data(Request $request){
        $type =$request->page_name;

        $data = General::where('type',$type)->where('status','A')->first();

        return response()->json([
            'page_data'=>$data,
        ]);
    }

    public function contact_us_data(){
        $contact_address = ContactUs::isActive()->get();

        return response()->json($contact_address);
    }

    public function store(Request $request)
    {

        $validation = Validator::make($request->all(), [
            'name'=>'required|string',
//            'phone_no'=>'required|string',
            'subject'=>'required|string',
            'message'=>'required|string'
        ]);

        if($validation->fails()){
            $errors = array_values($validation->errors()->getMessages());
            $message ='';
            foreach ($errors as $error){
                if (!empty($error)){
                    foreach ($error as $item){
                        $message .= $item.'';
                    }
                }
            }

            return response()->json([
                'status'=>'error',
                'message'=>$message,
            ]);
        }else{

            $data = UserMessage::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_no'=>$request->phone_no,
                'subject'=>$request->subject,
                'message'=>$request->message,
            ]);

            if($data){
                return response()->json([
                    'status'=>'success',
                    'message'=>'Your Message Sent Us SuccessFully.',
                ]);
            }else{
                return response()->json([
                   'status'=>'error',
                   'message'=>'Sorry. Your message Not Sent Try Again.'
                ]);
            }
        }
    }

    public function single_service_data(Service $service){
        return response()->json($service);
    }
}
