<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageTrait;
use App\Models\Article;
use App\Models\Category;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller

{

    use ImageTrait;

    public function index(){
        $categories=Category::all();
        $videos =Video::orderBy('created_at', 'DESC')
            ->WhenSearch(request()->search)
            ->paginate(6);
        return view('dashboard.video.index',['videos'=>$videos,'categories'=>$categories]);

    }

    public function create(){
        $categories=Category::all();
        return view('dashboard.video.create',['categories'=>$categories]);
    }


    public function store(Request $request){

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'image' => 'required',
            'link' => 'required',
        ]);


        if ($request->file('image')) {
            Video::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'link' =>  str_replace('watch?v=','embed/',$request->link ),
                'image' => $this->saveImage($request->file('image'), null, null, 'videos'),
                'slug' => str_slug($request->title)
            ]);

            return Redirect()->route('dashboard.video.index')->with(['message' => 'تمت اضافة الفيديو بنجاح', 'alert-type' => 'success']);
        }



    }


    public function edit($id){
        $video=Video::findOrFail($id);
        $categories=Category::all();
        return view('dashboard.video.edit',['video'=>$video,'categories'=>$categories]);
    }
    public function update(Request $request,$id){

        $video=Video::findOrFail($id);

        if ($request->file('image')){

            if(file_exists(public_path().$video->image)){
                unlink(public_path().$video->image);
            }

            $video->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'link' =>  str_replace('watch?v=','embed/',$request->link ),
                'image' => $this->saveImage($request->file('image'), null, null, 'videos'),
                'slug' => str_slug($request->title)
            ]);



        }else{
            $video->update([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'link' =>  str_replace('watch?v=','embed/',$request->link ),
                'slug' => str_slug($request->title)
            ]);

        }
        return Redirect()->route('dashboard.video.index')->with(['message' => 'تم تعديل الفيديو بنجاح', 'alert-type' => 'success']);

    }


    public function destroy(Request $request)
    {
        $video=Video::findOrFail($request->id);
        if(file_exists(public_path().$video->image)){
            unlink(public_path().$video->image);
        }
        $video->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }



}
