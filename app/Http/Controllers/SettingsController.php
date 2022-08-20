<?php

namespace App\Http\Controllers;

use App\Http\Traits\ImageTrait;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $setting = Setting::all();
        return view('dashboard.settings.index', ['settings' => $setting]);
    }

    public function store(Request $request)
    {

        if ($request->hasFile('banner')) {
            $banner = $request->file('banner');
            $setting = Setting::where('key', '=', 'banner')->first();
            if ($banner && $setting) {
                if (file_exists(public_path() . $setting->value)) {
                    unlink(public_path() . $setting->value);
                }
                $setting->update(['value' => $this->saveImage($request->file('banner'), 300, 600, 'banner')]);
            }


        }


        if ($request->hasFile('banner_two')) {
            $banner = $request->file('banner_two');
            $setting = Setting::where('key', '=', 'banner_two')->first();
            if ($banner && $setting) {

                if (file_exists(public_path() . $setting->value)) {
                    unlink(public_path() . $setting->value);
                }
                $setting->update(['value' => $this->saveImage($request->file('banner_two'), 600, 82, 'banner_two')]);
            }
        }


        if ($request->hasFile('banner_three')) {
            $banner = $request->file('banner_three');
            $setting = Setting::where('key', '=', 'banner_three')->first();
            if ($banner && $setting) {
                if (file_exists(public_path() . $setting->value)) {
                    unlink(public_path() . $setting->value);
                }
                $setting->update(['value' => $this->saveImage($request->file('banner_three'), 300, 600, 'banner_three')]);
            }
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $setting = Setting::where('key', '=', 'image')->first();
            if ($image && $setting) {
                if (file_exists(public_path() . $setting->value)) {
                    unlink(public_path() . $setting->value);
                }
                $setting->update(['value' => $this->saveImage($request->file('image'), 600, 82, 'image')]);

            }

        }


        if ($request->hasFile('icon')) {
            $icon = $request->file('icon');
            $setting = Setting::where('key', '=', 'icon')->first();
            if ($icon && $setting) {
                if (file_exists(public_path() . $setting->value)) {
                    unlink(public_path() . $setting->value);
                }
                $setting->update(['value' => $this->saveImage($request->file('icon'), 52, 60, 'icon')]);

            }



        }


        foreach (array_except($request->toArray(), ['_token', 'banner', 'banner_two', 'banner_three', 'icon', 'image']) as $key => $req) {
            $setting = Setting::where('key', $key)->first();
            $setting->update(['value' => $req]);
        }

        return response()->json(['message' => 'تم تحديث البيانات بنجاح', 'status' => true, 'icon' => 'success'], 200);

    }
}

