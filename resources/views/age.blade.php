<!DOCTYPE html>
<html>
<head>
	<title>Middleware</title>
</head>
<body>
	<h1>Form Age</h1>
	<form action="/age" method="post">
		@csrf
		Age<input type="text" name="age"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>