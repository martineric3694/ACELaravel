<!DOCTYPE html>
<html>
<head>
	<title>Has Many</title>
</head>
<body>
	<h1>Department Name : {{$deptName}}</h1>
<table>
	<tr>
		<th>Employee ID</th>
		<th>Name</th>
	</tr>
	@foreach($data as $row)
	<tr>
		<td>{{$row->EMPLOYEE_ID}}</td>
		<td>{{$row->FIRST_NAME}} {{$row->LAST_NAME}}</td>
	</tr>
	@endforeach
</table>
</body>
</html>