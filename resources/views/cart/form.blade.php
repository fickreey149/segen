<div class="col-md-12">

	<div class="col-md-2">

	@if ($errors->any())
		<div class="form-group {{ $errors->has('kode_jual') ? 'has-error' : 'has-success' }}">
	@else
		<div class="form-group">
	@endif
	{!! Form::label('kode_jual', 'Kode Pemesanan ', ['class' => 'control-label']) !!}
		</div>

	</div>

	<div class="col-md-3">
		@if ($kode < 10)
		<input name="kode_jual" type="text" value="PJ00{{$kode}}" class="form-control" readonly>
		@elseif ($kode >10 && $kode < 100)
		<input name="kode_jual" type="text" value="PJ0{{$kode}}" class="form-control" readonly>
		@else
		<input name="kode_jual" type="text" value="PJ00{{$kode}}" class="form-control" readonly>
		@endif
	
		@if ($errors->has('kode_jual'))
		<span class="help-block ">{{ $errors->first('kode_jual') }}</span>
		@endif

	</div>

	<div class="col-md-1">
	</div>

	<div class="col-md-2">

		@if ($errors->any())
		<div class="form-group {{ $errors->has('tanggal_penjualan') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
		@endif
		{!! Form::label('tanggal_penjualan', 'Tanggal Pemesanan ', ['class' => 'control-label']) !!}
		</div>

	</div>

	<div class="col-md-3">
		<input name="tanggal_penjualan" type="date" value="{{ $now }}" class="form-control" readonly>
		@if ($errors->has('tanggal_penjualan'))
		<span class="help-block">{{ $errors->first('tanggal_penjualan') }}</span>
		@endif
	</div>

	<div class="col-md-1">
		
	</div>

</div>

<div class="col-md-12">
	<div class="col-md-2">
		@if ($errors->any())
		<div class="form-group {{ $errors->has('nama_acara') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
		@endif

		{!! Form::label('nama_acara', 'Nama Acara ', ['class' => 'control-label']) !!}
		</div>
	</div>

	<div class="col-md-3">
		<input name="nama_acara" type="text" class="form-control">
		@if ($errors->has('nama_acara'))
		<span class="help-block">{{ $errors->first('nama_acara') }}</span>
		@endif
	</div>

	<div class="col-md-1">
		
	</div>

	<div class="col-md-2">
		@if ($errors->any())
		<div class="form-group {{ $errors->has('nama_konsumen') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
		@endif
		{!! Form::label('nama_konsumen', 'Nama Konsumen ', ['class' => 'control-label']) !!}
		</div>
	</div>

	<div class="col-md-3">
		<input name="nama_konsumen" type="text" value="{{ Auth::user()->name }}" class="form-control" readonly>
		@if ($errors->has('nama_konsumen'))
		<span class="help-block">{{ $errors->first('nama_konsumen') }}</span>
		@endif
	</div>

	<div class="col-md-1">
	</div>
</div>

<div class="col-md-12">
	<div class="col-md-2">
		@if ($errors->any())
		<div class="form-group {{ $errors->has('alamat_acara') ? 'has-error' : 'has-success' }}">
		@else
		<div class="form-group">
		@endif

		{!! Form::label('alamat_acara', 'Alamat Acara ', ['class' => 'control-label']) !!}
		</div>
	</div>

	<div class="col-md-6">
		{!! Form::textarea('alamat_acara', null, ['class' => 'form-control']) !!}
		@if ($errors->has('alamat_acara'))
		<span class="help-block">{{ $errors->first('alamat_acara') }}</span>
		@endif
	</div>

	<div class="col-md-3">
		
	</div>
	<div class="col-md-1">
		
	</div>
</div>

<input name="status" type="hidden" value="0">

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
	<a href="cart/create" class="btn btn-success">Cari Produk Lain</a>
</div>
