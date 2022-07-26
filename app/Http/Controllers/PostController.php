<?php

namespace App\Http\Controllers;
use App\Events\NewNotification;
use App\Http\Traits\ImageTrait;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;


use Illuminate\Http\Request;
use App\Notifications\CreatePost;
use Yajra\DataTables\DataTables;

class PostController extends Controller{


    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    use ImageTrait;
    public function index(){
        return view('dashboard.post.index');
    }


    public function list(Post $iteam ){
        return DataTables::of($iteam->orderBy('created_at','DESC'))
            ->addIndexColumn()


            ->editColumn('category', function ($iteam) {

                return @$iteam->category->name;

            })

            ->editColumn('title', function ($iteam) {
                return str_limit(@$iteam->title,20);

            })
       ->editColumn('description', function ($iteam) {
                return str_limit(@$iteam->description,80);

            })


            ->addColumn('check',function ($help){
                return '<input type="checkbox" class="checkbox" name="item[]" id="checkItem" value="'.$help->id.'">';
            })

            ->editColumn('action', function ($iteam) {



                return '
  <a class="btn btn-info"  id="edit"  href="'.route('dashboard.post.edit',$iteam->id).'" title="تعديل">
                        <i class="fa fa-edit"></i>
                    </a>

                                 <a href="#" id="delete" title="حذف" route="' . route('dashboard.post.destroy') . '" model_id="' . $iteam->id . '"
                               class="btn btn-danger "> <i class="fa fa-trash"></i></a>
                        ';
            })

            ->rawColumns(['action','category','description','title','check'])
            ->make(true);
    }



    public function create(){
        $categories=Category::all();
        return view('dashboard.post.create',['categories'=>$categories]);
    }

    public function store(Request $request){

     $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'image' => 'required',
//            'championship' => 'required',
        ]);

        if ($request->championship){
            $ch=implode(",",$request->championship);

        }else{
            $ch=null;
        }
        if ($request->file('image')) {
           $post= Post::create([
                'category_id' => $request->category_id,
                'title' => $request->title,
                'details' => $request->details,
                'description' => $request->description,
                'tags' => $request->tags,
                'championship' => $ch,
                'image' => $this->saveImage($request->file('image'), null, null, 'posts'),
                'slug' => str_slug($request->title)
            ]);


           $data=[

               'title'=>'خبر جديد : '.str_limit($post->title,50),
               'created_at'=>$post->created_at,
               'url_route'=>'post/'.$post->slug,
               'sound'=>'https://assets.mixkit.co/sfx/download/mixkit-software-interface-start-2574.wav'
            ];


            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new CreatePost($post));
            }

            event(new NewNotification($data));
            return Redirect()->route('dashboard.post.index')->with(['message' => 'تمت اضافة الخبر بنجاح', 'alert-type' => 'success']);
        }


    }


    public function edit($id){
        $post=Post::findOrFail($id);
        $categories=Category::all();
        return view('dashboard.post.edit',['post'=>$post,'categories'=>$categories]);
    }


    public function destroy(Request $request)
    {
        $post=Post::findOrFail($request->id);
        if(file_exists(public_path().$post->image)){
            unlink(public_path().$post->image);
        }
         $post->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }




    public function update($id,Request $request){
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'details' => 'required',
            'description' => 'required',
            'tags' => 'required',
//            'image' => 'required',
//            'championship' => 'required',
        ]);

        if ($request->championship){
            $ch=implode(",",$request->championship);
        }else{
            $ch=null;
        }
        $post=Post::findOrFail($id);

        if ($request->file('image')){

            if(file_exists(public_path().$post->image)){
                unlink(public_path().$post->image);
            }

            $post->update([
                'category_id'=>$request->category_id,
                'title'=>$request->title,
                'details'=>$request->details,
                'description'=>$request->description,
                'tags'=>$request->tags,
                'championship'=>$ch,
                'image'=> $this->saveImage($request->file('image'),null,null,'posts'),
                'slug'=>str_slug($request->title)
            ]);


            return Redirect()->route('dashboard.post.index')->with(['message' => 'تم تعديل الخبر بنجاح', 'alert-type' => 'success']);

        }else{
            $post->update([
                'category_id'=>$request->category_id,
                'title'=>$request->title,
                'details'=>$request->details,
                'description'=>$request->description,
                'tags'=>$request->tags,
                'championship'=>$ch,
                'slug'=>str_slug($request->title)
            ]);

            return Redirect()->route('dashboard.post.index')->with(['message' => 'تم تعديل الخبر بنجاح', 'alert-type' => 'success']);

        }
    }


    public function destroyall(Request $request)
    {
        $ids = $request->id;
        foreach ($ids as $id){
            $post=Post::findOrFail($id);
            if(file_exists(public_path().$post->image)){
                unlink(public_path().$post->image);
            }
            $post->delete();
        }
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }


}

