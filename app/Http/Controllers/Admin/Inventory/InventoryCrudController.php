<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\BrandRequest as StoreRequest;
use App\Http\Requests\BrandRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class BrandCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class BrandCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Brand');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/brand');
        $this->crud->setEntityNameStrings('brand', 'brands');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

         $this->crud->addFields([
            ['name' => 'brand_name', 'label' => 'Brand Name', 'type' => 'text'],      
            ['name' => 'brand_img',    'label' => 'Brand Logo ','type' => 'upload','upload' => true,'disk' => 'uploads' ],            
            
            ['name' => 'slug', 'label' => 'Slug', 'type' => 'text'],      
            ['name' => 'status', 'label' => "Status", 'type' => 'select_from_array', 'options' => ['Active' => 'Active', 'Deactive' => 'Deactive']], 
            
        ]); 

        // TODO: remove setFromDb() and manually define Fields and Columns
         // To view List of All Banners
        $this->crud->setColumns([
            'brand_name',
            'slug',
            ['name' => 'brand_img','label' => "Logo",'type' => 'image','height' => '50px',
                 'width' => '50px'],
            'status'
            ]);
        
          

        // add asterisk for fields that are required in BrandRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
