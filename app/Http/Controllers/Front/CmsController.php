<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Shop\Cms\Cms;
use App\Shop\CompanyDetail\CompanyDetail;
use App\Shop\Testimonial\Testimonial;

class CmsController extends Controller
{
    
    public function getContact()
    {
        $companyInfo = CompanyDetail::first();
        return view('front.contact_us',compact('companyInfo'));
    }

   public function getAbout()
    {
        $testimonials = Testimonial::where('status','1')->orderBy('id','DESC')->get();

        $pageName = 'About GV Mart';
         $content = Cms::where('page','About')->first();
        return view('front.about_us',compact('content','pageName','testimonials'));
    }

   public function getTNC()
    {
        $pageName = 'Terms & Conditions';
        $content = Cms::where('page','Terms')->first();
        return view('front.policies',compact('content','pageName'));
    }

   public function getPrivacyPolicy()
    {
        $pageName = 'Privacy Policy';
        $content = Cms::where('page','Privacy')->first();
        return view('front.policies',compact('content','pageName'));
    }

   public function getReturnPolicy()
    {
        $pageName = 'Return Policy';
        $content = Cms::where('page','Return')->first();
        return view('front.policies',compact('content','pageName'));
    }

   
}
