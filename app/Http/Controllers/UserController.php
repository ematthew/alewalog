<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRole;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;


class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 'super') {
            $users = User::with('userRoles')->get();
            $totalRate = 100000;

            return view('users.index', compact('users', 'totalRate'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }

    public function create()
    {
        if (Auth::user()->user_type == 'super') {
            return view('users.create');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back()->with('success', 'your message,here'); 
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->user_type == 'super') {
            $users = new User();
            $users->name                = $request->input('name');
            $users->email               = $request->input('email');
            $users->password            = bcrypt($request->input('password'));
            $users->save();
            return redirect()->back()->with('success', 'user information has been created Successfully');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }

    public function edit(Request $request, $id)
    {
        $user = User::find($id);

        if (Auth::user()->user_type == 'super') {
            return view('users.edit', compact('user'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }

    public function role(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::all();
        
        if (Auth::user()->user_type == 'super') {
            return view('users.role', compact('user', 'roles'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->user_type == 'super') {

            $users = User::find($id);
            $users->name                = $request->input('name');
            $users->email               = $request->input('email');
            $users->password            = bcrypt($request->input('password'));
            $users->update();

            return redirect('/users')->with('success', 'User Data is successfully updated');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back();
        }
    }

    public function assignRole(Request $request)
    {
        if (Auth::user()->user_type == 'super') {

            // clean default role
            DB::statement("delete from user_roles where user_id = {$request->user_id}");

            foreach ($request->roles as $key => $value) {
                # code...
                $user_role = new UserRole();
                $user_role->role_id = $value;
                $user_role->user_id = $request->user_id;
                $user_role->save();
            }

            return redirect('/users')->with('success', 'User Data is successfully updated');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }
}
