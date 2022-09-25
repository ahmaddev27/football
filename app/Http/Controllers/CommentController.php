<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CommentController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index(){
        return view('dashboard.comment.index');
    }


    public function list(Comment $iteam ){
        return DataTables::of($iteam->orderBy('created_at','DESC'))
            ->addIndexColumn()


            ->editColumn('article_id', function ($iteam) {
                return @$iteam->article->title;

            })

            ->editColumn('body', function ($iteam) {
                return str_limit(@$iteam->body,40);

            })
            ->editColumn('user_id', function ($iteam) {

                return @$iteam->user->name;

            })


            ->editColumn('action', function ($iteam) {
                return '

  <a class="btn btn-warning"  id="show"  href="#" data-toggle="modal" data-target="#showModal" model_id="'.$iteam->id.'"
                            title="عرض">
                        <i class="fa fa-eye"></i>
                    </a>
           <a href="#" id="delete" title="حذف" route="' . route('dashboard.comment.destroy') . '" model_id="' . $iteam->id . '"
                    class="btn btn-danger "> <i class="fa fa-trash"></i></a>
                        ';
            })

            ->rawColumns(['action','user_id','article_id','body'])
            ->make(true);
    }



    public function fetchdata(Request $request){
        $article=Comment::with(['article','user'])->findOrFail($request->id);
        return response()->json($article);

    }

    public function destroy(Request $request)
    {
        Comment::findOrFail($request->id)->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }


}
