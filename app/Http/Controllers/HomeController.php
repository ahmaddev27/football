<?php

namespace App\Http\Controllers;

use App\Events\NewNotification;
use App\Models\Admin;
use App\Models\Article;
use App\Models\Comment;
use App\Models\inbox;
use App\Models\Page;
use App\Models\Post;
use App\Notifications\CommentNotification;
use App\Notifications\ContactNotification;
use Goutte\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function home(){
      $matches=$this->getTodayMatches();

       $matches2=[];

       foreach ($matches as $x){
           if ( $x['status'] =='مباشر') {
               $matches2[] = $x;}
       }

        foreach ($matches as $x){
            if ( $x['status'] =='لم تبدأ') {
                $matches2[] = $x;}
        }



        $data= $this->paginate($matches2,3);
        return view('front.home',['data'=>$data]);
    }





    public function matches(){


        $p= Http::get('https://www.filgoal.com/matches/ajaxlist?championshipId='.request()->champion.'&date='. date('Y-m-d'));
        $x= json_decode($p);
        $collection = collect($x);



        $list = [];
        foreach($collection as $item) {
            $list[$item->ChampionshipName][] = $item;
        }

            return view('front.matches',['collection'=>$list]);

       }


    public function getTodayMatches(){

        $client = new Client();
        $crawler = $client->request('GET', 'https://www.filgoal.com/matches');
        $data = [];
        $index = 0;
        $crawler->filter('#match-list-viewer div  ')
            ->each(function ($node) use (&$data, &$index) {


                $team1 = $node->filter('div div.f a strong')
                    ->each(function ($node) use (&$data,&$index) {
                        $data[$index]['team1'] = $node->text();

                    });

                $team2= $node->filter('div div.s a strong ')
                    ->each(function ($node) use(&$data,&$index) {
                        $data[$index]['team2']=$node->text();

                    });

                $img1= $node->filter('div div.f img')
                    ->each(function ($node) use(&$data,&$index) {
                        $data[$index]['img1']='https:'.$node->attr('data-src');

                    });

                $team1_result= $node->filter('div div.f b ')
                    ->each(function ($node) use(&$data,&$index) {
                        $data[$index]['team1_result']=$node->text();

                    });

                $team2_result = $node->filter('div div.s b ')
                    ->each(function ($node) use(&$data,&$index) {
                        $data[$index]['team2_result']=$node->text();
                    });

                $l= $node->filter('h6 ')
                    ->each(function ($node) use(&$data,&$index) {
//               $int = intval(preg_replace('/[^0-9]+/', '', $node->attr('href')), 10);
                        $data[$index]['l']=$node->text();

                    });



                $l2= $node->filter('h6 a ')
                    ->each(function ($node) use(&$data,&$index) {
//               $int = intval(preg_replace('/[^0-9]+/', '', $node->attr('href')), 10);
                        $data[$index]['logo']= preg_replace('/[^0-9]/', '', $node->attr('href')) ;

                    });

                $status= $node->filter('div div.m  span ')
                    ->each(function ($node) use(&$data,&$index) {
                        $data[$index]['status']=$node->text();

                    });


                $img2= $node->filter('div div.s img')
                    ->each(function ($node) use(&$data,&$index) {
                        $data[$index]['img2']='https:'.$node->attr('data-src');

                    });
                $time =$node->filter(' div div.match-aux span ')
                    ->each(function ($node) use(&$data,&$index) {
                        $data[$index]['time']=$node->text();
                    });


                $index++;
            });

        foreach($data as $key=>$row){
            if (!array_key_exists('time', $row)){
                unset($data[$key]);
            }
        }


        return  $dataUnice=$this->super_unique($data,'team1');

//                $ss= $this->paginate($dataUnice);


    }



    public function post($slug){

        $post=Post::where('slug',$slug)->first();
        if ($post){
            if (!Cookie::get('post_view_'.$post->id)) {
                Cookie::queue('post_view_'. $post->id, 30);
                $post->increment('views', 1);

                return view('front.post',['post'=>$post]);
        }else{
                return view('front.post',['post'=>$post]);
        }


        }

    }


    public function search(){

        $posts =Post::orderBy('created_at', 'DESC')
            ->WhenSearch(request()->search)
            ->paginate(12);
        return view('front.search',[
            'posts'=>$posts
        ]);
    }

    public function pages($id){
        $page=Page::findOrFail($id);
        return view('front.page',['page'=>$page]);
    }

    public function contact(Request $request){

      $inbox=inbox::create($request->all());

        $data=[
            'title'=>'رسالة جديدة : '.str_limit($inbox->title,50),
            'created_at'=>$inbox->created_at,
            'sound'=>'https://assets.mixkit.co/sfx/download/mixkit-software-interface-start-2574.wav',
            'url_route'=>'../dashboard/inbox/show'.$inbox->id,
        ];

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new ContactNotification($inbox));
        }

        event(new NewNotification($data));

        return response()->json(['message' => 'تم ارسال رسالتك بنجاح  سيتم الرد قريبا شكرا لتواصلك معنا', 'status' => true], 200);

    }


    public function article($slug){


        if(Auth::guard('admin')->check()){
             $article=Article::where('slug',$slug)->first();
            return view('front.article',['article'=>$article]);

        }else{
            $article=Article::where('slug',$slug)->first();
            auth()->id()==$article->user_id?$article=Article::where('slug',$slug)->first(): $article=Article::where('slug',$slug)->where('status','منشور')->first();

            if ($article){
                if (!Cookie::get('article_view_'.$article->id)) {
                    Cookie::queue('article_view_' . $article->id, 30);
                    $article->increment('views', 1);
                }

                return view('front.article',['article'=>$article]);
            }else{
                return  redirect()->route('home');
            }
        }

    }


    public function comment(Request $request){


        $comment= Comment::create([
           'body'=>$request->comment,
            'article_id'=>$request->article_id ,
            'user_id'=>auth()->id(),
            ]);


        $article=Article::where('id',$request->article_id)->first();

        $data=[
            'title'=>'تم اضافة تعليق جديد : '.str_limit($comment->body,50),
            'created_at'=>$comment->created_at,
            'sound'=>'https://assets.mixkit.co/sfx/download/mixkit-software-interface-start-2574.wav',
            'url_route'=>'../article/'.$article->slug,
        ];

        $admins = Admin::all();
        foreach ($admins as $admin) {
            $admin->notify(new CommentNotification($comment));
        }

        event(new NewNotification($data));

        return response()->json(['message' => 'تم اضافة التعليق بنجاح شكرا لك', 'status' => true], 200);


    }


    public function commentdelete(Request $request){
        $comment=Comment::findOrFail($request->id);
        $comment->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);
    }
}
