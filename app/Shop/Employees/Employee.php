<?php

namespace App\Shop\Employees;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'user_role',
        'mobile',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'driving_licence',
        'adhaar_front',
        'adhaar_back',
        'pan_card',
        'voter_id',
        'passport_size_photo',
        'others',
        'monthly_salary',
        'bank_name',
        'bank_account_number',
        'bank_ifsc_code',
        'bank_account_holder',
        'bank_branch',
        'pan_number',
        'adhaar_number',
        'date_of_birth'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];
}
