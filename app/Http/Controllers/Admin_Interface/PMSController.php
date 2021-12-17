<?php

namespace App\Http\Controllers\Admin_Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use DB;
use Carbon;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Collection;
class PMSController extends Controller
{
    public function __construct(){
        $this->middleware(['lastactive']);
        $this->middleware(['sessionexpired']);
        $this->middleware(['auth']);
    }
    public function index(){
        $profiles = DB::table('profiles')->paginate(5);
        return view('Interface.pms.pms',[
            'profiles' => $profiles,
        ]);
    }
    public function Profile($id){
        $user_profile_id = Profile::findOrFail($id);
        $username = DB::table('users')->get();
        return view('Interface.pms.profile',[
            'user_profile_id' => $user_profile_id,
            'username' => $username
        ]);
    }
    public function Profile_edit($id, Request $request){
        $Id_user = Profile::findOrFail($id);
        $profile = new Profile();
        $username = User::findOrFail($id);
        $this->validate($request,[
            'email' => 'required_without_all|email',
            'school_id' => 'required_without_all|starts_with:41',
            'contact_number' => 'required_without_all|min:11|max:11||regex:/(09)[0-9]{9}/',
            'age' => 'required_without_all',
            'birth_date' => 'required_without_all|date',
            'status' => 'required_without_all|starts_with:Married,Single,Divorced,Widowed|in:Married,Single,Divorced,Widowed',
            'gender' => 'required_without_all|in:Male,Female',
            'school_branch' => 'required_without_all',
            'interests' => 'required_without_all',
            'address' => 'required_without_all',
            'avatar_photo' => 'required_without_all:email,school_id,contact_number,age,birth_date,status,gender,school_branch,interests,address|nullable'
        ]);
        
        $lll = DB::Table('profiles')->select('avatar_photo')->where('id',$Id_user->id)->get();
            $image_dir = $lll[0]->avatar_photo;
            if($file = $request->hasFile('avatar_photo')){
                $files = $request->file('avatar_photo');
                $extension = $files->getClientOriginalExtension();
                $new_file_name = time(). '.'. $extension;
                    File::delete(public_path('storage/'. $image_dir));
                if(!$files->move('storage', $new_file_name)){
                    $profile->avatar_photo = $new_file_name;
                    $profile->save();
                }
            }else{
                if(empty($new_file_name)){
                    $new_file_name = $Id_user->avatar_photo;
                }
            }
        $Id_user->update([
            'email' => $request->email,
            'school_id_number' => $request->school_id,
            'contact_number' => $request->contact_number,
            'age' => $request->age,
            'birthdate' => Carbon\Carbon::parse($request->birth_date),
            'status' => $request->status,
            'gender' => $request->gender,
            'school_branch' => $request->school_branch,
            'interests' => $request->interests,
            'address' => $request->address,
            'avatar_photo' => $new_file_name,
        ]);

        $username->update([
            'avatar_photo' =>  $new_file_name,
            'email' => $request->email,
        ]);
        return back()->with('profile_update','Information Saved');
    }
}
