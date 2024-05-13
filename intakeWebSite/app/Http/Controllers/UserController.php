<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function logOut()
    {
        auth()->logOut();
        return redirect('/')->with('success', 'You are now logged out.');
    }

    public function  ShowCorrectHomepage()
    {
        if (auth()->check()) 
        {
            return view('homepage-feed');
        }
        else
        {
            
            return view('homePage');
        }
        
    }

    public function logIn(Request $request)
    {
       $incomingFields = $request->validate([
        'loginusername' => 'required',
        'loginpassword' => 'required'
       ]);

       if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']]))
       {
        $request->session()->regenerate();
          return redirect('/')->with('success', 'You have successfully loggedin.');
       }
       else
       {
          return redirect('/')->with('failure', 'Invalid login.');
       }
    }

    public function RegisterUser(Request $request) {
        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'role_id' => ['required'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
       
 
    
        $user = User::create($incomingFields);
        auth()->login($user);
        $roles = Roles::all();
        $users = User::all();
        return View('register-user', compact('roles'), compact('users'))->with('success', 'Account created sucessfully.');
    }

    public function ShowRegister()
    {
        $users = User::all();
        $roles = Roles::all();
        return view('register-user', compact('roles'), compact('users'));
    }
}


