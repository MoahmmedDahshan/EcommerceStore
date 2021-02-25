<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile(){
        $admin = Admin::where('id',auth('admin')->user()->id)->first();
        return view('dashboard.profile.edit',compact('admin'));
    }

    public function updateProfile(ProfileRequest $request){
//        try {
            $admin = Admin::where('id',auth('admin')->user()->id);

//            if password is exist and not empty
            if ($request->has('password') && $request->password != null){
                $request->merge(['password'=>bcrypt($request->password)]);
            }else{
                unset($request['password']);
            }
            unset($request['current_password']);
            unset($request['password_confirmation']);


            $admin->update($request->except(['_token','_method']));
            return redirect()->back()->with('success','تم تحديث البيانات بنجاح');

//        }catch (\Exception $ex){
//            return redirect()->back()->with('error','فشلت العملية');
//        }
    }
}
