<table>
	<tr>
		<td width="150px">
@if ($errors->any())
<div class="form-group {{ $errors->has('kode_jual') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('kode_jual', 'Kode Pemesanan ', ['class' => 'control-label']) !!}
		</td>

		<td width="150px">

	@if ($kode < 10)
	<input name="kode_jual" type="text" value="PJ00{{$kode}}" maxlength="7" size="5" class="form-control" readonly>
	@elseif ($kode >10 && $kode < 100)
	<input name="kode_jual" type="text" value="PJ0{{$kode}}" maxlength="7" size="5" class="form-control" readonly>
	@else
	<input name="kode_jual" type="text" value="PJ00{{$kode}}" maxlength="7" size="5" class="form-control" readonly>
	@endif
	
	@if ($errors->has('kode_jual'))
	<span class="help-block">{{ $errors->first('kode_jual') }}</span>
	@endif
</div>
		</td>

		<td width="20px"></td>

		<td width="150px">
@if ($errors->any())
<div class="form-group {{ $errors->has('tanggal_penjualan') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('tanggal_penjualan', 'Tanggal Pemesanan ', ['class' => 'control-label']) !!}
		</td>

		<td width="150px">
	<input name="tanggal_penjualan" type="date" value="{{ $now }}" maxlength="8" size="8" class="form-control" readonly>
	@if ($errors->has('tanggal_penjualan'))
	<span class="help-block">{{ $errors->first('tanggal_penjualan') }}</span>
	@endif
</div>
		</td>
	</tr>


	<tr>
		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_konsumen') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif

	@if (Auth::check() && Auth::user()->level == 'pelanggan')

	{!! Form::label('nama_konsumen', 'Nama Konsumen ', ['class' => 'control-label']) !!}

	@else

	{!! Form::label('nama_konsumen', 'Nama Kasir ', ['class' => 'control-label']) !!}

	@endif

		</td>
		<td>
	<input name="nama_konsumen" type="text" value="{{ Auth::user()->name }}" maxlength="20" size="20" class="form-control" readonly>
	@if ($errors->has('nama_konsumen'))
	<span class="help-block">{{ $errors->first('nama_konsumen') }}</span>
	@endif
</div>
		</td>

		<td width="20px"></td>

		<td height="70px" colspan="2" align="center" valign="bottom">
			<div class="form-group">
			{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
		
			<a href="cart/create" class="btn btn-success">Cari Produk Lain</a>
			</div>
		</td>

		<td>
@if ($errors->any())
<div class="form-group {{ $errors->has('status') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	
		</td>
		<td>
	<input name="status" type="hidden" value="0" maxlength="20" size="20">
	@if ($errors->has('status'))
	<span class="help-block">{{ $errors->first('status') }}</span>
	@endif
</div>
		</td>
	</tr>

	<tr>
		<td>
		
		</td>
	</tr>
	<table>
		<tr>
			<td width="350px"></td>
			<td width="500px">
				
			</td>
		</tr>
		
	</table>
</div>
</table>