<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class GalleryController extends Controller
{
    public function galleries(){
        return view('front.Gallery.galleries');

    }

    public function gallery($slug){
        $gallery=Gallery::where('slug',$slug)->with('images')->first();

        if(!session()->has('gallery_view_'.$gallery->id)) {
            session()->put('gallery_view_' . $gallery->id,1);
            $gallery->increment('views', 1);
        }


        if (!Cookie::get('gallery_view_'.$gallery->id)) {
            Cookie::queue('gallery_view_' . $gallery->id, 30);
            $gallery->increment('views', 1);
        }

        return view('front.Gallery.gallery',['gallery'=>$gallery]);

    }
}
