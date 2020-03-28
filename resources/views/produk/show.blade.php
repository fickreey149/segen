@extends('template')

@section('main')
	<div id="produk">
		<h2>Detail Produk</h2>
			<div class="row">
				<div class="col-md-6">
					<img src="{{ asset('fotoupload/' .$produk->foto) }}" style="border:1px solid #333; border-radius: 5px" alt="" class="img-responsiv" width="570px" height="350px">
				</div>
				<div class="col-md-6">
					<h3>{{ $produk->nama_produk }}</h3>
					<h4>Rp {{ number_format($produk->harga_produk,0,".",".") }},-</h4>
					<h5>Kategori : {{ $produk->kategori_produk }}</h5>
					<p>Deskripsi : {{ $produk->deskripsi }} </p>
				</div>
			</div>
	</div>

@stop

@section('footer')
	@include('footer')
@stop