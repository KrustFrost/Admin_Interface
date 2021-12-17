<?php

namespace App\Http\Controllers\Admin_Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Profile;
use Auth;
use Carbon;
use File;
use Illuminate\Support\Facades\Hash;
class UMSController extends Controller
{
    public function __construct(){
        $this->middleware(['lastactive']);
        $this->middleware(['auth']);
        $this->middleware(['sessionexpired']);
    }
    public function index(){
        $users = DB::table('users')->paginate(5);
        return view('interface.ums.ums',[
            'user' => $users,
        ]);
    }
    public function delete($id,Request $request){
        $Id_user = Profile::findOrFail($id);
        $lll = DB::Table('profiles')->select('avatar_photo')->where('id',$Id_user->id)->get();
        $image_dir = $lll[0]->avatar_photo;
        File::delete(public_path('storage/'. $image_dir));
        DB::table('users')->where('id',array($request->submit))->delete();
        DB::table('profiles')->where('id',array($request->submit))->delete();
        return back();
    }
    public function updateview($id){
        $Id_user = User::findOrFail($id);
        return view('interface.ums.edit',[
            'Id_user' => $Id_user
        ]);
        return view('Interface.ums');
    }
    public function update($id,Request $request){
        $user = User::findOrFail($id);
        $Profile = Profile::findOrFail($id);
        $this->validate($request,[
            'name' => 'required_without_all',
            'email' => 'required_without_all|email',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon\Carbon::now('Hongkong')
        ]);
        $Profile->update([
            'name' => $request->name,
            'updated_at' => Carbon\Carbon::now('Hongkong'),
            'email' => $request->email,
        ]);
        return back()->with('Saved','Information Saved');
    }
    public function createview(){
        return view('interface.ums.create');
    }
    public function create(Request $request){
        $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|confirmed|min:8',
            'student_no'=> 'required|max:6|min:6|starts_with:41',
            'school_branch' => 'required|starts_with:Caloocan,Manila,Davao,Iloilo',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon\Carbon::now('Hongkong'),
            'updated_at' => Carbon\Carbon::now('Hongkong'),
            'avatar_photo' => "empty"
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
            return redirect()->route('UMS');
    }
}