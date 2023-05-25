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
            'Email',
            'Mobile',
            'Status',
            'Created_at'
        ];
    } 

    public function collection()
    {
        return User::where('user_role','customer')->get(['id','name','email','mobile','status','created_at']);
    }
}
