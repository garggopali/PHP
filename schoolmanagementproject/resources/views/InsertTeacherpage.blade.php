<!-- app/view/InsertTeacherpage.blade.php -->

{{Form::open(array('action' => 'TeachersController@InsertAllDataTeachers'))}}
{{Form::label('teachers_name','Teacher Name')}}
{{Form::text('teachers_name','Enter Name Here',array('id' => 'teachers_name'))}}

<br>

{{Form::label('classteacher_of','Class Teacher Of')}}
{{Form::text('classteacher_of','Enter Class Here',array('id' => 'classteacher_of'))}}

<br>

{{Form::label('salary','Salary')}}
{{Form::number('salary',100,array('min' =>1,'max' =>100000,'id' =>'salary'))}}

<br>

{{Form::submit('Save')}}
{{Form::close()}}
