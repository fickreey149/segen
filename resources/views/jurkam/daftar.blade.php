@extends('template')

@section('main')
	<div id="produk">
		<div class="col-md-12">
			<h2>Daftar Produk</h2>
		</div>
		@if (!empty($produk_list))
		<div style="margin-top: 7px;">
		<?php foreach ($produk_list as $produk): ?>
			<div class="col-md-3">
					<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 16px;" align="center">
						<div style="border: 1px solid #333; background-color: #f1f1f1; border-radius: 5px; padding: 2px;" align="center">
						@if (isset($produk->foto))
						<img src="{{ asset('fotoupload/' .$produk->foto) }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@else
						<img src="{{ asset('fotoupload/dummyfood.png') }}" style="border: 1px solid #333; border-radius: 5px" width="180px" height="150px">
						@endif
						<h4 class="text-info">{{ $produk->nama_produk }}</h4>
						<h4 class="text-danger">Rp {{ number_format($produk->harga_produk,0,".",".") }},-</h4>
						</div>
					</div>		
			</div>
		<?php endforeach ?>
		</div>
		<div>
		@else
			<p>Sorry bro, produk udah habis...</p>
		@endif
		</div>	
@stop

@section('footer')
	@include('footer')
@stop