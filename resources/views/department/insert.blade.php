<!DOCTYPE html>
<html>
<head>
	<title>Add Department</title>
</head>
<body>
<form action="{{route('department.store')}}" method="post">
	@csrf
	<table>
		<tr>
			<td>Department ID</td><td><input type="text" name="deptId"></td>
		</tr>
		<tr>
			<td>Department Name</td><td><input type="text" name="deptName"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Add"></td>
		</tr>
	</table>
</form>
</body>
</html>