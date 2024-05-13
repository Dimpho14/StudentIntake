<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class cityController extends Controller
{
    public function CreateCity(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('cities', 'name')],
            'postalcode' => ['required', 'min:3', 'max:20', Rule::unique('cities', 'postalcode')],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['postalcode'] = strip_tags($incomingFields['postalcode']);

        City::create($incomingFields);
        $cities = City::all();
        return view('create-city', compact('cities'));
    }

    public function ShowCities()
    {
        $cities = City::all();
        return view('create-city', compact('cities'));
    }
}
