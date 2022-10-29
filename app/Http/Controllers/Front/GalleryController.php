<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GalleryController extends Controller
{
    public function galleries(){
        return view('front.Gallery.galleries');

    }

    public function gallery($slug){
        $gallery=Gallery::where('slug',$slug)->with('images')->first();


        if ($gallery){
            if (!Cookie::get('gallery_view'.$gallery->id)) {
                Cookie::queue('gallery_view'. $gallery->id, 30);
                $gallery->increment('views', 1);
            }

        }

        return view('front.Gallery.gallery',['gallery'=>$gallery]);


    }
}
