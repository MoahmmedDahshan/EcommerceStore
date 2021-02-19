<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShoppingMethodsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Dotenv\Exception;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function editShoppingMethods($type){
        if ($type == 'free'){
            $shopping_method = Setting::where('key','free_shopping_label')->first();
        }elseif ($type == 'inner'){
            $shopping_method = Setting::where('key','local_shopping_label')->first();

        }elseif ($type == 'outer'){
            $shopping_method = Setting::where('key','outer_shopping_label')->first();

        }else{
            $shopping_method = Setting::where('key','free_shopping_label')->first();
        }

//        return $shopping_method;

        return view('dashboard.settings.shopping.edit',compact('shopping_method'));
    }

    public function UpdateShoppingMethods(ShoppingMethodsRequest  $request ,$id){
        try {
            $shopping_method = Setting::find($id);
            DB::beginTransaction();
            $shopping_method->update([
                'plain_value'=>$request->plain_value,
            ]);
            $shopping_method->value = $request->value;
            $shopping_method->save();
            DB::commit();
            return redirect()->back()->with('success','تم تحديث البيانات بنجاح');
        }catch (Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('error','فشلت العملية');
        }

    }
}
