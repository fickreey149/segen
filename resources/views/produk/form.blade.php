@if (isset($produk))
	{!! Form::hidden('id', $produk->id) !!}
@endif

<table>
	
@if ($errors->any())
<div class="form-group {{ $errors->has('nama_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('nama_produk', 'Nama Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('nama_produk', null, ['class' => 'form-control']) !!}
	@if ($errors->has('nama_produk'))
	<span class="help-block">{{ $errors->first('nama_produk') }}</span>
	@endif
</div>
		
@if ($errors->any())
<div class="form-group {{ $errors->has('harga_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('harga_produk', 'Harga Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('harga_produk', null, ['class' => 'form-control']) !!}
	@if ($errors->has('harga_produk'))
	<span class="help-block">{{ $errors->first('harga_produk') }}</span>
	@endif
</div>
<div>
	<input type="hidden" name="status" value="0">
</div>
		

	
@if ($errors->any())
<div class="form-group {{ $errors->has('satuan_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('satuan_produk', 'Satuan Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('satuan_produk', null, ['class' => 'form-control']) !!}
	@if ($errors->has('satuan_produk'))
	<span class="help-block">{{ $errors->first('satuan_produk') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('kategori_produk') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('kategori_produk', 'Kategori Produk :', ['class' => 'control-label']) !!}
	{!! Form::select('kategori_produk', $list_kategori, null, ['class' => 'form-control', 'id' => 'kategori_produk', 'placeholder' => 'Pilih Kategori']) !!}
	@if ($errors->has('kategori_produk'))
	<span class="help-block">{{ $errors->first('kategori_produk') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('limit') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('limit', 'Limit Waktu Eksekusi Produk :', ['class' => 'control-label']) !!}
	{!! Form::text('limit', null, ['class' => 'form-control']) !!}
	@if ($errors->has('limit'))
	<span class="help-block">{{ $errors->first('limit') }}</span>
	@endif
</div>
		
@if ($errors->any())
<div class="form-group {{ $errors->has('foto') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('foto', 'Gambar :', ['class' => 'control-label']) !!}
	{!! Form::file('foto', null, ['class' => 'form-control']) !!}
	@if    ($errors->has('foto'))
	<span class="help-block">{{ $errors->first('foto') }}</span>
	@endif
</div>

@if ($errors->any())
<div class="form-group {{ $errors->has('deskripsi') ? 'has-error' : 'has-success' }}">
@else
<div class="form-group">
@endif
	{!! Form::label('deskripsi', 'Deskripsi Produk :', ['class' => 'control-label']) !!}
	{!! Form::textarea('deskripsi', null, ['class' => 'form-control']) !!}
	@if ($errors->has('deskripsi'))
	<span class="help-block">{{ $errors->first('deskripsi') }}</span>
	@endif
</div>
		
<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>
		</td>
	</tr>
</table>