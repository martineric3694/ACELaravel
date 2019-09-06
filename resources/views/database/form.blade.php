@extends('blade.template')

@section('title')
	Form Inser Employee
@endsection

@section('content')
<form action="eloquentInsert" method="post">
	@csrf
	Employee ID : <input type="text" name="empId" value="{{old('empId')}}">{{$errors->first('empId')}}<br>
	First Name : <input type="text" name="fName" value="{{old('fName')}}">{{$errors->first('fName')}}<br>
	<input type="submit" name="Simpan">
</form>
@endsection