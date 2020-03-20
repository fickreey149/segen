@extends('template')

@section('main')
	<div id="user">
		<h2>Tambah User</h2>

		{!! Form::open(['url'=>'user']) !!}
			@if (Auth::guest())
				@include('user.daftar', ['submitButtonText' => 'Daftar'])
			@else
				@include('user.form', ['submitButtonText' => 'Tambah User'])
			@endif
		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop