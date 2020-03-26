@extends('template')

@section('main')
	<div id="jurkam">
		<h2>Tambah Juru Kamera</h2>
	{!! Form::open(['url'=>'jurkam', 'files'=>'true']) !!}
		@include('jurkam.form', ['submitButtonText' => 'Tambah Juru Kamera'])
	{!! Form::close() !!}

@stop

@section('footer')
	@include('footer')
@stop