<!DOCTYPE html>
<html>
<head>
	<title>Login Eloquent</title>
</head>
<body>
	<form action="/login" method="post">
		@csrf
		<table>
			<tr>
				<td>Employee ID</td><td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Employee Name</td><td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" value="Login"></td>
			</tr>
		</table>
	</form>
</body>
</html>