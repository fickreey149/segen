@extends('template')

@section('main')
	<div id="penjualan">
		<h2>Laporan Penjualan</h2>

		@if (!empty($jual_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Penjualan</th>
						<th>Tanggal Penjualan</th>
						<th>Nama Konsumen</th>
						<th>Produk</th>
						<th>Harga</th>
						<th>Jumlah</th>
						<th>Subtotal</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 0;
						$s = "";
						$total = 0;
					?>
		
					<?php foreach ($jual_list as $jual): ?>
						@foreach ($jual->orderItems as $item)
						<?php if ($item->pivot->status == 0) {
							$s = "Lunas";
						}?>
					
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $jual->kode_jual }}</td>
						<td>{{ $jual->tanggal_penjualan }}</td>
						<td>{{ $jual->nama_konsumen }}</td>
						<td>{{ $item->nama_produk }}</td>
						<td>Rp {{ number_format($item->harga_produk,0,".",".") }},-</td>
						<td>{{ $item->pivot->jumlah }}</td>
						<td>Rp {{ number_format($sub = $item->harga_produk * $item->pivot->jumlah,0,".",".") }},-</td>
						<td>{{ $s }}</td>
					</tr>
					<?php
					$total = $total + $sub;
					?>
						@endforeach
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Penjualan.</p>
		@endif

		<table class="table">
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Penjualan</strong></td>
					<td><strong>{{ $jumlah_penjualan }}</strong></td>
				</div>
		</tr>
		
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Pemasukan</strong></td>
					<td><strong>Rp {{ number_format($total,0,".",".") }},-</strong></td>
				</div>
		</tr>
		</table>

		<div class="form-group">
			{{ link_to('laporan_penjualan/print', ' Print', ['class' => 'btn btn-info glyphicon glyphicon-print pull-right']) }}
</div>
<br class="hidden-print">
<br class="hidden-print">
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop