@extends('template')

@section('main')
<script src="{{ asset ('bootstrap_3_3_7/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('js/jquery-1.4.4.min.js') }}"></script>
	<script src="{{ asset ('js/jquery.printPage.js') }}"></script>
	<div id="penjualan">
	{!! Form::open() !!}
		<h2>Tagihan</h2>

		<h3>Rincian Pesanan</h3>
		<table class="table">
			<tr>
				<th>Kode Pemesanan</th>
				<td>: {{ $penjualan->kode_jual }}</td>
				<th></th>
				<td></td>
				<th>Nama Pelanggan</th>
				<td>: {{ $penjualan->user->name }}</td>
				<td width="300px"></td>
			</tr>
			<tr>
				<th>Tanggal Pemesanan</th>
				<td>: {{ $penjualan->tanggal_penjualan }}</td>
				<th></th>
				<td></td>
				<th>Acara</th>
				<td>: {{ $penjualan->nama_acara }}</td>
				<td width="500px"></td>
			</tr>
			<tr>
				
			</tr>
		</table>
		<table class="table">
			<tr>
			<th>No</th>
			<th>Waktu Acara</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
			</tr>
			<?php
			$no = 1;
			?>
			@if(count($penjualan->orderItems) > 0)
			@foreach ($penjualan->orderItems as $item)
			<tr>
				<td>{{ $no++ }}</td>
				<td>{{ $item->pivot->start_date }}</td>
				<td>{{ $item->nama_produk }}</td>
				<td>Rp {{ number_format($item->harga_produk,0,".",".") }},-</td>
				<td>{{ $item->pivot->jumlah }}</td>
				<td>Rp {{ number_format($item->pivot->jumlah * $item->harga_produk,0,".",".") }},-</td>
			</tr>
			@endforeach
			@else
			<tr>
				<td>
			<p>Tidak ada item produk...!</p>
				</td>
			</tr>
			@endif
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><strong>Total Harga :</strong></td>
				<td><strong>Rp {{ $penjualan->total_bayar }}</strong></td>
			</tr>
		</table>

		<h3>Rincian Pembayaran</h3>
		<table class="table">
			<tr>
				<th>No</th>
				<th>Tanggal Pembayaran</th>
				<th>Jumlah Bayar</th>
				<th>Total Harga</th>
				<th>Kekurangan</th>
				<th>status</th>
			</tr>

			<?php
				$nom = 1;
				$total = 0;
			?>


			@foreach ($pembayaran_list as $pembayaran)
			@if($pembayaran->penjualan_id == $penjualan->id)
		
			<tr>
				<td>{{ $nom++ }}</td>
				<td>{{ $pembayaran->tgl_bayar }}</td>	
				<td>{{ $pembayaran->jumlah_bayar }}</td>	
				<td>{{ $pembayaran->total_tagihan }}</td>	
				<td>{{ $pembayaran->kekurangan}}</td>	
				<td>{{ $pembayaran->status}}</td>	
			</tr>
			<?php
				$total = $total+$pembayaran->jumlah_bayar;
				$sisa_tagihan = $pembayaran->total_tagihan - $total;
			?>
			@endif
			
			@endforeach

			<tr>
				<td></td>
				<td></td>
				<td><strong>Total Bayar :</strong></td>
				<td><strong>Rp {{ $total }}</strong></td>
				<td><strong>Sisa Tagihan :</strong></td>
				<td><strong>Rp {{ $sisa_tagihan }}</strong></td>
			</tr>
		</table>

		<?php
		$id_penjualan=$penjualan->id;
		$tot_tag = $pembayaran->total_tagihan;
		?>

		<br class="hidden-print">

		<div>
			<h2></h2>
		</div>

		</div>
	{!! Form::close() !!}

		<div id="pembayaran">
		<h2>Tambah Pembayaran</h2>
	{!! Form::open(['url'=>'pembayaran', 'files'=>'true']) !!}
	<input type="hidden" name="penjualan_id" value={{$id_penjualan}}>
	<input type="hidden" name="total_tagihan" value={{$tot_tag}}>
		@include('pembayaran.form', ['submitButtonText' => 'Bayar'])
	{!! Form::close() !!}
		</div>
	</div>

@stop

@section('footer')
	@include('footer')
@stop