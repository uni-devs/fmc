<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function home()
    {
        $users = User::doesntHave('roles')->select('id')->count();
        $trainers = User::role('trainer')->select('id')->count();
        $workshops = Workshop::select("id")->count();
        $regs = Registration::select("id")->count();
        return view('admin.home',compact('regs','users','trainers','workshops'));
    }

    public function searchTrainer(Request  $request)
    {
        $trainers = User::selectRaw("name as text, id as value, is_trainer")->where("name","LIKE","%".$request->query('q')."%")->get();
        return $trainers;
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'old_password'=>"required",
            "new_password"=>"required|confirmed|min:6",
        ]);
        $user = auth()->user();
        if (!Hash::check($request->old_password,$user->password)){
            return redirect()->back()->withErrors(['كلمة المرور القديمة خاطئة']);
        }
        $user->password = bcrypt($request->new_password);
        $user->save();
        return  redirect()->back()->with(['status'=>true,'msg'=>"تم تغير كلمة المرور"]);
    }

}


