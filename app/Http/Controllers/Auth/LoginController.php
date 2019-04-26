<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Auth;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login( Request $request){

//        $li = DB::table('setting')->where('field','licence')->first();
//        $date = New DateTime($li->value);

//        print_r(date_format($date,'Y-m-d')); die();
        $this->validate($request, [
            'identity'=>'required',
            'password'=>'required|min:6',
        ]);

        //attempt to log the user in
        if (Auth::guard('web')->attempt([$this->username()=>$request->identity, 'password'=>$request->password, 'status'=>'A'], $request->remember)) {
            //if Successful, than redirect to their intended location

            //if email not confirm than redirect back index page with message
            if(Auth::user()->status != 'A'){
                Auth::guard('web')->logout();
                $data['msg'] ='Your Account Are Block For More Info Contact With Admin!';
                $data['status'] = '0';
                return response()->json($data);
            }

//            if(Auth::user()->type != 'D'){
//                if(Carbon::today() > date_format($date,'Y-m-d')){
//                    Auth::guard('web')->logout();
//                    $data['msg'] ='Your Licence Already Expired..!';
//                    return response()->json($data);
//                }
//            }

            $data['status']='1';
            $data['msg'] ='Welcome back..! You are Successfully logged in.';
            return response()->json($data);
        }

        $data['msg'] ='Email Or UserName And Password Not Match !';
        return response()->json($data);

    }


    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    /**
     * Check either username or email.
     * @return string
     */
    public function username()
    {
        $identity  = request()->get('identity');
        $fieldName = filter_var($identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldName => $identity]);
        return $fieldName;
    }
}
