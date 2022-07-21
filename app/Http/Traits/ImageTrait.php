<?php
namespace App\Http\Traits;


use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageTrait {
    public function saveImage($request,$w,$h,$location) {

        $ImageName = str_random(16) . '.' . $request->getClientOriginalExtension();

        $ImagePath = public_path() . '/uploads/'.$location.'/';
        // check if directory for ProfileImage  exists, if not then create one
        if (!File::exists($ImagePath)) {
            File::makeDirectory($ImagePath, 0777, true);
        }
        // save the ProfileImage as it is

        if ($w!=null && $h!=null ){
            $im=Image::make($request->getRealPath())
                ->interlace(true)->fit($w,$h)->save($ImagePath . $ImageName);

        }else{

            $im=Image::make($request->getRealPath())
                ->interlace(true);
            $im->text('@ '.date('Y').' football ', 200, 50, function($font) {
                $font->size(44);
                $font->color('#fffff');
                $font->align('center');
                $font->valign('bottom');
                $font->angle(45);
            })->save($ImagePath . $ImageName);


        }

        return '/uploads/'.$location.'/' .  $ImageName;
    }


}
