<!DOCTYPE html>
<html>
<head>
	<title>Edit Department</title>
</head>
<body>
	<form action="{{route('department.update',$data)}}" method="post">
		@csrf
		@method('PUT')
		<input type="hidden" name="deptId" value="{{$data->DEPARTMENT_ID}}">
		DEPARTMENT NAME <input type="text" name="deptName" value='{{$data->DEPARTMENT_NAME}}'><br>
		<input type="submit" value="Update">
	</form>
</body>
</html>