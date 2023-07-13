<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\CompanyDetail\CompanyDetail;
use App\Shop\Cms\Cms;
use DB;


class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function companyDetail()
    {
        $cms = CompanyDetail::first(['id', 'company_name',"country", "state","city","pincode","address","contact","contact_email","company_logo", 'google_url', 'twitter_url', 'linked_in_url', 'pinterest_url', 'youtube_url', 'instagram_url']);

        return response()->json([
            "status" => 1,
            "message" => "Company Detail fetched successfully",
            "data" => $cms
        ]);
    }

        public function getCmsDetail(){
            if(isset($_GET['page']) && $_GET['page']!=''){
                $cms = CMS::where('page',$_GET['page'])->first();

                if($cms){

                    return response()->json([
                        "status" => 1,
                        "message" => $cms->title ?? '' +" Detail fetched successfully",
                        "data" => $cms
                    ]);
                }
                else{
                    return response()->json([
                        "status" => 0,
                        "message" => "No record found for this page"
                    ]);
                }
            }
            else{
                return response()->json([
                    "status" => 0,
                    "message" => "Page name is required"
                ]);
            }
            
        }
        
        public function getPoliciesList()
        {
            $policies = DB::table('policies')->where('status',1)->get(['id','reason','request_type']);

            return response()->json([
                "status" => 1,
                "message" => "Policy List fetched successfully",
                "data" => $policies
            ]);
        }

   }
