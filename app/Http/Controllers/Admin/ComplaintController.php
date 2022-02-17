<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Complaint;
use Mail;

class ComplaintController extends Controller
{
    public function complaints(){
    	$complaints = Complaint::orderBy('created_at','DESC')->orderBy('status','DESC')->paginate(20);

    	return view('admin.complaints.list',compact('complaints'));
    }

    public function searchList(Request $request){
        $complaints = Complaint::where('user_name','LIKE','%'.$request->keyword.'%')->orWhere('user_email','LIKE','%'.$request->keyword.'%')->orWhere('user_mobile','LIKE','%'.$request->keyword.'%')->orderBy('created_at','DESC')->orderBy('status','DESC')->paginate(20);
        $keyword = $request->keyword ?? '';
        return view('admin.complaints.list',compact('complaints','keyword'));
    }

    public function adminReply($id){
    	$complaint = Complaint::find($id);

    	return view('admin.complaints.edit',compact('complaint'));
    }

  public function statusClose($id){
    	$complaint = Complaint::find($id);

    	$complaint->status = 0;
    	$complaint->update();

    	return redirect()->back()->with('message','Complaint closed successfully.');
    }

    public function updateReply(Request $request, $id){
    	$complaint = Complaint::find($id);

    	$complaint->admin_reply = $request->admin_reply ?? '';
    	$complaint->status = $request->status ?? '';

    	$complaint->update();

        $complaint->admin_email = 'Riddhi.lic@gmail.com';
        $complaint->admin_name = 'GV Mart';


            Mail::send('mails.feedbackUpdate',['complaint' => $complaint,  'type' => 'customer'],
               function ($m) use ($complaint) {
                   $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                   $m->to($complaint->user_email, $complaint->user_name)->subject('Feedback replied.');
               });

            Mail::send('mails.feedbackUpdate',['complaint' => $complaint,  'type' => 'admin'],
               function ($m) use ($complaint) {
                   $m->from( env('MAIL_USERNAME'), env('APP_NAME') );

                   $m->to($complaint->admin_email, $complaint->admin_name)->subject('Feedback replied.');
               });


    	return redirect()->back()->with('message','Replied to complaint successfully.');
}
}
