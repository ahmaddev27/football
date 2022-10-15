<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller

{


    public function __construct()
    {
        $this->middleware('auth:admin');

    }

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

                                <a href="'. route('dashboard.user.edit',$iteam->id) . '"  title="تفاصيل"
                               class="btn btn-info "> <i class="fa fa-eye"></i></a>
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

    public function edit($id)
    {
      $user= User::findOrFail($id);
        return view('dashboard.user.edit',['user'=>$user]);

    }

    public function update(Request $request,$id){

      $user= User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => ['confirmed'],
        ]);

        if ($request->password){
            $user->update(['password'=> Hash::make($request->password)]+$request->except('password'));
        }
        else{
            $user->update($request->except('password'));

        }

        return Redirect()->route('dashboard.user.index')->with(['message' => 'تم حفظ البيانات بنجاح', 'alert-type' => 'success']);


    }



}
