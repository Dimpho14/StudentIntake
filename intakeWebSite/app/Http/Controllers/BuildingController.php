<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Rooms;
use App\Models\Building;
use App\Models\Gender;
use App\Models\Reztypes;
use App\Models\Roomtype;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BuildingController extends Controller
{
    public function Createbuilding(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:25', Rule::unique('buildings', 'name')],
            'addressline1' => ['required', 'min:3', 'max:25', Rule::unique('buildings', 'addressline1')],
            'addressline2' => [],
            'city_id' => ['required'],
            'type_id' => ['required'],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);
        $incomingFields['addressline1'] = strip_tags($incomingFields['addressline1']);
        $incomingFields['addressline2'] = strip_tags($incomingFields['addressline2']);
        $incomingFields['city_id'] = strip_tags($incomingFields['city_id']);
        $incomingFields['type_id'] = strip_tags($incomingFields['type_id']);

        Building::create($incomingFields);
        $cities = City::all();
        $types = Reztypes::all();
        $buildings = Building::all();
        return view('create-building', compact('buildings', 'cities' , 'types'));
    }

    public function Showbuildings()
    {
        $cities = City::all();
        $types = Reztypes::all();
        $buildings = Building::all();
        return view('create-building', compact('buildings', 'cities' , 'types'));
    }

    public function CreateRooms(Request $request)
    {
        $incomingFields = $request->validate([
            'number' => ['required', 'min:1', 'max:4', Rule::unique('rooms', 'number')],
            'type_id' => ['required'],
            'building_id' => ['required'],
            'gender_id' => ['required'],
            'status' => ['required'],
        ]);

        $incomingFields['number'] = strip_tags($incomingFields['number']);
        $incomingFields['type_id'] = strip_tags($incomingFields['type_id']);
        $incomingFields['building_id'] = strip_tags($incomingFields['building_id']);
        $incomingFields['gender_id'] = strip_tags($incomingFields['gender_id']);
        $incomingFields['status'] = strip_tags($incomingFields['status']);

        Rooms::create($incomingFields);
        $rooms = Rooms::all();
        $types = Roomtype::all();
        $buildings = Building::all();
        $genders = Gender::all();
        return view('create-room', compact('rooms','types', 'buildings' , 'genders'));
    }

    public function ShowRooms()
    {
        $rooms = Rooms::all();
        $types = Roomtype::all();
        $buildings = Building::all();
        $genders = Gender::all();
        return view('create-room', compact('rooms','types', 'buildings' , 'genders'));
    }
}
