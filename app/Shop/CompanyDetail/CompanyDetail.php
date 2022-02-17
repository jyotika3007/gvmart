<?php

namespace App\Shop\CompanyDetail;

use Illuminate\Database\Eloquent\Model;

class CompanyDetail extends Model
{
    protected $fillable = [

    	'company_name',
    	'address',
    	'city',
    	'state',
    	'country',
    	'pincode',
    	'contact',
    	'contact_email',
    	'facebook_client_id',
    	'facebook_secret_key',
    	'google_client_id',
    	'google_secret_key',
    	'google_url',
    	'twitter_url',
    	'linked_in_url',
    	'pinterest_url',
    	'youtube_url',
    	'instagram_url',
        'company_logo'
    	

    ];

    
    
}
