<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon;
use DB;
class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }
 function index(){
        return view('Auth.Register');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|confirmed|min:8',
            'student_no'=> 'required|max:6|min:2|starts_with:41',
            'school_branch' => 'required|starts_with:Caloocan,Manila,Davao,Iloilo',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon\Carbon::now('Hongkong'),
            'updated_at' => Carbon\Carbon::now('Hongkong'),
            'avatar_photo' => "empty",
        ]);
        Profile::create([
            'email' => $request->email,
            'name' => $request->name,
            'school_id_number' => $request->student_no,
            'contact_number' => "contact_number",
            'age' => 0,
            'birthdate' => now(),
            'status' => "status",
            'gender' => "gender",
            'school_branch' => $request->school_branch,
            'interests' => "interests",
            'address' => "address",
            'avatar_photo' => "empty",
        ]);
            return redirect()->route('dashboard')->with('profile_edit','Go to your Profile to Edit your Personal Information');
    }
}