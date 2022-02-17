<?php

namespace App\Http\Controllers\Admin\Newsletters;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Shop\Newsletter\Newsletter;
use App\Shop\NewsletterPosts\NewletterPost;
use Mail;

class NewsletterPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $previous = $_SERVER['REQUEST_URI'];
         session()->put('previous_url',$previous);

        $newsletters = NewletterPost::paginate(50);

        return view('admin.newsletters.posts' , compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = Newsletter::where('status',1)->get();
        return view('admin.newsletters.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $newPost = new NewletterPost;

        if ($request->hasFile('cover') ) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/newsletters/', time().$file->getClientOriginalName());   
            $data['cover'] = 'newsletters/'.time().$file->getClientOriginalName();
        }

        $newPost->post_title = $data['post_title'];
        $newPost->post_description  = $data['post_description'] ?? '';
        $newPost->cover  = $data['cover'] ?? '';
        $newPost->status = '1';

        $newPost->save();

        return redirect()->route('admin.newsletter_posts.index')->with('message', 'Category created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function sendMail($id)
    {
        $post = NewletterPost::find($id);

        $msg = 'Something went wrong. Try again';

        $subscribers = Newsletter::where('status',1)->get();

        if($subscribers){
            foreach($subscribers as $sub){
                Mail::send('mails.newsletter_post',['post' => $post],
                function ($m) use ($sub) {
                   $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                   $m->to($sub->email, $sub->email)->subject('GV Mart Updates');
               });
        $msg = 'Mail send successfully';
            }

            $post->mail_sent = $post->mail_sent+1;
            $post->update();
        }
        else{

        $msg = 'No subscriber found';
        }

        return redirect()->back()->with('message',$msg);

           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $previous = session()->get('previous_url');
        
        $post = NewletterPost::find($id);
        
        return view('admin.newsletters.edit', compact('post','previous'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( $id , Request $request )
    {
        $news = NewletterPost::find($id);
        
        $cover = '';

        if ($request->hasFile('cover') ) {
            $file=$request->cover;
            $file->move(public_path(). '/storage/newsletters/', time().$file->getClientOriginalName());   
            $cover = 'newsletters/'.time().$file->getClientOriginalName();
        }

        $news->post_title = $request->post_title;
        $news->post_description = $request->post_description;
        $news->cover  = $cover;
        $news->update();

        return redirect()->route('admin.newsletter_posts.index')->with('message','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
    }
}
