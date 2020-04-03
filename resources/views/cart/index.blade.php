@extends('template')

@section('main')
<div id="penjualan">
		<h2>Form Pemesanan</h2>

{!! Form::open(['url'=>'penjualan']) !!}
@include('cart.form', ['submitButtonText' => 'Pesan'])	

			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th width="200px">Sub Acara</th>
						<th>Waktu Mulai</th>
						<th>Waktu Selesai</th>
						<th colspan="2">Produk</th>
						<th colspan="2">Harga</th>
						<th>Jumlah</th>
						<th colspan="2">Subtotal</th>
						<th colspan="2">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 0; 
					?>
					<?php foreach ($cartItems as $cartItem): ?>
					<tr>
						<td>{{ ++$no }}</td>

						<td>
							<input type="text" name="tittle[]" class="form-control" value="">
						</td>

						<td>
							<input type="datetime-local" min="{{$min}}T00:00:00" name="start_date[]" class="form-control" value="">
						</td>

						<td><input type="datetime-local" min="{{$min}}T00:00:00" name="end_date[]" class="form-control" value=""></td>

						{!! Form::close() !!}


						<td colspan="2">{{ $cartItem->name }}</td>
						<td colspan="2">Rp {{ $cartItem->price }}</td>
						<td>
							{!! Form::open(['route'=>['cart.update', $cartItem->rowId], 'method' => 'PUT']) !!}
								<input name="qty" type="text" value="{{ $cartItem->qty }}" maxlength="2" size="2" class="form-control">
								
						</td>
						<td colspan="2">Rp {{ $cartItem->subtotal }}</td>
						<td colspan="2">
							<div class="box-button">
								<input type="submit" class="btn btn-warning btn-sm" value="Edit">
							{!! Form::close() !!}
							</div>
							<div class="box-button">
							{!! Form::open(['method' => 'DELETE', 'action' => ['CartController@destroy', $cartItem->rowId]]) !!}
							{!! Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) !!}
							{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td colspan="3"><strong>Total Harga</strong></td>
						<td colspan="3">Rp {{ Cart::total() }}</td>
					</tr>
				</tbody>
			</table>


</div>
@stop

@section('footer')
	@include('footer')
@stop