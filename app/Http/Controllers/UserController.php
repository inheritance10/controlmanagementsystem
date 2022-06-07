<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use function Psy\bin;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function sortable(){
        foreach ($_POST['item'] as $key => $value){
            $user = User::find(intval($value));
            $user->user_must = intval($key);
            $user->save();
        }
        echo true;
    }

    public function index()
    {
        $data['user'] = User::all();
        return view('backend.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'user_status' => 'required'
        ]);

        if($request->hasFile('user_file')){
              $request->validate([
                 'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
              ]);

              $file_name = uniqid().'.'.$request->user_file->getClientOriginalExtension();
              $request->user_file->move(public_path('images/users'),$file_name);
        }else{
            $file_name = null;
        }


        if($request->user_status == '0'){
            $rol_type = 'user';
        }else{
            $rol_type = 'admin';
        }
        $user = User::create([
            'name' => $request->name,
            'user_file' => $file_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_status' => $request->user_status,
            'role' => $rol_type
        ]);

        if($user){
            return redirect(route('user.index'))->with('success','Kayıt Başarılı');
        }

        return back()->with('error','Kayıt başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user = User::where('id' , $id)->first();
         return view('backend.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
          $request->validate([
             'name' => 'required',
             'email' => 'required|email',
             'user_status' => 'required'
          ]);

          if($request->hasFile('user_file')){
              $request->validate([
                 'user_file' => 'required|image|mimes:jpg,jpeg,png|max:2048'
              ]);

              $file_name = uniqid().'.'.$request->user_file->getClientOriginalExtension();
              $request->user_file->move(public_path('images/users'),$file_name);


              if($request->user_status == '0'){
                  $rol_type = 'user';
              }else{
                  $rol_type = 'admin';
              }

              if(strlen($request->password)>0){

                  $request->validate([
                      'password' => 'required|min:6'
                  ]);

                  $user = User::where('id' , $id)->update([
                      'name' => $request->name,
                      'email' => $request->email,
                      'password' => Hash::make($request->password),
                      'user_file' => $file_name,
                      'user_status' => $request->user_status,
                      'role' => $rol_type,
                      'about' => $request->about
                  ]);
              }else{
                  $user = User::where('id' , $id)->update([
                      'name' => $request->name,
                      'email' => $request->email,
                      'user_file' => $file_name,
                      'user_status' => $request->user_status,
                      'role' => $rol_type,
                      'about' => $request->about
                  ]);
              }

              $path = 'images/users/'.$request->old_file;
              if(file_exists($path)){
                  @unlink(public_path($path));
              }
          }
          else{
              if($request->user_status == '0'){
                  $rol_type = 'user';
              }else{
                  $rol_type = 'admin';
              }

              if(strlen($request->password)>0) {

                  $request->validate([
                      'password' => 'required|min:6'
                  ]);

                  $user = User::where('id' , $id)->update([
                      'name' => $request->name,
                      'email' => $request->email,
                      'password' => Hash::make($request->password),
                      'user_status' => $request->user_status,
                      'role' => $rol_type,
                      'about' => $request->about
                  ]);
              }else{
                  $user = User::where('id' , $id)->update([
                      'name' => $request->name,
                      'email' => $request->email,
                      'user_status' => $request->user_status,
                      'role' => $rol_type,
                      'about' => $request->about
                  ]);
              }
          }

          if($user){
              return redirect(route('user.index'))->with('success','Düzenleme başarılı');
          }
          return back()->with('error','Düzenleme başarısız');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user->delete()){
            echo 1;
        }
        echo 0;
    }
}
