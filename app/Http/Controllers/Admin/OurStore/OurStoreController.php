<?php

namespace App\Http\Controllers\Admin\OurStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\OurStore;


class OurStoreController extends Controller
{
    public function index()
    {

        $list = OurStore::paginate(20);

        return view('admin.our_store.list', [
            'stores' => $list
        ]);
    }


    public function create()
    {
        return view('admin.our_store.create');
    }


    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_replace(' ', '-', $request->input('main_area'));

        $store = OurStore::create($data);

        return redirect()->route('admin.our_store.index')->with('message', 'Create successful');
    }


    public function show($id)
    {
        $store = OurStore::find($id);
        return view('admin.our_store.show', compact('store'));
    }


    public function edit($id)
    {
        $store = OurStore::find($id);
        return view('admin.our_store.edit', [
            'store' => $store,
        ]);
    }


    public function update(Request $request, $id)
    {
        $store = OurStore::find($id);


        $data = $request->except('_token', '_method');

        $data['slug'] = str_replace(' ', '-', $request->input('main_area'));


        $store = OurStore::where('id', $id)->update($data);

        return redirect()->route('admin.our_store.edit', $id)
            ->with('message', 'Update successful');
    }


    public function destroy($id)
    {
        $store = OurStore::find($id);

        $store->delete();
        return redirect()->route('admin.our_store.index')->with('message', 'Delete successful');
    }
}
