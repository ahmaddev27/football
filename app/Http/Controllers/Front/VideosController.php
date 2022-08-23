<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{

    public function videos(){
        return view('front.Videos.videos');

    }


    public function fetchdata(Request $request){
        $v=Video::findOrFail($request->id);
        return response()->json($v);

    }

}
