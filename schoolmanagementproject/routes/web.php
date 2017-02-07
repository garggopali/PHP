<?php

use App\Teacher;
use App\Student;

use App\Http\Controllers\TeachersController;
use App\Http\Controllers\StudentsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insertinitialvaluesteachers', function(){
	
	$teacher = new Teacher();
	$teacher-> teachers_id =1;
	$teacher->teachers_name ='AAA';
	$teacher->classteacher_of ='I1';
	$teacher->salary = '25000';
	$teacher->save();

	$teacher = new Teacher();
	$teacher-> teachers_id = 2;
	$teacher->teachers_name = 'BBB';
	$teacher->classteacher_of = 'I2';
	$teacher->salary = '20000';
	$teacher->save();

	$teacher = new Teacher();
	$teacher-> teachers_id = 3;
	$teacher->teachers_name = 'CCC';
	$teacher->classteacher_of = 'I3';
	$teacher->salary = '21000';
	$teacher->save();
});

Route::get('/insertinitialvaluesstudents',function(){
	
	$student = new Student();
	$student->students_id=1;
	$student->students_name='aaa';
	$student->students_age=22;
	$student->students_class='I1';
	$student->class_teacher='AAA';
	$student->save();

	$student = new Student();
	$student->students_id=2;
	$student->students_name='bbb';
	$student->students_age=32;
	$student->students_class='I2';
	$student->class_teacher='BBB';
	$student->save();

	$student = new Student();
	$student->students_id=3;
	$student->students_name='ccc';
	$student->students_age=27;
	$student->students_class='I3';
	$student->class_teacher='CCC';
	$student->save();

});

Route::get('/dispalyteachers',function(){
	return view('displayteacherpage');
});


Route::get('/dispalystudents',function(){
	return view('displaystudentpage');
});

Route::get('/insertteachers',function(){
	return view('InsertTeacherpage');
});

Route::post('InsertedDataTeachers','TeachersController@InsertAllDataTeachers');


Route::get('/insertstudents',function(){
	return view('InsertStudentpage');
});

Route::post('InsertedDataStudents','StudentsController@InsertAllDataStudents');