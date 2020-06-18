@extends('template')

@section('main')
	<div id="penjualan">
		<h2>Transaksi Penjualan</h2>

		@if (!empty($penjualan_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Pemesanan</th>
						<th>Tanggal Pemesanan</th>
						<th>Acara</th>
						<th>Total Bayar</th>
						<th>Pelanggan</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
					?>
					@foreach ($penjualan_list as $jual)
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $jual->kode_jual }}</td>
						<td>{{ $jual->tanggal_penjualan }}</td>
						<td>{{ $jual->nama_acara }}</td>
						<td>Rp {{ $jual->total_bayar }}</td>
						<td>{{ $jual->user->name }}</td>
						<td>
							<div class="box-button">
								{{ link_to('penjualan/' . $jual->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							
							<div class="box-button">
								{!! Form::open(['method' => 'DELETE', 'action' => ['PenjualanController@destroy', $jual->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>

							<?php 
								if ($jual->status == "0") {
							?>

							<div class="box-button">
								{{ link_to('penjualan/' . $jual->id .'/status', 'Konfirmasi', ['class' => 'btn btn-warning btn-sm']) }}
							</div>

							<?php } else { ?>

							<div class="box-button">
								{{ link_to('penjualan/' . $jual->id, 'Lunas', ['class' => 'btn btn-warning btn-sm']) }}
							</div>

							<?php } ?>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		@else
			<p>Tidak ada data Penjualan.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Penjualan : {{ $jumlah_penjualan }}</strong>
			</div>
			<div class="paging">
				{{ $penjualan_list->links() }}
			</div>
		</div>
			<div class="tombol-nav">
				<div>
					<a href="penjualan/create" class="btn btn-primary">Tambah Penjualan</a>
			</div>
		</div>
		
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop