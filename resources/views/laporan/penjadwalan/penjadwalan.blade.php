@extends('template')

@section('main')
	<div id="penjualan">
		<h2>Laporan Penjadwalan</h2>

			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Kode Acara</th>
						<th>Nama Acara</th>
						<th>Tanggal Acara</th>
						<th>Tanggal Selesai</th>
						<th>Juru Kamera</th>
						<th>Produk</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>AC001</td>
						<td>Wedding</td>
						<td>01-04-2020</td>
						<td>02-04-2020</td>
						<td>Toni Kurniawan</td>
						<td>Wedding Kolase</td>
						<td>Actived</td>
					</tr>
					<tr>
						<td>2</td>
						<td>AC002</td>
						<td>Sunatan</td>
						<td>03-04-2020</td>
						<td>04-04-2020</td>
						<td>Umar Salim</td>
						<td>Album Sunatan</td>
						<td>Actived</td>
					</tr>
					<tr>
						<td>3</td>
						<td>AC003</td>
						<td>Wedding</td>
						<td>05-06-2020</td>
						<td>07-06-2020</td>
						<td>Ilham Hadi Kusuma</td>
						<td>Wedding Cinematic</td>
						<td>Actived</td>
					</tr>
				</tbody>
			</table>

		<table class="table">
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Acara</strong></td>
					<td><strong>3</strong></td>
				</div>
		</tr>
		
		<tr class="table-nav">
				<div class="jumlah-data">
					<td><strong>Total Pemasukan</strong></td>
					<td><strong>Rp 3.600.000,-</strong></td>
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