<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Produk;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Validator;

class ProdukController extends Controller

{
	public function daftar()
	{
		$produk_list = Produk::all();
		$jumlah_produk = Produk::count();
		return view('produk.daftar', compact('produk_list', 'jumlah_produk'));
	}

	public function index()
	{
		$produk_list = Produk::orderBy('nama_produk', 'asc')->paginate(10);
		$jumlah_produk = Produk::count();
		return view('produk.index', compact('produk_list', 'jumlah_produk'));
	}

	public function show($id)
	{
		$produk = Produk::findOrFail($id);
		return view('produk.show', compact('produk'));
	}

	public function create()
	{
		$list_kategori = ['fotografi', 'vidiografi'];
		
		return view('produk.create', compact('list_kategori'));
	}

	public function store(Request $request)
	{
		$input = $request->all();
		$list_kategori = ['fotografi', 'vidiografi'];


		if ($request->hasFile('foto')) {
			$foto = $request->file('foto');
			$ext = $foto->getClientOriginalExtension();

			if ($request->file('foto')) {
				$foto_name = date('YmdHis'). ".$ext";
				$upload_path = 'fotoupload';
				$request->file('foto')->move($upload_path, $foto_name);
				$input['foto'] = $foto_name;
			}
		} else {
			$input['foto'] = "dummycamera.png";
		}

		$validator = Validator::make($input, [
			'nama_produk' => 'required|string|max:100',
			'harga_produk' => 'required|string',
			'satuan_produk' => 'required|string',
			'status' => 'required|string',
			'limit' => 'required|integer',
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
			'status' => $request->status,
			'limit' => $request->limit,
			'kategori_produk' => $list_kategori[$request->kategori_produk],
			'foto' => $input['foto'],
			'deskripsi' => $request->deskripsi,
			]);

		return redirect('produk');
	}

	public function edit($id)
	{
		$list_kategori = ['fotografi', 'vidiografi'];
		$produk = Produk::findOrFail($id);
		return view('produk.edit', compact('produk', 'list_kategori'));
	}

	public function update($id, Request $request)
	{
		$produk = Produk::findOrFail($id);
		$list_kategori = ['fotografi', 'vidiografi'];

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
		} else {
			$input['foto'] = $produk->foto;
		}

		$input['kategori_produk'] = $list_kategori[$request->kategori_produk];

		$validator = Validator::make($input, [
			'nama_produk' => 'required|string|max:20',
			'harga_produk' => 'required|string',
			'satuan_produk' => 'required|string',
			'kategori_produk' => 'required|string',
			'status' => 'required|string',
			'limit' => 'required|integer',
			'foto' => 'sometimes|max:5000',
			'deskripsi' => 'sometimes|max:500',
		]);
		if ($validator->fails()) {
			return redirect('produk/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$produk->update($input);
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
			'status' => $request->status,
			'limit' => $produk->limit,
				];
		$produk->update($input);
		return redirect('aktivasi');
	}	
}