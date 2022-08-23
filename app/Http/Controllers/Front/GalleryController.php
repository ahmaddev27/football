<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function galleries(){
        return view('front.Gallery.galleries');

    }

    public function gallery($slug){
        $gallery=Gallery::where('slug',$slug)->with('images')->first();
        return view('front.Gallery.gallery',['gallery'=>$gallery]);

    }
}
