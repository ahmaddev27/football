<?php

namespace App\Http\Controllers;

use App\Mail\ReplayMail;
use App\Models\inbox;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class InboxController extends Controller
{
    public function index(){

        return view('dashboard.inbox.index');
    }

    public function list(inbox $item)
    {
        return DataTables::of($item->orderBy('created_at', 'DESC'))
            ->addIndexColumn()

            ->editColumn('msg',function ($item){
                return  str_limit($item->msg,150);
            })
            ->editColumn('action', function ($item) {

                return '   <a href="#" id="delete" title="حذف" route="' . route('dashboard.inbox.destroy') . '" model_id="' . $item->id . '"
                               class="btn btn-danger "> <i class="fa fa-trash"></i></a>

                               <a href="' . route('dashboard.inbox.show',$item->id) . '"
                               class="btn btn-primary "> <i class="ti ti-email" title="رد"></i></a>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function show($id){

        $inbox=inbox::findOrFail($id);
        $inbox->update(['is_read'=>1]);
        return view('dashboard.inbox.replay',['inbox'=>$inbox]);
    }



    public function send($id,Request $request){

        $mail = Inbox::find($id);
        $mail->update(['is_replay'=>1]);

        $email = str_replace(' ', '', $mail->email);
        \Illuminate\Support\Facades\Mail::to($email)->send(new ReplayMail($request->text));
        return response()->json(['status' => true, 'message' => 'تم ارسال الرسالة بنجاح']);

    }


    public function destroy(Request $request)
    {
        Inbox::findOrFail($request->id)->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }
}
