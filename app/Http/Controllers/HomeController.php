<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Goutte\Client;
use Symfony\Component\BrowserKit\HttpBrowser;

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
           if ( $x['status']=='مباشر'|| $x['status']=='لم تبدأ'){
             $matches2[]=$x;
          }
       }

        $data= $this->paginate($matches2,3);
        return view('front.home',['data'=>$data]);
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



    public function getTopScorers($slug){

        $championship= championship($slug)['name'];
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.filgoal.com/championships/'.$slug.'/scorers/'.str_replace(" ", "-", $championship));
        $data = [];
        $index = 0;

        $crawler->filter('.fg_tbl .fg_rw ')->each(function ($node)use(&$data,&$index) {
            $node->filter('.t1  img')
                ->each(function ($node) use(&$data,&$index) {
                    $data[$index]['image']='https:'.$node->attr('data-src');

                });


            $node->filter('div.fg_cl.t1 ')
                ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['name']=$node->text();

                });


            $node->filter('div.fg_cl.t2:nth-child(2)')
                ->each(function ($node) use(&$data,&$index) {
                    $data[$index]['goals']=$node->text();

                });


            $node->filter('div.fg_cl.t2:nth-child(3)')
                ->each(function ($node) use(&$data,&$index) {
                    $data[$index]['matches']=$node->text();

                });





            $node->filter('.fg_cl.t3')
                ->each(function ($node) use(&$data,&$index) {
                    $data[$index]['percentage']=$node->text();

                });

            $index++;

        });



        $data2=$this->paginate($data,'15');

        foreach($data2 as $key=>$row){
            if (($row['name']=='الإسم')){
                unset($data2[$key]);
            }
        }


        return $data2;


    }


    public function standingMatches($slug){

        $client = new Client();
        $crawler = $client->request('GET', 'https://www.filgoal.com/championships/'.$slug.'/matches/?championshipId=.'.$slug);
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

    }


    public function matches(){
        $data=$this->getTodayMatches();
        return view('front.matches',['data'=>$data]);
    }


    //standing matches table by name and id slug from [array] in helper (filgol.com)
    public function standing($slug){

       $championship= championship($slug)['name'];
       $logo= championship($slug)['logo'];
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.filgoal.com/championships/'.$slug.'/standings/'.str_replace(" ", "-", $championship));
        $data = [];
        $index = 0;

       $crawler->filter('.fg_tbl .fg_rw ')->each(function ($node)use(&$data,&$index) {
         $node->filter('.fg_cl.t1')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['id']=$node->text();

               });


            $node->filter('.fg_cl.t2')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['team']=$node->text();

               });

            $node->filter('.fg_cl.t2 img')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['image']='https:'.$node->attr('data-src');

               });



           $node->filter('div.fg_cl.t3:nth-child(3)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['play']=$node->text();

               });

           $node->filter('div.fg_cl.t3:nth-child(4)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['home']=$node->text();

               });

           $node->filter('div.fg_cl.t3:nth-child(5)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['away']=$node->text();

               });

           $node->filter('div.fg_cl.t3:nth-child(6)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['win']=$node->text();

               });

           $node->filter('div.fg_cl.t3:nth-child(7)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['lose']=$node->text();

               });

           $node->filter('div.fg_cl.t3:nth-child(8)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['draw']=$node->text();

               });


           $node->filter('div.fg_cl.t3:nth-child(9)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['goals']=$node->text();

               });

           $node->filter('div.fg_cl.t3:nth-child(10)')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['goals_in']=$node->text();

               });

            $node->filter('.fg_cl.t3')
               ->each(function ($node) use(&$data,&$index) {
                   $data[$index]['points']=$node->text();

               });

           $index++;

       });

       foreach($data as $key=>$row){
            if (($row['id']=='الترتيب')){
                unset($data[$key]);
            }
        }

        $goals=$crawler->filter('#dhd ul.l > li:nth-child(1) ')->text();
        $matches=$crawler->filter('#dhd ul.l > li:nth-child(2) ')->text();
        $yellow=$crawler->filter('#dhd ul.l > li:nth-child(3) ')->text();
        $red=$crawler->filter('#dhd ul.l > li:nth-child(4) ')->text();

       return view('front.championship',[
           'championship'=>$championship,
           'data'=>$data,
           'goals'=>$goals,
           'matches'=>$matches,
           'yellow'=>$yellow,
           'red'=>$red,
           'logo'=>$logo,
           'topScorers'=>$this->getTopScorers($slug),
           'todaymatches'=>$this->standingMatches($slug),
           ]);

    }







    public function paginate($items, $perPage = 200, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);

    }

    function super_unique($array,$key)
    {
        $temp_array = [];
        foreach ($array as &$v) {
            if (!isset($temp_array[$v[$key]]))
                $temp_array[$v[$key]] =& $v;
        }
        $array = array_values($temp_array);
        return $array;

    }

}
