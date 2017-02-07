<!-- app/view/InsertStudentpage.blade.php -->

{{Form::open(array('action' => 'StudentsController@InsertAllDataStudents'))}}
{{Form::label('students_name','Student Name')}}
{{Form::text('students_name','Enter Name Here',array('id' => 'students_name'))}}

<br>

{{Form::label('students_class','Student Class')}}
{{Form::text('students_class','Enter Class Here',array('id' => 'students_class'))}}

<br>

{{Form::label('students_age','Student Age')}}
{{Form::number('students_age',100,array('min' =>1,'max' =>150,'id' =>'students_age'))}}

<br>

{{Form::label('class_teacher','Class Teacher')}}
{{Form::text('class_teacher','Enter Class Teacher Here',array('id' => 'class_teacher'))}}

<br>

{{Form::submit('Save')}}
{{Form::close()}}
