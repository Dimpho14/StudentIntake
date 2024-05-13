<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use App\Models\Reztypes;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RezTypeController extends Controller
{
    public function CreateRezType(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:15', Rule::unique('reztypes', 'name')],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);

        Reztypes::create($incomingFields);
        $types = Reztypes::all();
        return view('createreztype', compact('types'));
    }

    public function ShowRezType()
    {
        $types = Reztypes::all();
        return view('createreztype', compact('types'));
    }

    public function CreateGender(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:15', Rule::unique('genders', 'name')],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);

        Gender::create($incomingFields);
        $genders = Gender::all();
        return view('create-gender', compact('genders'));
    }

    public function ShowGender()
    {
        $genders = Gender::all();
        return view('create-gender', compact('genders'));
    }

    public function CreateRoomType(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:15', Rule::unique('roomtypes', 'name')],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);

        Roomtype::create($incomingFields);
        $types = Roomtype::all();
        return view('create-type', compact('types'));
    }

    public function ShowRoomType()
    {
        $types = Roomtype::all();
        return view('create-type', compact('types'));
    }
}
