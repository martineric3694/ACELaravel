@extends('blade.template')

@section('title')
	{{$title}}
@endsection

@section('content')
	<table class="table">
		<tr>
			<th>
				Employee ID
			</th>
			<th>
				Name
			</th>
			<th>
				Department
			</th>
		</tr>
		@foreach($data as $row)
			<tr>
				<td>{{$row->EMPLOYEE_ID}}</td>
				<td>{{$row->FIRST_NAME}} {{$row->LAST_NAME}}</td>

				<td>{{$row->department['DEPARTMENT_NAME']}}</td>

				
				@if($title == 'Eloquent Page')
					<td><a href="/eloquentEdit/{{$row->EMPLOYEE_ID}}"
				>Edit</a></td>
				@else
					<td><a href="/edit/{{$row->EMPLOYEE_ID}}"
				>Edit</a></td>
				@endif
			</tr>
		@endforeach
	</table>
	{{$data->links()}}

	@if($action == 'edit')
	<form action="/eloquentEdit" method="post">
		@csrf
		<input type="hidden" name="empId" value="{{$dataEdit->EMPLOYEE_ID}}">
		First Name <input type="text" name="fName" value="{{$dataEdit->FIRST_NAME}}"><br>
		<input type="submit" value="Update">
	</form>
	@else
	<form action="/add" method="post">
		@csrf
		Employee ID <input type="text" name="empId"><br>
		First Name <input type="text" name="fName"><br>
		<input type="submit" value="Add">
	</form>
	@endif
@endsection