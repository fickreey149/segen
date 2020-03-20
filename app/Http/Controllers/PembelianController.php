<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Pembelian;
use App\Supplier;
use App\Beli;
use App\Produk;
use Gloudemans\Shoppingcart\Facades\Cart;
use Validator;
use Session;
use DB;

class PembelianController extends Controller
{
    public function index()
	{
		$pembelian_list = Pembelian::latest()->paginate(10);
		$jumlah_pembelian = Pembelian::count();
		return view('pembelian.index', compact('pembelian_list', 'jumlah_pembelian'));
	}

	public function show($id)
	{
		$pembelian = Pembelian::findOrFail($id);
		return view('pembelian.show', compact('pembelian'));
	}

	public function create()
	{
		$list_supplier = Supplier::pluck('nama_supplier', 'id');
		$list_produk = Produk::pluck('nama_produk', 'id');
		$cartItems = Cart::content();
		$jum = Pembelian::count();
		$kode = $jum + 1;
		return view('pembelian.create', compact('list_supplier','list_produk', 'cartItems', 'kode'));
	}

	public function store(Request $request)
	{
		$input = $request->all();

		$validator = Validator::make($input, [
			'tanggal_pembelian' => 'required|date',
			'kode_beli' => 'required|string',
			'supplier_id' => 'required',
		]);
		if ($validator->fails()) {
			return redirect('pembelian/create')
				->withInput()
				->withErrors($validator);
		}

		$pembelian =  Pembelian::create([
			'kode_beli' => $request->kode_beli,
			'tanggal_pembelian' => $request->tanggal_pembelian,
			'supplier_id' => $request->supplier_id,
			'total_bayar' => Cart::total(),
		]);
		

		$cartItems = Cart::content();
		foreach ($cartItems as $cartItem) {
			$b = $cartItem->id;
			$produk = Produk::find($b);
			$produk->update([
				'id' => $produk->id,
				'nama_produk' => $produk->nama_produk,
				'satuan_produk' => $produk->satuan_produk,
				'stok_produk' => $produk->stok_produk + $cartItem->qty,
			]);
			$pembelian->buyItems()->attach($cartItem->id, [
				'jumlah' => $cartItem->qty,
				'harga_produk' => $cartItem->price,
			]);
		}

		Cart::destroy();

		Session::flash('flash_message', 'Pembelian Berhasil...');

		return redirect('pembelian');
	}

	public function edit($id)
	{
		$pembelian = Pembelian::findOrFail($id);
		return view('pembelian.edit', compact('pembelian'));
	}

	public function update($id, Request $request)
	{
		$pembelian = Pembelian::findOrFail($id);
		$input = $request->all();

		$validator = Validator::make($input, [
			'tanggal_beli' => 'required|date',
			'jumlah_beli' => 'required|string',
			'total_bayar' => 'required|string'
		]);
		if ($validator->fails()) {
			return redirect('pembelian/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$pembelian->update($request->all());
		return redirect('pembelian');
	}

	public function destroy($id)
	{
		$beli = DB::table('produk_pembelian')->where('pembelian_id', $id)->get();
		foreach ($beli as $j) {
			$data = array('id' => $j->id,
			 				'jumlah' => $j->jumlah,
			 				'harga_produk' => $j->harga_produk,
			 				'produk_id' => $j->produk_id,
			 				'pembelian_id' => $j->pembelian_id,
			 			);
			
			$ids=$j->id;
			$beli = Beli::findOrFail($ids);
			$beli->delete();
		};

		
		$pembelian = Pembelian::findOrFail($id);
		$pembelian->delete();
		return redirect('pembelian');
	}

}
