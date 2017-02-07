<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Student;
use View;

class StudentsController extends Controller
{
     public function InsertAllDataStudents(){
$student = new Student;

$student->students_name=Input::get('students_name');
$student->students_class=Input::get('students_class');
$student->students_age=Input::get('students_age');
$student->class_teacher=Input::get('class_teacher');
$student->save();

return view('displaystudentpage');
    }
}
