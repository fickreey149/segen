@extends('template')

@section('main')
{!! Form::open() !!}
	<div id="pemesanan">
		<h2>Daftar Jadwal</h2>

		@foreach ($penjualan_list as $penjualan)
		<table class="table">
			<tr>
				<th>Kode Pemesanan</th>
				<td>: {{ $penjualan->kode_jual }}</td>
				<th></th>
				<td></td>
		@if (Auth::check() && Auth::user()->level == 'pelanggan')

				<th>Nama Konsumen</th>
		@else
				<th>Nama Kasir</th>
		@endif

				<td>: {{ $penjualan->nama_konsumen }}</td>
				<td width="100px"></td>

				<td>
					@if ($penjualan->status == "0")

					<div class="box-button">
						{{ link_to('pemesanan/' . $penjualan->id . '/hapus', 'Batal', ['class' => 'btn btn-danger btn-sm']) }}
					</div>

					@else

					<div class="box-button">
						
						{!! Form::submit('Lunas', ['class' => 'btn btn-warning btn-sm']) !!}
					</div>

					@endif
				</td>
			</tr>
			<tr>
				<th>Tanggal Penjualan</th>
				<td>: {{ $penjualan->tanggal_penjualan }}</td>
				<th></th>
				<td></td>
				<th>Tanggal Acara</th>
				<td>: 01-04-09</td>
			</tr>
			
		</table>
		<table class="table">
			<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			</tr>
			<?php
			$no = 1;
			?>
			@foreach ($penjualan->orderItems as $item)
			<?php if ($item->pivot->status == 0) {
							$s = "Lunas";
						}?>
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->nama_produk }}</td>
				<td>Rp {{ $item->harga_produk }}</td>
				<td>{{ $item->pivot->jumlah }}</td>
				<td>Rp {{ $item->pivot->jumlah * $item->harga_produk}}</td>
				
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total Harga :</strong></td>
				<td><strong>Rp {{ $penjualan->total_bayar }}</strong></td>
			</tr>
		</table>
		<table class="table" border="1px">
			
		</table>
		<table>
			<tr>
				<td height="50px" width="1200px"></td>
			</tr>
		</table>
		@endforeach
	
		</div>
	</div>
{!! Form::close() !!}
@stop

@section('footer')
	@include('footer')
@stop