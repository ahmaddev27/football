<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;
use function GuzzleHttp\Promise\all;

class GalleryController extends Controller
{
    public function index()
    {
        return view('dashboard.gallery.index');
    }

    public function list(Gallery $iteam)
    {
        return DataTables::of($iteam->orderBy('created_at', 'DESC'))
            ->addIndexColumn()
            ->editColumn('images', function ($iteam) {
                return $iteam->images()->count();

            })
            ->editColumn('description', function ($iteam) {
                return str_limit(@$iteam->description, 60);
            })
            ->editColumn('action', function ($iteam) {
                return ' <a class="btn btn-info"  id="show" href="' . route('dashboard.gallery.edit', $iteam->id) . '"title="تعديل" >
                        <i class="fa fa-edit"></i> </a>
                         <a href="#" id="delete" title="حذف" route="' . route('dashboard.gallery.destroy') . '" model_id="' . $iteam->id . '"
                    class="btn btn-danger "> <i class="fa fa-trash"></i></a>
                        ';
            })
            ->rawColumns(['action', 'description', 'images'])
            ->make(true);
    }


    public function create()
    {
        return view('dashboard.gallery.create');
    }


    public function upload(Request $request)
    {

        if (!$request->description) {
            return response()->json(['message' => 'يرجى ادخال اسم الالبوم', 'status' => false], 404);
        }

        $gallery = Gallery::where('description', $request->description)->first();
        if (!$gallery) {
            $gallery = Gallery::create(['description' => $request->description,'championship'=>$request->championship,'slug'=>str_slug($request->description)]);
        }


        $file = $request->file('file');
        $Image = Image::make($file);
        $originalPath = public_path() . '/uploads/galleries/' . $gallery->id . '/';


        if (!file_exists($originalPath)) {
            mkdir($originalPath, 666, true);
        }

        $Image->text('@ '.date('Y').' football ', 200, 50, function($font) {
            $font->size(44);
            $font->color('#fffff');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(45);
        })->save($originalPath . $file->getClientOriginalName());

    $oldImage=\App\Models\Image::where('gallery_id',$gallery->id)->where('image','/uploads/galleries/' . $gallery->id . '/' . $file->getClientOriginalName())
        ->first();
         if (!$oldImage){
             $gallery->images()->create([
                 'gallery_id' => $gallery->id,
                 'image' => '/uploads/galleries/' . $gallery->id . '/' . $file->getClientOriginalName(),
             ]);
         }

    }



    public function edit($id){
       $gallery= Gallery::with(['images'])->findOrFail($id);
    return view('dashboard.gallery.edit',['gallery'=>$gallery]);
    }


    public function delete(Request $request)
    {
        if ($request->description) {
            $g = Gallery::where('description', $request->description)->first();

            \App\Models\Image::where('gallery_id', $g->id)
                ->where('image', '/uploads/galleries/' . $g->id . '/' . $request->filename)
                ->first()->delete();

            if (file_exists(public_path() . '/uploads/galleries/' . $g->id)) {
                unlink(public_path() . '/uploads/galleries/' . $g->id . '/' . $request->filename);
            }
        }
        return response()->json(['message' => 'تم الحذف بنجاح', 'status' => true], 200);
    }

    public function destroy(Request $request)
    {
        $g = Gallery::findOrFail($request->id);
        File::deleteDirectory(public_path() . '/uploads/galleries/' . $g->id);
        $g->delete();
        return response()->json(['message' => 'تم الحذف بنجاح', 'status' => true], 200);
    }



    public function deleteImage(Request $request){

        $image=\App\Models\Image::findOrFail($request->id);
        if (file_exists(public_path() . $image->image)) {
            unlink(public_path() .  $image->image);
        }
        $image->delete();
    }


    public function editUpload(Request $request)
    {

        if (!$request->description) {
            return response()->json(['message' => 'يرجى ادخال اسم الالبوم', 'status' => false], 404);
        }

       $gallery= Gallery::findOrFail($request->id);
           $gallery->update(['description' => $request->description,'championship'=>$request->championship,'slug'=>str_slug($request->description)]);


        $file = $request->file('file');
        $Image = Image::make($file);
        $originalPath = public_path() . '/uploads/galleries/' . $gallery->id . '/';


        if (!file_exists($originalPath)) {
            mkdir($originalPath, 666, true);
        }

        $Image->text('@ '.date('Y').' football ', 200, 50, function($font) {
            $font->size(44);
            $font->color('#fffff');
            $font->align('center');
            $font->valign('bottom');
            $font->angle(45);
        })->save($originalPath . $file->getClientOriginalName());

        $oldImage=\App\Models\Image::where('gallery_id',$gallery->id)->where('image','/uploads/galleries/' . $gallery->id . '/' . $file->getClientOriginalName())
            ->first();
        if (!$oldImage){
            $gallery->images()->create([
                'gallery_id' => $gallery->id,
                'image' => '/uploads/galleries/' . $gallery->id . '/' . $file->getClientOriginalName(),
            ]);
        }

    }


}
