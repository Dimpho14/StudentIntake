<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RolesController extends Controller
{

    public function CreateNewRole(Request $request)
    {
        $incomingFields = $request->validate([
            'role' => ['required', 'min:3', 'max:20', Rule::unique('roles', 'role')],
        ]);

        $incomingFields['role'] = strip_tags($incomingFields['role']);

        Roles::create($incomingFields);
        $roles = Roles::all();
        return view('create-role', compact('roles'));
    }

    public function ShowCreateForm()
    {
        $roles = Roles::all();
        return view('create-role', compact('roles'));
    }

   
}
