@extends('blade.template')

@section('title')
	{{$title}}
@endsection

@section('content')
	{{ $isi }}
	<a href="/bladeController">Blade Controller Page</a>
@endsection