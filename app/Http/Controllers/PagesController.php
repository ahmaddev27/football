<?php

namespace App\Http\Controllers;
use App\Events\NewNotification;
use App\Models\Admin;
use App\Models\Page;
use App\Notifications\CrateCategory;
use App\Notifications\NewPage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PagesController extends Controller


{


    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index(){
        return view('dashboard.page.index');
    }


    public function list(Page $iteam ){
        return DataTables::of($iteam->orderBy('created_at','DESC'))
            ->addIndexColumn()
            ->editColumn('details',function ($item){
                return  strip_tags(str_limit($item->details,150));
            })

            ->editColumn('action', function ($iteam) {

                return '

  <a class="btn btn-info"  id="edit"  href="' . route('dashboard.page.edit',$iteam->id) . '"
                            title="تعديل">
                        <i class="fa fa-edit"></i>
                    </a>

                                 <a href="#" id="delete" title="حذف" route="' . route('dashboard.page.destroy') . '" model_id="' . $iteam->id . '"
                               class="btn btn-danger "> <i class="fa fa-trash"></i></a>
                        ';
            })



            ->rawColumns(['action','posts','videos'])
            ->make(true);
    }

    public function create(){
        return view('dashboard.page.create');
    }



    public function store(Request $request){

        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $page=Page::create($request->all());
        $data=[
            'title'=>'صفحة جديدة  : '.str_limit($page->title,50),
            'created_at'=>$page->created_at,
            'url_route'=>'/pages/'.$page->id,
            'sound'=>'https://assets.mixkit.co/sfx/download/mixkit-wrong-answer-fail-notification-960.wav'
        ];


        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewPage($page));
        }


        event(new NewNotification($data));
        return Redirect()->route('dashboard.page.index')->with(['message' => 'تمت اضافة الصفحة  بنجاح', 'alert-type' => 'success']);
    }

    public function destroy(Request $request)
    {
        Page::findOrFail($request->id)->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }


    public function edit($id){
        $page=Page::findOrFail($id);
        return view('dashboard.page.edit',['page'=>$page]);
    }

    public function update(Request $request){
        $request->validate([
            'title' => 'required',
            'details' => 'required',
        ]);

        $category=Page::findOrFail($request->id);
        $category->update(['title'=>$request->title,'details'=>$request->details]);
        return Redirect()->route('dashboard.page.index')->with(['message' => 'تمت تعديل الصفحة  بنجاح', 'alert-type' => 'success']);
    }


}
