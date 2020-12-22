<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //https://stackoverflow.com/questions/38107085/laravel-5-how-to-use-get-parameter-from-url-with-controllers-sign-in-method
        $user_id = $request->user_id;
        return view('profile.create', ['user_id' => $user_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'address' => 'required',
            'birthday' => 'nullable|date',
//            'avatar' => 'required',
            'avatar' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
            'user_id' => 'required'
        ]);
        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('fail', 'Update Profile Fail!!!');
        }
        else{
            $user_id = $request->input('user_id');

            $fileName = $request->file('avatar')->getClientOriginalName();
            $filePath = $request->file('avatar')->storeAs('uploads', $fileName, 'public');

            Profile::create([
                'full_name' => $request->input('full_name'),
                'address' => $request->input('address'),
                'birthday' => $request->input('birthday'),
                'avatar' => '/storage/'.$filePath,
                'user_id' => $user_id
            ]);
            $affected = DB::table('users')->where('id', $user_id)
                ->update([
                    'has_profile' => "Yes"
                ]);

            return redirect('/users')
                ->with('success', 'Create Profile Success.')
                ->with('file', $fileName);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();
        $profile = DB::table('profiles')->where('user_id', $id)->first();
        $role = DB::table('roles')->where('id', $user->role_id)->first();
        return View('profile.show',['user'=>$user, 'profile' => $profile, 'role' => $role]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile =  DB::table('profiles')->where('user_id',$id)->first();
        $user =  DB::table('users')->where('id',$id)->first();
        $roles = DB::table('roles')->get();
        $user_role = DB::table('roles')->where('id', $user->role_id);
        return View('profile.edit',['profile'=>$profile, 'user' => $user, 'roles' => $roles, 'user_role' => $user_role]);
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
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
            'address' => 'required',
            'birthday' => 'nullable|date',
            'image' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048',
            'role_id' => 'required'
//            'avatar' => 'nullable|mimes:jpg,jpeg,png,xlx,xls,pdf|max:2048'
        ]);
        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('fail', 'Update Profile Fail!!!');
        }
        else{
            if ($request->hasFile('image')){

                $filename = $request->file('image')->getClientOriginalName();
                $filePath = $request->file('image')->storeAs('uploads', $filename, 'public');

                Profile::where('user_id', $id)
                    ->update([
                        'full_name' => $request->input('full_name'),
                        'address' => $request->input('address'),
                        'birthday' => $request->input('birthday'),
                        'avatar' => '/storage/'.$filePath
                        ]);
                $affected = DB::table('users')->where('id', $id)
                    ->update([
                        'role_id' => (int)$request->input('role_id')
                    ]);

                return back()->with('success', 'Update Profile Success.')
                ->with('file', $filename);
            }
            else {
                Profile::where('user_id', $id)
                    ->update([
                        'full_name' => $request->input('full_name'),
                        'address' => $request->input('address'),
                        'birthday' => $request->input('birthday'),
                    ]);

                $affected = DB::table('users')->where('id', $id)
                    ->update([
                        'role_id' => (int)$request->input('role_id')
                    ]);
                return back()->with('success', 'Update Profile Success.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
