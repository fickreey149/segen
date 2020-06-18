@extends('template')

@section('main')
	<div id="penjualan">
		<h2>Transaksi Pembayaran</h2>

		@if (!empty($pembayaran_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Tanggal Pembayaran</th>
						<th>Jumlah Bayar</th>
						<th>Total Tagihan</th>
						<th>Kekurangan</th>
						<th>Status</th>
						<th>User</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
					?>
					@foreach ($pembayaran_list as $bayar)
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $bayar->tgl_bayar }}</td>
						<td>{{ $bayar->jumlah_bayar }}</td>
						<td>{{ $bayar->total_tagihan }}</td>
						<td>Rp {{ $bayar->kekurangan }}</td>
						<td>{{ $bayar->status }}</td>
						<td>{{ $bayar->penjualan->user->name }}</td>
						<td>
							<div class="box-button">
								{{ link_to('pembayaran/' . $bayar->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action' => ['PembayaranController@destroy', $bayar->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>Tidak ada data Pembayaran.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Penjualan : {{ $jumlah_pembayaran }}</strong>
			</div>
		<!-- </div>
			<div class="tombol-nav">
				<div>
					<a href="pembayaran/create" class="btn btn-primary">Tambah Penjualan</a>
			</div>
		</div> -->
		
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop