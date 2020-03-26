@extends('template')

@section('main')
	<div id="produk">
		<h2>Aktivasi Produk</h2>

		@if (!empty($produk_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th>Satuan</th>
						<th>Status</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 0;
					?>
					<?php foreach ($produk_list as $produk):
						if ($produk->status == 0) {
							$status = "Not Actived";
							$b = "Active";
							$v = 1;
						} else {
							$status = "Actived";
							$b = "Not Active";
							$v = 0;
						}
					?>
					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $produk->nama_produk }}</td>
						<td>{{ $produk->kategori_produk }}</td>
						<td>Rp {{ number_format($produk->harga_produk,0,".",".") }},-</td>
						<td>{{ $produk->satuan_produk }}</td>
						<td>{{ $status }}</td>
						<td>
							<div class="dropdown">
								{!! Form::model($produk, ['method' => 'PATCH', 'action' => ['ProdukController@updateaktivasi', $produk->id]]) !!}

								<button class="btn btn-warning dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
									Edit Status
								</button>
								<div class="dropdown-menu">
									<input type="hidden" name="status" value="{{ $v }}">
    								<input type="submit" name="tombol" value="{{ $b }}" class="btn btn-danger">
  								</div>

  								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		@else
			<p>Tidak ada data Produk.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Produk : {{ $jumlah_produk }}</strong>
			</div>
			<div class="paging">
				{{ $produk_list->links() }}
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop