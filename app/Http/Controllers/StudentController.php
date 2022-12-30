<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Student;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function index()
    {
        return Inertia::render('Students/index', [
            'students' => Student::all()->map(function($student){
                return[
                    'id' => $student->id,
                    'name' => $student->name,
                    'age' => $student->age,
                    'status' => $student->status,
                    'image' => asset('storage/'. $student->image)                    
                ];
            })
        ]);
    }

    public function create()
    {
        return Inertia::render('Students/Create');
    }

    public function store()
    {
        $image = Request::file('image')->store('students', 'public');
        Student::create([
            'name' => Request::input('name'),
            'age' => Request::input('age'),
            'status' => Request::input('status'),
            'image' => $image
        ]);
        return Redirect::route('students.index');
    }

    
}
