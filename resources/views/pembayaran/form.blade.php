@if (isset($pembayaran))
	{!! Form::hidden('id', $pembayaran->id) !!}
@endif

<table>
	
@if ($errors->any())
<div class="form-group {{ $errors->has('tgl_bayar') ? 'has-error' : 'has-success' }} col-md-6">
@else
<div class="form-group col-md-6">
@endif
	{!! Form::label('tgl_bayar', 'Tanggal Bayar :', ['class' => 'control-label']) !!}
	{!! Form::date('tgl_bayar', null, ['class' => 'form-control']) !!}
	@if ($errors->has('tgl_bayar'))
	<span class="help-block">{{ $errors->first('tgl_bayar') }}</span>
	@endif
</div>
		
@if ($errors->any())
<div class="form-group {{ $errors->has('jumlah_bayar') ? 'has-error' : 'has-success' }} col-md-6">
@else
<div class="form-group col-md-6">
@endif
	{!! Form::label('jumlah_bayar', 'Jumlah Bayar :', ['class' => 'control-label']) !!}
	{!! Form::text('jumlah_bayar', null, ['class' => 'form-control']) !!}
	@if ($errors->has('jumlah_bayar'))
	<span class="help-block">{{ $errors->first('jumlah_bayar') }}</span>
	@endif
</div>
<div>
	<input type="hidden" name="status" value="0">
</div>
		

	
@if ($errors->any())
<div class="form-group {{ $errors->has('satuan_produk') ? 'has-error' : 'has-success' }} col-md-6">
@else
<div class="form-group col-md-6">
@endif
	{!! Form::label('sisa_tagihan', 'Sisa Tagihan :', ['class' => 'control-label']) !!}
	{!! Form::text('sisa_tagihan', $sisa_tagihan, ['class' => 'form-control', 'readonly' => 'true']) !!}
	@if ($errors->has('sisa_tagihan'))
	<span class="help-block">{{ $errors->first('sisa_tagihan') }}</span>
	@endif
</div>

		
@if ($errors->any())
<div class="form-group {{ $errors->has('bukti') ? 'has-error' : 'has-success' }} col-md-6">
@else
<div class="form-group col-md-6">
@endif
	{!! Form::label('bukti', 'Bukti Transfer :', ['class' => 'control-label']) !!}
	{!! Form::file('bukti', null, ['class' => 'form-control']) !!}
	@if    ($errors->has('bukti'))
	<span class="help-block">{{ $errors->first('bukti') }}</span>
	@endif
</div>
		
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
		</td>
	</tr>
</table>