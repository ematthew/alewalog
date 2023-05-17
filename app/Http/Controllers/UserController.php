<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->user_type == 'super') {
            $users = User::all();
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
            $users = new Office();
            $users->name                = $request->input('name');
            $users->email               = $request->input('email');
            $users->password            = $request->input('password');
            $users->password            = $request->input('password');
            $users->save();
            return redirect()->route('users')->with('success', 'user information has been created Successfully');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }



    public function edit(User $user)
    {
        if (Auth::user()->user_type == 'super') {
            return view('users.edit', compact('user'));
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }

    public function update(Request $request, User $user)
    {
        if (Auth::user()->user_type == 'super') {
            $validatedData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required',
                'password' => 'required',
                'password' => 'required',

            ]);

            User::whereId($id)->update($validatedData);

            return redirect('/users')->with('success', 'User Data is successfully updated');
        } else {
            // return 'you are not allow to view this page';
            return redirect()->back(); 
        }
    }
}
