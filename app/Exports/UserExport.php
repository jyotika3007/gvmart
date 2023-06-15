<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function headings():array{
        return[
            'Id',
            'Name',
            'User Role',
            'Email',
            'Mobile',
            'Status',
            'Created_at'
        ];
    } 

    public function collection()
    {
        return User::orderBy('id','ASC')->get(['id','name','user_role','email','mobile','status','created_at']);
    }
}
