@extends('template')

@section('main')
	<div id="jurkam">
		<h2>Detail Jurkam</h2>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<img src="{{ asset('fotoupload/' .$jurkam->foto) }}" style="border: 1px solid #333; border-radius: 5px" alt="" class="img-responsive">
					</div>
					<div class="col-md-6">
						<h3>{{ $jurkam->nama_jurkam }}</h3>
						<h4>Rp {{ number_format($jurkam->harga_jurkam,0,".",".") }},-</h4>
						<h5>Kategori : {{ $jurkam->kategori_jurkam }}</h5>
						<p>Deskripsi : {{ $jurkam->deskripsi }} </p>


	<!--gadane wong <table class="table">
			<tr>
				<th>Nama jurkam</th>
				<td>: {{ $produk->nama_produk }}</td>
				<th></th>
				<td></td>
				<th>Harga Produk</th>
				<td>: Rp {{ number_format($produk->harga_produk,0,".",".") }},-</td>
				<th></th>
				<td></td>
				<th>Stok</th>
				<td>: {{ $produk->stok_produk }}</td>
				
				<td width="550px"></td>
			</tr>
			<tr>
				<th>Satuan</th>
				<td>: {{ $produk->satuan_produk }}</td>
				<th></th>
				<td></td>
				<th>Kategori</th>
				<td>: {{ $produk->kategori_produk }}</td>
			</tr>
		</table>
		<table border="1px">
			<tr>
				<th>Gambar</th>
				<td width="50px"></td>
				<th>Deskripsi</th>
				<td></td>
			</tr>
			<tr>
				<th>
				<img src="{{ asset('fotoupload/' .$produk->foto) }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
				</th>
				<td width="50px"></td>
				<tr>
				<th>{{ $produk->deskripsi }}</th>
				</tr>
				<tr>
				<th>Nama Produk</th>
				</tr>
				<td>: {{ $produk->nama_produk }}</td>
				<th>Harga Produk</th>
				<td>: Rp {{ number_format($produk->harga_produk,0,".",".") }},-</td>
				<th>Stok</th>
				<td>: {{ $produk->stok_produk }}</td>
				<th>Satuan</th>
				<td>: {{ $produk->satuan_produk }}</td>
				<th>Kategori</th>
				<td>: {{ $produk->kategori_produk }}</td>
			</tr>
		</table>
	 -->


			</div>
		</div>
	</div>
</div>

@stop

@section('footer')
	@include('footer')
@stop