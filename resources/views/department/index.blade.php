<!DOCTYPE html>
<html>
<head>
	<title>Index Department</title>
</head>
<body>
	<h1>List Department</h1>
	<a href="{{route('department.create')}}">Add</a>
	<table>
		<tr>
			<th>Department ID</th>
			<th>Department Name</th>
			<th>Action</th>
		</tr>
		@foreach($data as $row)
		<tr>
			<td>{{$row->DEPARTMENT_ID}}</td>
			<td>{{$row->DEPARTMENT_NAME}}</td>
			<td><button><a href="{{route('department.edit',$row->DEPARTMENT_ID)}}">Edit</a></button></td>
			<td>
				<form action="{{route('department.destroy',$row->DEPARTMENT_ID)}}" method="post">
					@csrf
					@method('DELETE')
					<input type="submit" value="Delete">
				</form>
			</td>
		</tr>
		@endforeach
	</table>
	{{$data->links()}}
</body>
</html>