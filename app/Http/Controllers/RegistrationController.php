<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Workshop;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register($id)
    {
        $workshop = Workshop::findOrFail($id);
        try {
            Registration::create([
                'user_id'=>auth()->id(),
                "workshop_id"=>$id,
            ]);
            return redirect()->route('workshops.single',$id)->with(['status'=>'true','msg'=>"شكرا لك , لقدتم التسجيل في الدورة بنجاح"]);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['هناك خطا برجاء المحاوله لاحقا']);
        }
    }
}
