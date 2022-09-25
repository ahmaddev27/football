<?php

function setting($setting){
    return \App\Models\Setting::where('key',$setting)->first()->value;
}

function championship($id){
    $data= [

        '1140'=>['id'=>1140,'name'=>'الدوري الالماني','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1140.png'],
        '1141'=>['id'=>1141,'name'=>'الدوري الفرنسي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1141.png'],

        '1147'=>['id'=>1147,'name'=>'الدوري الايطالي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1147.png'],
        '1139'=>['id'=>1139,'name'=>'الدوري الانجليزي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1139.png'],
        '1146'=>['id'=>1146,'name'=>'الدوري الاسباني','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1146.png'],
        '1178'=>['id'=>1178,'name'=>'دوري أبطال أوروبا','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/medium/1178.png'],
        '1184'=>['id'=>1184,'name'=>'الدوري البرتغالي ','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1184.png'],
        '1167'=>['id'=>1167,'name'=>'الدوري السعودي للمحترفين','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1167.png'],

        '1079'=>['id'=>1079,'name'=>'الدوري المصري','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1079.png'],
        '1144'=>['id'=>1144,'name'=>'دوري نجوم قطر ','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/medium/1144.png'],
        '1142'=>['id'=>1142,'name'=>'الدوري الهولندي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1142.png'],

        '1152'=>['id'=>1152,'name'=>'الدوري التركي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1152.png'],
        '1170'=>['id'=>1170,'name'=>'الدوري اليوناني','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1170.png'],
        '1153'=>['id'=>1153,'name'=>'الدوري البلجيكي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1153.png'],
        '1145'=>['id'=>1145,'name'=>'الدوري السويسيري','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1145.png'],
        '1111'=>['id'=>1111,'name'=>'كأس العالم FIFA قطر 2022','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1111.png'],


    ];
    if(!$id==null && isset($data[$id])){
        return $data[$id];
    } else {
        return $data;
    }






}

function status($s)
{
    switch ($s) {
        case'لم تبدأ':
            return 'bg17';
        case'بعد قليل':
            return 'bg14 ';
        case'انتهت':
            return 'bg5';
        case'مباشر':
            return 'bg15';
            case'الشوط الاول':
            return 'bg9';
        case'الشوط الثاني':
            return 'bg16';
        case'تأجيل':
            return 'bg18';
            case'استراحة':
            return 'bg14';


    }

}



function posts($key,$value){

    if ($key==null||$value==null){
        return \App\Models\Post::orderBy('views','DESC')->get();

    }else{
        return \App\Models\Post::orderBy('created_at','DESC')->where($key,'like','%'.$value.'%')->get();

    }
}
function category($value){
    return \App\Models\Category::where('name','like','%'.$value.'%')->first()->id ?? 0;
}


function categories(){
    return \App\Models\Category::all();
}


function galleries($key,$value)
{
    if ($key == null || $value == null) {
        return \App\Models\Gallery::orderBy('created_at', 'DESC')->with('images')->get();

    }else{
        return \App\Models\Gallery::orderBy('created_at', 'DESC')->where($key,'like','%'.$value.'%')->with('images')->get();

    }
}

function videos($key,$value){


    if ($key == null || $value == null) {
        return \App\Models\Video::orderBy('created_at','DESC')->get();

    }else{
        return \App\Models\Video::orderBy('created_at', 'DESC')->where($key,'like','%'.$value.'%')->get();

    }



}

function articles(){
    return \App\Models\Article::orderBy('created_at','DESC')->where('status','منشور')->get();
}
?>

