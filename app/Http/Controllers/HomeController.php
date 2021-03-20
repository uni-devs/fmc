<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $registrations = auth()->user()->registrations()->get();
        if (auth()->user()->hasAnyRole('trainer')){
            $trainer_workshop = Workshop::where("trainer_id",auth()->id())->get();
            return view('home',compact('trainer_workshop'));
        }
        return view('home',compact('registrations'));
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


