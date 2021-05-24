<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserAuthController extends Controller
{
    //
    function login(){
        return view('auth.login');
    }

    function register(){
        return view('auth.register');
    }

    function create(Request $request){
        $request->validate([
            'name'=>'required | regex:/^[a-zA-Z]/u',
            'email'=>'required | regex:/^[a-zA-Z0-9]+@[a-zA-Z]/u | unique:users',
            'password'=>'required | min:5',
            'file'=>'required'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->hasFile('file')){
            $file=$request->file('file');
            $extension=$file->getClientOriginalExtension();
            $filename=time(). '.' . $extension;
            $file->move('uploads/user/', $filename);
            $user->file=$filename;
        }else{
            return $request;
            $user->file='';
        }
        $query = $user->save();

        
        if($query){
            return redirect('login');
        }else{
            return back()->with('fail','Something went wrong');
        }
    }

    function check(Request $request){
        $request->validate([
            'email'=>'required | regex:/^[a-zA-Z0-9]+@[a-zA-Z]/u',
            'password'=>'required | min:5'
        ]);

        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('LoggedUser',$user->id);
                return redirect('profile');
            }else{
            return back()->with('fail','Invalid password');
        }
        }else{
            return back()->with('fail','No account found for this email');
        }
    }

    function profile(){
        if(session()->has('LoggedUser')){
            $user = User::where('id','=',session('LoggedUser'))->first();
            $data = [
                'LoggedUserInfo'=>$user
            ];
        }
        return view('admin.profile',$data);
    }
    function logout(){
        if(session()->has('LoggedUser')){
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
    function list(){
        $data= User::paginate(2);
        return view('admin.list',['users'=>$data]);
    }

    function edit($id){
        $row = DB::table('users')->where('id', $id)->first();
        $data =[
            'Info'=> $row
        ];
        return view('admin.edit', $data);
    }

    function update(Request $request){
        $request->validate([
            'name'=>'required | regex:/^[a-zA-Z]/u',
            'email'=>'required | regex:/^[a-zA-Z0-9]+@[a-zA-Z]/u',
            'file'=>'required'
        ]);
        $updating = DB::table('users')->where('id', $request->input('id'))
        ->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email')
        ]);
        return redirect('list');
    }

    function delete($id){
        $delete = DB::table('users')->where('id', $id)->delete();
        return redirect('list');
    }
}
