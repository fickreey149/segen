<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produk;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Validator;

class JurkamController extends Controller

{
	public function daftar()
	{
		$produk_list = Produk::all();
		$jumlah_produk = Produk::count();
		return view('produk.daftar', compact('produk_list', 'jumlah_produk'));
	}

	public function index()
	{
		return view('jurkam.index');
	}

	public function show($id)
	{
		$produk = Produk::findOrFail($id);
		return view('produk.show', compact('produk'));
	}

	public function create()
	{
		$list_kategori = ['wedding', 'sunatan', 'rapat', 'umum'];
		
		return view('produk.create', compact('list_kategori'));
	}

	public function store(Request $request)
	{
		$input = $request->all();
		$list_kategori = ['wedding', 'sunatan', 'rapat', 'umum'];


		if ($request->hasFile('foto')) {
			$foto = $request->file('foto');
			$ext = $foto->getClientOriginalExtension();

			if ($request->file('foto')) {
				$foto_name = date('YmdHis'). ".$ext";
				$upload_path = 'fotoupload';
				$request->file('foto')->move($upload_path, $foto_name);
				$input['foto'] = $foto_name;
			}
		}

		$validator = Validator::make($input, [
			'nama_produk' => 'required|string|max:20',
			'harga_produk' => 'required|string',
			'satuan_produk' => 'required|string',
			'stok_produk' => 'required|string',
			'kategori_produk' => 'required|string',
			'foto' => 'sometimes|max:5000',
			'deskripsi' => 'sometimes|max:500',

		]);
		if ($validator->fails()) {
			return redirect('produk/create')
				->withInput()
				->withErrors($validator);
		}
		$produk = Produk::create(
			[
			'nama_produk' => $request->nama_produk,
			'harga_produk' => $request->harga_produk,
			'satuan_produk' => $request->satuan_produk,
			'stok_produk' => $request->stok_produk,
			'kategori_produk' => $list_kategori[$request->kategori_produk],
			'foto' => $input['foto'],
			'deskripsi' => $request->deskripsi,
			]);

		return redirect('produk');
	}

	public function edit($id)
	{
		$list_kategori = ['spare part', 'printer', 'pc', 'laptop'];
		$produk = Produk::findOrFail($id);
		return view('produk.edit', compact('produk', 'list_kategori'));
	}

	public function update($id, Request $request)
	{
		$produk = Produk::findOrFail($id);
		$input = $request->all();

		if ($request->hasFile('foto')) {

			$exist = Storage::disk('foto')->exist($produk->foto);
			if (isset($produk->foto) && $exist) {
				$delete = Storage::disk('foto')->delete($produk->foto);
			}

		$foto = $request->file('foto');
		$ext = $foto->getClientOriginalExtension();
		if ($request->file('foto')) {
				$foto_name = date('YmdHis'). ".$ext";
				$upload_path = 'fotoupload';
				$request->file('foto')->move($upload_path, $foto_name);
				$input['foto'] = $foto_name;
			}
		}

		$validator = Validator::make($input, [
			'nama_produk' => 'required|string|max:20',
			'harga_produk' => 'required|string',
			'satuan_produk' => 'required|string',
			'kategori_produk' => 'required|string',
			'foto' => 'sometimes|max:5000',
			'deskripsi' => 'sometimes|max:500',
		]);
		if ($validator->fails()) {
			return redirect('produk/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$produk->update($request->all());
		return redirect('produk');
	}

	public function destroy($id)
	{
		$produk = Produk::findOrFail($id);
		$produk->delete();
		return redirect('produk');
	}

	public function aktivasi()
	{
		$produk_list = Produk::orderBy('nama_produk', 'asc')->paginate(10);
		$jumlah_produk = Produk::count();
		return view('produk.aktivasi', compact('produk_list', 'jumlah_produk'));
	}

	public function updateaktivasi($id, Request $request)
	{
		$produk = Produk::findOrFail($id);

		$input = [
			'nama_produk' => $produk->nama_produk,
			'harga_produk' => $produk->harga_produk,
			'satuan_produk' => $produk->satuan_produk,
			'kategori_produk' => $produk->kategori_produk,
			'foto' => $produk->foto,
			'deskripsi' => $produk->deskripsi,
			'stok_produk' => $request->status,
				];
		$produk->update($input);
		return redirect('aktivasi');
	}	
}