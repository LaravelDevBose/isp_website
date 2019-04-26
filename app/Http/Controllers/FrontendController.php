<?php

namespace App\Http\Controllers;

use App\General;
use App\Service;
use App\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public  function index(){


        $aboutUs = General::isActive()->get();
        return view('front.index');
    }

    public function slider_images(){
        return Slider::isActive()->latest()->get();
    }


    public function services_page(){

        return view('front.services_page');
    }

    public function service_page(Service $service){

        return view('front.service_page');
    }

    public function packages_page(){
        return view('front.package_page');
    }
    public function team_member(){
        return view('front.teamMember_page');
    }

    public function gallery_page(){
        return view('front.gallery_page');
    }

    public function about_us_page(){
        return view('front.aboutUs_page');
    }

    public  function company_profile_page(){
        return view('front.company_profile');
    }

    public function contact_us_page(){
        return view('front.contact_us_page');
    }
}
