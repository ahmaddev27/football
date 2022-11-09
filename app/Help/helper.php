<?php

function setting($setting){
    return \App\Models\Setting::where('key',$setting)->first()->value;
}

function championship($id){
    $data= [

        '1140'=>['id'=>1140,'name'=>'الدوري الالماني','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1140.png'],
        '1141'=>['id'=>1141,'name'=>'الدوري الفرنسي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1141.png'],

        '1147'=>['id'=>1147,'name'=>'الدوري الايطالي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1147.png'],
        '1139'=>['id'=>1139,'name'=>'الدوري الإنجليزي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1139.png'],
        '1146'=>['id'=>1146,'name'=>'الدوري الاسباني','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1146.png'],
        '1178'=>['id'=>1178,'name'=>'دوري أبطال أوروبا','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/medium/1178.png'],
        '1182'=>['id'=>1182,'name'=>'الدوري المصري','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1182.png'],


        '1184'=>['id'=>1184,'name'=>'الدوري البرتغالي ','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1184.png'],
        '1179'=>['id'=>1179,'name'=>'الدوري الاوروبي ','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1179.png'],
        '1167'=>['id'=>1167,'name'=>'الدوري السعودي للمحترفين','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1167.png'],

        '1144'=>['id'=>1144,'name'=>'دوري نجوم قطر ','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/medium/1144.png'],
        '1142'=>['id'=>1142,'name'=>'الدوري الهولندي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1142.png'],


        '1152'=>['id'=>1152,'name'=>'الدوري التركي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1152.png'],
        '1170'=>['id'=>1170,'name'=>'الدوري اليوناني','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1170.png'],
        '1153'=>['id'=>1153,'name'=>'الدوري البلجيكي','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1153.png'],
        '1145'=>['id'=>1145,'name'=>'الدوري السويسيري','type'=>'0','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1145.png'],
        '1111'=>['id'=>1111,'name'=>'كأس العالم FIFA قطر 2022','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1111.png'],

        '1180'=>['id'=>1180,'name'=>'دوري المؤتمر الأوروبي','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1180.png'],
        '1171'=>['id'=>1171,'name'=>'دوري أبطال إفريقيا','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1171.png'],
        '1172'=>['id'=>1172,'name'=>'كأس الكونفدرالية','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1172.png'],

        '1177'=>['id'=>1177,'name'=>'كأس الرابطة الإنجليزية','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1177.png'],

        '1200'=>['id'=>1200,'name'=>'خليجي 25','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1200.png'],

        '1110'=>['id'=>1110,'name'=>'دوري ابطال اسيا','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1110.png'],
        '1097'=>['id'=>1097,'name'=>'دوري الأمم الأوروبية المستوى الأول','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1097.png'],
        '1127'=>['id'=>1127,'name'=>'دوري الأمم الأوروبية المستوى الثاني','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1127.png'],
        '1128'=>['id'=>1128,'name'=>'دوري الأمم الأوروبية المستوى الثالث','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1128.png'],
        '1124'=>['id'=>1124,'name'=>'دوري الأمم الأوروبية المستوى الرابع','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1124.png'],


        '1137'=>['id'=>1137,'name'=>'كوبا ليبرتادوريس','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1137.png'],
        '1162'=>['id'=>1162,'name'=>'كوبا سود أمريكانا','type'=>'1','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1162.png'],







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

    if ($key==null && $value==null){
        return \App\Models\Post::orderBy('created_at','DESC')->get();

    }elseif($key=='views' && $value=null){
        return \App\Models\Post::orderBy('views','DESC')->get();
    }else{
        return \App\Models\Post::orderBy('created_at','DESC')->where($key,'like','%'.$value.'%')->get();
    }
}

function category($value){


    if ($value==null){
        return \App\Models\Category::all();

    }else{
        return \App\Models\Category::where('name','like','%'.$value.'%')->first()->id ?? null;
    }
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



function articles($key){

    if ($key==null){
        return \App\Models\Article::orderBy('created_at','DESC')->where('status','منشور')->get();

    }else{
        return \App\Models\Article::orderBy('views','DESC')->where('status','منشور')->get();

    }
}


function pages(){
    return \App\Models\Page::orderBy('created_at','DESC')->get();

}








?>

