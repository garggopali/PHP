<!DOCTYPE html>
<html>
<head>
	<title>Display students</title>
</head>
<body>
<table>
<thead>
	<th> stu.ID</th>
	<th> Students name</th>
	<th> Students class</th>
	<th> Students age</th>
	<th>Class Teacher</th>
	</thead>
	<tbody>
		@for($i=1;$i <=DB::table('students')->count(); $i++)
		<tr> 
		<?php $result=DB::table('students')->where('students_id','=',$i)->get() ?>
		<td>{{$result[0]->students_id}}</td>
		<td>{{$result[0]->students_name}}</td>
		<td>{{$result[0]->students_class}}</td>
		<td>{{$result[0]->students_age}}</td>
		<td>{{$result[0]->class_teacher}}</td>
	</tr>
	@endfor
	</tbody>

</table>
</body>
</html>