<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      $users = User::all();

   	return view('users.index', compact('users'));
   }

   public function create()
   {
      
      return view('users.create');
   }

   public function store(Request $request)
   {
        $users = new Office();
        $users->name                =$request->input('name');
        $users->email               =$request->input('email');
        $users->password            =$request->input('password');
        $users->password            =$request->input('password');            
        $users->save();
        return redirect()->route('users')->with('success','user information has been created Successfully');
   }



   public function edit(User $user)
   {

        return view('users.edit', compact('user'));
       
   }

   public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',

        ]);

        User::whereId($id)->update($validatedData);

        return redirect('/users')->with('success', 'User Data is successfully updated');
    }
}
