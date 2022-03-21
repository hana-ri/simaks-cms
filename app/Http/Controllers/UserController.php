<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/dashboard/users/index',[
            'page' => 'register',
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('/dashboard/users/edit', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // ddd($request->toArray());
        $rules = [
            'name' => ['required', 'max:100'],
            'is_admin' => 'required',
            'is_actived' => 'required'
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:5|max:100|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|min:5|max:100|unique:users';
        }

        if ($request->password) {
            $rules['password'] = 'required|min:6|max:150|confirmed';
        }
 
        $validatedData = $request->validate($rules);

        if (!empty($request->password)) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }


        try {
            DB::beginTransaction();
            
            $update_user = User::where('id', $user->id)->update($validatedData);

            if(!$update_user){
                DB::rollBack();

                return back()->with('error', 'Something went wrong while update user data');
            }

            DB::commit();
            return redirect('/dashboard/users')->with('success', 'Category updated!');

        }  catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            DB::beginTransaction();

            $delete_user = User::whereId($user->id)->delete();

            if(!$delete_user){
                DB::rollBack();
                return back()->with('error', 'There is an error while deleting user.');
            }

            DB::commit();
            return redirect()->route('users.index')->with('success', 'User Deleted successfully.');

        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }
}
