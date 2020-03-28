@extends('template')

@section('main')
	<div id="produk">
		<h2>Edit Juru Kamera</h2>

		{!! Form::model($jurkam, ['method' => 'PATCH', 'action' => ['JurkamController@update', $jurkam->id]]) !!}

		@if (isset($jurkam))
		{!! Form::hidden('id', $jurkam->id) !!}
		@endif

<table>
	
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_jurkam') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('nama_jurkam', 'Nama Juru Kamera :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_jurkam', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_jurkam'))
	<span class="help-block">{{ $errors->first('nama_jurkam') }}</span>
	@endif
</div>
		
@if ($errors->any())
<div class="form-group {{ $errors->has('nik') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('nik', 'NIK :', ['class' => 'control-label']) !!}
	{!! Form::text('nik', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nik'))
	<span class="help-block">{{ $errors->first('nik') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('gender') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('gender', 'Jenis Kelamin :', ['class' => 'control-label']) !!}
	{!! Form::select('gender', $list_gender, null, ['class' => 'form-control', 'id' => 'gender', 'placeholder' => 'Pilih Jenis Kelamin']) !!}
	@if ($errors->has('gender'))
	<span class="help-block">{{ $errors->first('gender') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('tempat_lahir') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('tempat_lahir', 'Tempat Lahir :', ['class' => 'control-label']) !!}
	{!! Form::text('tempat_lahir', null, ['class' => 'form-control']) !!}
	@if ($errors->has('tempat_lahir'))
	<span class="help-block">{{ $errors->first('tempat_lahir') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('tanggal_lahir') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('tanggal_lahir', 'Tanggal Lahir :', ['class' => 'control-label']) !!}
	{!! Form::date('tanggal_lahir', null, ['class' => 'form-control']) !!}
	@if ($errors->has('tanggal_lahir'))
	<span class="help-block">{{ $errors->first('tanggal_lahir') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('kategori') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('kategori', 'Kategori :', ['class' => 'control-label']) !!}
	{!! Form::select('kategori', $list_kategori, null, ['class' => 'form-control', 'id' => 'kategori', 'placeholder' => 'Pilih Kategori']) !!}
	@if ($errors->has('kategori'))
	<span class="help-block">{{ $errors->first('kategori') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('alamat', 'Alamat :', ['class' => 'control-label']) !!}
	{!! Form::textarea('alamat', null, ['class' => 'form-control']) !!}
	@if ($errors->has('alamat'))
	<span class="help-block">{{ $errors->first('alamat') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('email') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
	{!! Form::text('email', $user->email, ['class' => 'form-control']) !!}
	@if ($errors->has('email'))
	<span class="help-block">{{ $errors->first('email') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('no_hp') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('no_hp', 'Nomor Hp :', ['class' => 'control-label']) !!}
	{!! Form::text('no_hp', null, ['class' => 'form-control']) !!}
	@if ($errors->has('no_hp'))
	<span class="help-block">{{ $errors->first('no_hp') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }} col-md-4">
@else
<div class="form-group col-md-4">
@endif
	{!! Form::label('foto', 'Foto :', ['class' => 'control-label']) !!}
	{!! Form::file('foto', null, ['class' => 'form-control']) !!}
	@if    ($errors->has('foto'))
	<span class="help-block">{{ $errors->first('foto') }}</span>
	@endif
</div>

<div>
	<input type="hidden" name="level" value="jurkam">
</div>
		
<div class="form-group">
	{!! Form::submit('Update Juru Kamera', ['class' => 'btn btn-primary form-control']) !!}
</div>
		</td>
	</tr>
</table>

		{!! Form::close() !!}
	</div>
@stop

@section('footer')
	@include('footer')
@stop