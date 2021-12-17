<?php

namespace App\Http\Controllers\Admin_Interface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Library;
use Response;
use Storage;
use File;
class LMSController extends Controller
{
    public function __construct(){
        $this->middleware(['lastactive']);
        $this->middleware(['sessionexpired']);
        $this->middleware(['auth']);
    }
    public function index(){   
         
        $librarys = DB::table('libraries')->paginate(5);
        return view('interface.lms.lms',[
            'library' => $librarys
        ]);
       
    }
    public function index_download($id,Request $request){
        $user_book = DB::table('libraries')->where('id',$id)->get();
        return response()->download(public_path().'\storage'.'/'.$user_book[0]->Title_of_Book);
        return redirect()->route('LMS');    
    }
    public function index_create(){
        return view('interface.lms.lms_create');
    }
    public function index_delete($id,Request $request){
        $Id_users = Library::findOrFail($id);
        $user_column = DB::Table('libraries')->select('Title_of_Book')->where('id',$Id_users->id)->get();
        $file_dir = $user_column[0]->Title_of_Book;
        File::delete(public_path('storage/'. $file_dir));
        DB::table('libraries')->where('id',array($request->submit_delete))->delete();
        return back();
    }

    public function index_create_store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'book' => 'required|file'
            ]);
        $library_model = new Library();
        if($request->hasFile('book')) {          
            $files = $request->file('book');
            $new_file_name =$files->getClientOriginalName();
            $library_model->create([
                'Title_of_Book' => $new_file_name,
                'Publisher_Name' => $request->name
            ])->save();
            if(!$files->move('storage', $new_file_name)){
                $library_model-=save();
            }

        return redirect()->route('LMS');
        }
    }
}
