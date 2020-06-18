@extends('template')

@section('main')
	<div id="jurkam">
		<h2>Juru Kamera</h2>

		@if (!empty($jurkam_list))
			<table class="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>NIK</th>
						<th>Tempat, Tanggal Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>No Hp</th>
						<th>Kategori</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$no = 0;
					?>
					<?php foreach ($jurkam_list as $jurkam) : ?>

					<tr>
						<td>{{ ++$no }}</td>
						<td>{{ $jurkam->nama_jurkam }}</td>
						<td>{{ $jurkam->nik }}</td>
						<td>{{ $jurkam->tempat_lahir }}, {{ $jurkam->tanggal_lahir }}</td>
						<td>{{ $jurkam->gender }}</td>
						<td>{{ $jurkam->alamat }}</td>
						<td>{{ $jurkam->no_hp }}</td>
						<td>{{ $jurkam->kategori }}</td>
						<td>
							<!-- <div class="box-button">
								{{ link_to('jurkam/' . $jurkam->id, 'Detail', ['class' => 'btn btn-success btn-sm']) }}
							</div> -->
							<div class="box-button"> 
								{{ link_to('jurkam/' . $jurkam->id. '/edit', 'Edit', ['class' => 'btn btn-warning btn-sm']) }}
							</div>
							<div class="box-button"> 
								{!! Form::open(['method' => 'DELETE', 'action' => ['JurkamController@destroy', $jurkam->id]]) !!}
								{!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					<?php endforeach ?>

				</tbody>
			</table>
			
		@else
			<p>Tidak ada data Juru Kamera.</p>
		@endif

		<div class="table-nav">
			<div class="jumlah-data">
				<strong>Jumlah Juru Kamera : {{ $jumlah_jurkam }}</strong>
			</div>
			<div class="paging">
				{{ $jurkam_list->links() }}
			</div>
		</div>

		<div class="tombol-nav">
			<div>
			<a href="jurkam/create" class="btn btn-primary">Tambah Juru Kamera</a>
			</div>
		</div>
		
	</div>
@stop

@section('footer')
	@include('footer')
@stop