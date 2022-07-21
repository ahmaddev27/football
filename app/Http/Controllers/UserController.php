<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.user.index');
    }


    public function list(User $iteam)
    {
        return DataTables::of($iteam->orderBy('created_at', 'DESC'))
            ->addIndexColumn()
            ->editColumn('comments', function ($iteam) {

                return $iteam->comments()->count();

            })
            ->editColumn('articles', function ($iteam) {
                return $iteam->articles()->count();
            })


            ->editColumn('action', function ($iteam) {

                return '   <a href="#" id="delete" title="حذف" route="' . route('dashboard.user.destroy') . '" model_id="' . $iteam->id . '"
                               class="btn btn-danger "> <i class="fa fa-trash"></i></a>
                        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }




    public function destroy(Request $request)
    {
        User::findOrFail($request->id)->delete();
        return response()->json(['message'=>'تم الحذف بنجاح','status'=>true],200);

    }


}
