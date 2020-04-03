@extends('template')

@section('main')
	<div id="cart">
		<h2>Pemesanan</h2>

		{!! Form::open() !!} 

		@include('_partial.flash_message')
		<div class="col-md-12">
		</div>

		@if (!empty($produk_list))
		<div class="row">
		<?php foreach ($produk_list as $produk): ?>

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

						<?php if ($produk->status > 0) { ?>
							<h4 class="card-text" style="margin-left: 10px;"><strong>Tersedia</strong></h4>
						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px; margin-left: 10px;"> 
							{{ link_to('cart/' . $produk->id. '/edit', 'Pesan', ['class' => 'btn btn-success btn-sm']) }}
						</div>
						<?php } else { ?>
							<h4 class="card-text" style="margin-left: 10px;"><strong>Kosong</strong></h4>
						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px; margin-left: 10px;"> 
							{{ link_to('#', 'Pesan', ['class' => 'btn btn-success btn-sm', 'disabled'=>'true']) }}
						</div>
						<?php } ?>

						<div class="box-button" style="margin-top: 7px; margin-bottom: 7px;"> 
								{{ link_to('produk/' . $produk->id, 'Detail', ['class' => 'btn btn-warning btn-sm']) }}
						</div>
					</div>
				</div>
			</div>

			
		<?php endforeach ?>
		</div>
		<div>
		@else
			<p>Sorry bro, fotografer udah penuh...</p>
		@endif
		</div>
		{!! Form::close() !!}

	</div>

@stop

@section('footer')
	@include('footer')
@stop