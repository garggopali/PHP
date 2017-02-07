<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;

use App\Teacher;

class TeachersController extends Controller
{
    public function InsertAllDataTeachers(){
$teacher = new Teacher;

$teacher->teachers_name=Input::get('teachers_name');
$teacher->classteacher_of=Input::get('classteacher_of');

$teacher->salary=Input::get('salary');
$teacher->save();

return view('displayteacherpage');

    }
}
