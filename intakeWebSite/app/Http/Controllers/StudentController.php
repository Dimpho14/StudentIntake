<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Document;
use App\Models\Gender;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Paymentmethods;
use App\Models\Rooms;
use App\Models\Studentdoc;
use App\Models\StudentDocument;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Converter\Time\BigNumberTimeConverter;

class StudentController extends Controller
{
    public function CreateMethods(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:15', Rule::unique('paymentmethods', 'name')],
        ]);

        $incomingFields['name'] = strip_tags($incomingFields['name']);

        Paymentmethods::create($incomingFields);
        $methods = Paymentmethods::all();
        return view('create-methods', compact('methods'));
    }

    public function ShowMethods()
    {
        $methods = Paymentmethods::all();
        return view('create-methods', compact('methods'));
    }

    public function AssignRoom(Request $request)
    {

        $this->validate($request, [
            'name' => ['required', 'min:3', 'max:20'],
            'middlename' => [],
            'surname' => ['required', 'min:3', 'max:20'],
            'gender_id' => ['required'],
            'method_id' => ['required'],
            'contactno' => ['required', 'min:10', 'max:10'],
            'idno' => ['required', 'min:13', 'max:13', Rule::unique('students', 'idno')],
            'studentno' => ['required', 'min:9', 'max:9', Rule::unique('students', 'studentno')],
            'course' => ['required', 'min:3', 'max:30'],
            'emailaddress' => ['required', Rule::unique('students', 'emailaddress')],
            'dateofoccupation' => ['required'], 
            'nextofkinname' => ['required', 'min:3', 'max:20'],
            'nextofkincontact' => ['required', 'min:10', 'max:10'],
            'room_id' => ['required'],
            
            
        ]);

            if(($request->has('documents')))
            {
               $allowedfileExtension=['pdf','jpg','png','docx'];
               $documents = $request->file('documents');
             if($documents)
             {
               foreach($documents as $key => $document)
               {
                 $documentname = $document->getClientOriginalName();
                 $documents->move(public_path().'/img/', $documentname);
                 $extension = $document->getClientOriginalExtension();
                 $check=in_array($extension,$allowedfileExtension);

                  if($check)
                  {
                    $students = Student::create($request->all());

                    foreach ($request->documents as $document)
                    {
                      $documentname = $document->store('documents');

                      Studentdoc::create(['student_id' => $students->id, 'document' => $documentname]);
                    }

                     echo "Upload Successfully";
                  }
                  else
                  {
                     echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                  }
                }
            }
            }
            


        $genders = Gender::all();
        $students = Student::all();
        $methods = Paymentmethods::all();
        $buildings = Building::all();
        $rooms = Rooms::whereHas('building',
        function ($query)
        {
            $query->whereId(request()->input('building, 0'));
        })->pluck('number', 'id');

        return view('assign-student', compact('genders', 'students', 'methods', 'buildings', 'rooms'));
    }

    public function ShowStudents()
    {
        $genders = Gender::all();
        $students = Student::all();
        $methods = Paymentmethods::all();
        $buildings = Building::all();
        $rooms = Rooms::all();

        return view('assign-student', compact('genders', 'students', 'methods', 'buildings', 'rooms'));
    }

    public function GetRoomList(Request $request)
    {
        $rooms = Rooms::where("building_id",$request->building_id)->get();
        
        return response()->json($rooms);
    }

    public function GetGenderRoomList(Request $request)
    {
        $rooms = Rooms::where("gender_id", $request->gender_id)->get();
        
        return response()->json($rooms);
    }

    public function uploaddoc(Request $request)
    {
        
        
        $fileNames = [];
        foreach($request->file('documents') as $documents)
        {
            $documentName = $documents->getClientOriginalName();
            $documents->move(public_path().'/img/', $documentName);
            $fileNames[] = $documentName;
        }
        $documents = json_encode($fileNames);
        $students = Student::all();


         Studentdoc::create($request->all());
        
       
        return view('create-doc', compact('students'));
    }

    public function getdoc()
    {
        $students = Student::all();
        return view('create-doc', compact('students'));
    }
}
