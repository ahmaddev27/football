<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Goutte\Client;
use Illuminate\Support\Facades\Http;


class ChampionController extends Controller
{

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

        return view('front.champion.championship',[
            'championship'=>$championship,
            'data'=>$data,
            'goals'=>$goals,
            'matches'=>$matches,
            'yellow'=>$yellow,
            'red'=>$red,
            'logo'=>$logo,
            'slug'=>$slug,
            'todaymatches'=>$this->standingMatches($slug),
        ]);

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



    public function topScorers($slug){

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



        $data2=$this->paginate($data,20);
        $data2->withPath(route('scorers',$slug));

        foreach($data2 as $key=>$row){
            if (($row['name']=='الإسم')){
                unset($data2[$key]);
            }
        }
        $logo= championship($slug)['logo'];
        $championship= championship($slug)['name'];
        $goals=$crawler->filter('#dhd ul.l > li:nth-child(1) ')->text();
        $matches=$crawler->filter('#dhd ul.l > li:nth-child(2) ')->text();
        $yellow=$crawler->filter('#dhd ul.l > li:nth-child(3) ')->text();
        $red=$crawler->filter('#dhd ul.l > li:nth-child(4) ')->text();

        return view('front.champion.topScorers',['topScorers'=>$data2,'logo'=>$logo,'championship'=>$championship,

            'goals'=>$goals,
            'matches'=>$matches,
            'yellow'=>$yellow,
            'red'=>$red,
            'slug'=>$slug,
            'todaymatches'=>$this->standingMatches($slug),

        ]) ;

    }




    public function MatchesBychampionshipId($championshipId){

        $logo= championship($championshipId)['logo'];
        $championship= championship($championshipId)['name'];

        $p= Http::get('https://www.filgoal.com/matches/ajaxlist?teamId='.request()->team.'&championshipId='.$championshipId.'&week='.request()->week);
        $x= array_reverse(json_decode($p));
        $data=$this->paginate($x,10);
        $data->withPath(route('standing.matches',$championshipId));


        $client = new Client();
        $crawler = $client->request('GET', 'https://www.filgoal.com/championships/'.$championshipId);
        $teams = [];
        $index = 0;


        $crawler->filter('.fg_team_slider ul')->each(function ($node)use(&$teams,&$index) {
            $node->filter('li a')
                ->each(function ($node) use (&$teams, &$index) {
                    $teams[$index]['id'] = preg_replace('/[^0-9]+/', '', $node->attr('href'));
                    $teams[$index]['name'] = $node->text();
                    $index++;
                });


        });

        return view('front.champion.championshipMatches',['data'=>$data, 'logo'=>$logo,
            'slug'=>$championshipId,'championship'=>$championship,'teams'=>$teams]);

    }

}
