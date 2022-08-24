<?php

function setting($setting){
    return \App\Models\Setting::where('key',$setting)->first()->value;
}

function championship($id){
    $data= [
        '1079'=>['id'=>1079,'name'=>'الدوري المصري','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1079.png'],
        '1140'=>['id'=>1140,'name'=>'الدوري الالماني','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1140.png'],
        '1141'=>['id'=>1141,'name'=>'الدوري الفرنسي','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1141.png'],
        '1147'=>['id'=>1147,'name'=>'الدوري الايطالي','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1147.png'],
        '1139'=>['id'=>1139,'name'=>'الدوري الانجليزي','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1139.png'],
        '1146'=>['id'=>1146,'name'=>'الدوري الاسباني','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1146.png'],
        '1152'=>['id'=>1152,'name'=>'الدوري التركي','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1152.png'],
        '1142'=>['id'=>1142,'name'=>'الدوري الهولندي','logo'=>'https://semedia.filgoal.com/Photos/Championship/Medium/1142.png'],
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
            return 'info';
        case'بعد قليل':
            return 'warning';
        case'انتهت':
            return 'secondary';
        case'مباشر':
            return 'danger';
            case'الشوط الاول':
            return 'warning';


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
?>

