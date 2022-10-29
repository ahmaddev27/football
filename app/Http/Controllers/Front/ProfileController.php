<?php

namespace App\Http\Controllers\Front;

use App\Events\NewNotification;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Article;
use App\Models\Post;
use App\Models\User;
use App\Notifications\CreatePost;
use App\Notifications\NewArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{


    public function __construct(){
        $this->middleware('auth:web');
    }


    public function profile (){

        return view('front.user.profile');
    }

    public function article (){


        return view('front.user.article');
    }

    public function articlePost (Request $request){
        $request->validate([
            'title' => 'required',
            'details' => 'required',

        ]);

        $article= Article::create([
            'title' => $request->title,
            'details' => $request->details,
            'slug' => str_slug($request->title),
            'user_id' => auth()->id(),
            'status'=>'معلق'
        ]);


        $data=[
            'title'=>'مقال جديد : '.str_limit($article->title,50),
            'created_at'=>$article->created_at,
            'url_route'=>'article/'.$article->slug,
            'sound'=>'https://assets.mixkit.co/sfx/download/mixkit-software-interface-start-2574.wav'
        ];

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new NewArticle($article));
        }

        event(new NewNotification($data));

        return Redirect()->route('home')->with(['message' => 'تمت اضافة المقالة بنجاح سيتم مراجعتها من قبل الادارة', 'alert-type' => 'success']);

    }

    public function updateProfile(Request $request){
        $user= User::findOrFail(auth()->id());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['confirmed'],
        ]);

        if ($request->password){
            $user->update(['password'=> Hash::make($request->password)]+$request->except('password'));
        }
        else{
            $user->update($request->except('password'));

        }

        return Redirect()->route('home')->with(['message' => 'تم حفظ البيانات بنجاح', 'alert-type' => 'success']);


    }


}
