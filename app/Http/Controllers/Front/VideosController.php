<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class VideosController extends Controller
{

    public function videos(){
        return view('front.Videos.videos');

    }


    public function fetchdata(Request $request){
        $v=Video::findOrFail($request->id);
        if (!Cookie::get('video_view_'.$v->id)) {
            Cookie::queue('video_view_' . $v->id, 30);
            $v->increment('views', 1);
        }
        return response()->json($v);

    }

}
