<?php

namespace App\Http\Controllers;
use App\Models\Article;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index(){
        return view('dashboard.article.index');
    }


    public function list(Article $iteam ){
        return DataTables::of($iteam->orderBy('created_at','DESC'))
            ->addIndexColumn()


            ->editColumn('comments', function ($iteam) {

                return $iteam->comments()->count();

            })

            ->editColumn('details', function ($iteam) {
                return str_limit(@$iteam->details,40);

            })
            ->editColumn('user', function ($iteam) {

                return $iteam->user->name;

            })

            ->editColumn('status', function ($iteam) {
                if ($iteam->status=='معلق'){
                    return' <a class="button black small" href="#"  id="status" title="تغيير الحالة" status="منشور" route="' . route('dashboard.article.status') . '" model_id="' . $iteam->id . '">'.$iteam->status.'</a>';

                }

                return' <a class="button small" href="#"  id="status" title="تغيير الحالة" status="معلق" route="' . route('dashboard.article.status') . '" model_id="' . $iteam->id . '">'.$iteam->status.'</a>';


            })

            ->editColumn('action', function ($iteam) {
                return '

  <a class="btn btn-warning"  id="show"  href="#" data-toggle="modal" data-target="#showModal" model_id="'.$iteam->id.'"
                            title="عرض">
                        <i class="fa fa-eye"></i>
                    </a>
           <a href="#" id="delete" title="حذف" route="' . route('dashboard.article.destroy') . '" model_id="' . $iteam->id . '"
                    class="btn btn-danger "> <i class="fa fa-trash"></i></a>
                        ';
            })

            ->rawColumns(['action','user','comments','details','status'])
            ->make(true);
    }

public function status(Request $request){
    Article::findOrFail($request->id)->update(['status' => $request->status]);
    return response()->json(['status' => true], 200);
}



    public function fetchdata(Request $request){
        $article=Article::with('user')->findOrFail($request->id);
        return response()->json($article);

    }

    public function destroy(Request $request)
    {
        Article::findOrFail($request->id)->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }


}
