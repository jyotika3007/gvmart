<?php

namespace App\Http\Controllers\Admin\Wishlists;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Wishlist\Wishlist;
use App\User;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getusers = Wishlist::distinct('user_id')->select('user_id')->get();

        $ids = array();
        foreach($getusers as $user){
            $ids[] = $user->user_id;
        }

        $wishlists = User::whereIn('id',$ids)->paginate(30);

        // Wishlist::Join('users','users.id','wishlists.user_id')->distinct('wishlists.user_id')->select('wishlists.*','users.name','users.email','users.mobile')->paginate(30);

        return view('admin.wishlists.list', compact('wishlists'));

        var_dump($getusers); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $products = Wishlist::Join('products','products.id','wishlists.product_id')->where('wishlists.user_id',$id)->select('products.*')->get();

        return view('admin.wishlists.show' , compact('products','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
