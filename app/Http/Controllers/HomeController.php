<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Goutte\Client;
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

        //        $ss= $this->paginate($dataUnice);


    }



    public function post($slug){
        $post=Post::where('slug',$slug)->first();
        return view('front.post',['post'=>$post]);
    }



}
