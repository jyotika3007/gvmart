<?php

namespace App\Http\Controllers\Admin\Slider;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Slider\Slider;
use Auth;

class SliderController extends Controller
{

    public function index()
    {
        $lists = Slider::paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        return view('admin.sliders.list', [
            'sliders' => $lists
        ]);
    }

    public function searchList(Request $request)
    {
        $lists = Slider::where('title', 'LIKE', '%' . $request->keyword . '%')->paginate(10);

        $previous = $_SERVER['REQUEST_URI'];
        session()->put('previous_url', $previous);

        return view('admin.sliders.list', [
            'sliders' => $lists,
            'keyword' => $request->keyword
        ]);
    }


    public function create()
    {

        return view('admin.sliders.create');
    }


    public function store(Request $request)
    {
        $data = $request->except('_token', '_method');
        $data['slug'] = str_replace(' ', '-', $request->input('name'));

        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('cover')) {
            $file = $request->cover;

            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/sliders/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['cover'] = 'sliders/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
        }

        if ($request->hasFile('mobile_cover')) {
            $file = $request->mobile_cover;

            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/sliders/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['mobile_cover'] = 'sliders/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
        }

        // var_dump($data); die;

        $slider = Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('message', 'Create successful');
    }


    public function show(int $id)
    {
        $slider = Slider::find($id);
        return view('admin.sliders.show', compact('slider'));
    }


    public function edit(int $id)
    {
        $slider = Slider::find($id);

        $previous = session()->get('previous_url');

        return view('admin.sliders.edit', [
            'slider' => $slider,
            'previous' => $previous

        ]);
    }


    public function update(Request $request, int $id)
    {

        $data = $request->except('_token', '_method');

        $data['slug'] = str_replace(' ', '-', $request->input('name'));

        if ($request->hasFile('cover')) {
            $file = $request->cover;

            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/sliders/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['cover'] = 'sliders/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
        }

        if ($request->hasFile('mobile_cover')) {
            $file = $request->mobile_cover;

            $file_ext = explode('.', $file->getClientOriginalName());
            $random = rand(10000, 999999);
            $file->move(public_path() . '/storage/sliders/', $random . time() . '.' . $file_ext[count($file_ext) - 1]);
            $data['mobile_cover'] = 'sliders/' . $random . time() . '.' . $file_ext[count($file_ext) - 1];
        }
        
        $slider = Slider::where('id', $id)->update($data);

        return redirect()->back()->with('message', 'Update successful');
    }


    public function destroy($id)
    {
        $slider = Slider::find($id);

        $slider->delete();

        return redirect()->back()->with('message', 'Delete successful');
    }


    public function removeImage(Request $request)
    {
        return redirect()->back()->with('message', 'Image delete successful');
    }


    public function removeThumbnail(Request $request)
    {
        return redirect()->back()->with('message', 'Image delete successful');
    }
}
