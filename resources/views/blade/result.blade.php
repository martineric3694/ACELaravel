@extends('blade.template')

@section('title')
	Submit Form
@endsection

@section('content')
	Nama : {{$nama}}<br>
	Umur : {{$umur}}<br>
	<a href="/post">Back</a>
@endsection