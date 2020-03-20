@extends('template')

@section('main')
	<div id="pembelian">
		<h2>Tambah Pembelian</h2>

{!! Form::open(['url'=>'pembelian']) !!}
@if (isset($pembelian))
	{!! Form::hidden('id', $pembelian->id) !!}
@endif
@include('pembelian.form')

{!! Form::close() !!}


{!! Form::open(['url'=>'beli']) !!}
<div class="form-group">
	<table class="table" name="item_table" id="item_table">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga Produk</th>
				<th>Jumlah</th>
				<th>Total Harga</th>
				<th style="text-align:center">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<?php 
				$no = 0; 
				?>
				<td>0</td>
				<td>
					@if(count($list_produk) > 0)
					{!! Form::select('produk_id', $list_produk, null, ['class' => 'form-control', 'id' => 'produk_id', 'placeholder' => 'Pilih Produk']) !!}
					@else
						<p>Tidak ada pilihan Produk... Buat dulu yaa...!</p>
					@endif

					@if ($errors->has('produk_id'))
						<span class="help-block">{{ $errors->first('produk_id') }}</span>
					@endif
				</td>
				<td><input type="text" name="harga_produk" class="form-control" placeholder="Harga Bahan">
				</td>
				<td><input type="text" name="jumlah" class="form-control" placeholder="Jumlah">
				</td>
				<td><input type="text" name="total_harga" class="form-control" placeholder="Total Harga" disabled="true">
				</td>
				<td style="text-align:center">
					<div class="box-button">
					{!! Form::submit('Tambah', ['class' => 'btn btn-success btn-sm']) !!}
					</div>
				</td>					
			</tr>
{!! Form::close() !!}
 
			<?php foreach ($cartItems as $cartItem): ?>
			<tr>
				<td>{{ ++$no }}</td>
				<td>
				<input type="text" name="nama_produk" class="form-control" value="{{$cartItem->name}}" disabled="true">
				</td>
				<td><input type="text" name="harga_produk" class="form-control" value="Rp {{$cartItem->price}}" disabled="true">
				</td>
				<td><input type="text" name="jumlah" class="form-control" value="{{$cartItem->qty}}" disabled="true">
				</td>
				<td><input type="text" name="total_harga" class="form-control" value="Rp {{$cartItem->subtotal}}" disabled="true">
				</td>
				<td style="text-align:center">
				<div class="box-button">
					{!! Form::open(['method' => 'DELETE', 'action' => ['BeliController@destroy', $cartItem->rowId]]) !!}
					{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
					{!! Form::close() !!}
				</div></button></td>
			</tr>
			<?php endforeach ?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total Bayar</strong></td>
				<td><strong>Rp {{Cart::total()}}</strong></td>
			</tr>                
		</tbody>
	</table>
</div>

	</div>

@stop

@section('footer')
	@include('footer')
@stop