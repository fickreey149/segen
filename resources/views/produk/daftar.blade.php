@extends('template')

@section('main')
	<div id="produk">
		<div class="col-md-12">
			<h2>Daftar Produk</h2>
		</div>
		@if (!empty($produk_list))
		<div class="row">
		<?php foreach ($produk_list as $produk): ?>
			<!-- <div class="col-md-3">
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
			</div> -->
			<div class="col-sm-3 col-4-lg ml-3">
				<div class="card" style="width:28rem; border:1px solid #333; border-radius: 7px">
					@if (isset($produk->foto))
						<img src="{{ asset('fotoupload/' .$produk->foto) }}" alt="" class="card-img-top" width="278px" height="190px" style="border-radius: 5px">
					@else
						<img src="{{ asset('fotoupload/dummykamera.png') }}" alt="" class="card-img-top" width="278px" height="190px" style="border-radius: 5px">
					@endif
					<div class="card-body">
						<h3 class="card-tittle" style="margin-left:10px">
							{{ $produk->nama_produk }}
						</h3>
						<p class="card-text" style="margin-left:10px">
							Harga : Rp {{ number_format($produk->harga_produk,0,".",".") }},-
						</p>
						<p class="card-text" style="margin-left:10px">
							Kategori : {{ $produk->kategori_produk }}
						</p>
						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px; margin-left: 10px;"> 
								{{ link_to('produk/' . $produk->id, 'Detail', ['class' => 'btn btn-warning btn-sm']) }}
						</div>
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
	</div>

@stop

@section('footer')
	@include('footer')
@stop