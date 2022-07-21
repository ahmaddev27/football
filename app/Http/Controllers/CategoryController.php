<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index(){
        return view('dashboard.category.index');
    }


    public function list(Category $iteam ){
        return DataTables::of($iteam->orderBy('created_at','DESC'))
            ->addIndexColumn()


            ->editColumn('posts', function ($iteam) {

                return $iteam->posts()->count();

            })
            ->editColumn('videos', function ($iteam) {

                return $iteam->videos()->count();

            })



                ->editColumn('action', function ($iteam) {



                return '

  <a class="btn btn-info"  id="edit"  href="#" data-toggle="modal" data-target="#editModal" model_id="'.$iteam->id.'"
                            title="تعديل">
                        <i class="fa fa-edit"></i>
                    </a>




                                 <a href="#" id="delete" title="حذف" route="' . route('dashboard.category.destroy') . '" model_id="' . $iteam->id . '"
                               class="btn btn-danger "> <i class="fa fa-trash"></i></a>
                        ';
            })

            ->rawColumns(['action','posts','videos'])
            ->make(true);
    }

    public function store(Request $request){
        Category::create(['name'=>$request->name,'slug'=>str_slug($request->name)]);
        return response()->json(['message'=>'تم حفظ البيانات بنجاح','status'=>true],200);
    }

    public function destroy(Request $request)
    {
        Category::findOrFail($request->id)->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }


//fetchdata to edit modla
    public function fetchdata(Request $request){
        $category=Category::findOrFail($request->id);
        echo json_encode($category);

    }


    public function update(Request $request){
        $category=Category::findOrFail($request->id);
        $category->update(['name'=>$request->name,'slug'=>str_slug($request->name)]);
        return response()->json(['message'=>'تم حفظ البيانات بنجاح','status'=>true],200);
    }


}
