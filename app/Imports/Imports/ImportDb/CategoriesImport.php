<?php

namespace App\Imports\Imports\ImportDb;

use App\categories;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoriesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new categories([
            //
        ]);
    }
}
