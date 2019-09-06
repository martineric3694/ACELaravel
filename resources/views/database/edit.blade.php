@extends('blade.template')

@section('title')
	Update Data
@endsection

@section('content')
	<form action="/edit" method="post">
		@csrf
		<input type="hidden" name="empId" value="{{$data->EMPLOYEE_ID}}">
		First Name : <input type="text" name="fName" value="{{$data->FIRST_NAME}}">{{$errors->first('fName')}}<br>
		<input type="submit" value="Update">
	</form>
@endsection