@extends('template')

@section('main')
	<div id="produk">
		<h2>Juru Kamera</h2>

			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIK</th>
						<th>Tanggal Lahir</th>
						<th>Alamat</th>
						<th>No Hp</th>
						<th>Kategori</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>

					<tr>
						<td>1</td>
						<td>Toni Kurniawan</td>
						<td>677521180002</td>
						<td>15-12-1993</td>
						<td>Randugunting</td>
						<td>089699013834</td>
						<td>Fotografer</td>
						<td>
							<div class="box-button">
								{{ link_to('produk/' . 3, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
								{{ link_to('produk/3/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['ProdukController@destroy', 3]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>

					<tr>
						<td>2</td>
						<td>Umar Salim</td>
						<td>677521190012</td>
						<td>08-10-1991</td>
						<td>Pekauman Kulon</td>
						<td>085695813855</td>
						<td>Fotografer</td>
						<td>
							<div class="box-button">
								{{ link_to('produk/' . 3, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
								{{ link_to('produk/3/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['ProdukController@destroy', 3]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>

					<tr>
						<td>3</td>
						<td>Ilham Hadi Kusuma</td>
						<td>678521180332</td>
						<td>02-05-1990</td>
						<td>Randugunting</td>
						<td>089699013834</td>
						<td>Vidiografer</td>
						<td>
							<div class="box-button">
								{{ link_to('produk/' . 3, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div>
							<div class="box-button"> 
								{{ link_to('produk/3/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['ProdukController@destroy', 3]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>


				</tbody>
			</table>

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Juru Kamera : 3</strong>
			</div>
			<div class="paging">

			</div>
		</div>

		<div class="tombol-nav">
			<div>
			<a href="produk/create" class="btn btn-primary">Tambah Juru Kamera</a>
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop