@extends('blade.template')

@section('title')
	Form POST Laravel
@endsection

@section('content')
<form action="/post" method="post">
	@csrf
	<table>
		<tr>
			<td>Nama</td><td><input type="text" name="nama"></td>
		</tr>
		<tr>
			<td>Umur</td><td><input type="text" name="umur"></td>
		</tr>
		<tr>
			<td><input type="submit" value="Simpan"></td>
		</tr>
	</table>
</form>
@endsection