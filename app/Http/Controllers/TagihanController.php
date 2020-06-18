<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Pembayaran;
use App\Produk;
use App\Jual;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Validator;
use Session;
use DB;

class TagihanController extends Controller
{
    public function index()
	{
		$penjualan_list = Penjualan::where(function ($query){
			$query->where('status', 0)
			->where('user_id', Auth::user()->id);
		})
		->orderBy('id', 'DESC')->get();
		$pembayaran_list = Pembayaran::all();
		// dd($pembayaran_list);

		return view('tagihan.index', compact('penjualan_list', 'pembayaran_list'));
	}

	public function show($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		return view('penjualan.show', compact('penjualan'));
	}

	public function create()
	{
		$produk_list = Produk::all();
		// $makanan_list = $produk_list->where('kategori_produk', 'Makanan');
		// $minuman_list = $produk_list->where('kategori_produk', 'Minuman');
		// $jumlah_produk = Produk::count();
		return view('cart.create', compact('produk_list'));
	}

	public function store(Request $request)
	{
		$input = $request->all();
		$user = Auth::user();

		$validator = Validator::make($input, [
			'alamat_acara' => 'required|string',
			'nama_acara' => 'required|string',
			'status' => 'required|string|max:2',
			'tanggal_penjualan' => 'required|date',
			'kode_jual' => 'required|string',
		]);
		if ($validator->fails()) {
			return redirect('cart')
				->withInput()
				->withErrors($validator);
		}

		$start_date = $request->start_date;
		$end_date = $request->end_date;


		$penjualan =  Penjualan::create([
			'kode_jual' => $request->kode_jual,
			'tanggal_penjualan' => $request->tanggal_penjualan,
			'status' => $request->status,
			'total_bayar' => Cart::total(),
			'nama_acara' => $request->nama_acara,
			'alamat_acara' => $request->alamat_acara,
			'user_id' => $user->id
		]);

		

		$cartItems = Cart::content();
		$i = 0;

		foreach ($cartItems as $cartItem) {
			$penjualan->orderItems()->attach($cartItem->id, [
				'jumlah' => $cartItem->qty,
				'status' => 0,
				'start_date' => $start_date[$i],
				'end_date' => $end_date[$i],
			]);
			$i = $i+1;
		}

		Cart::destroy();

		Session::flash('flash_message', 'Pemesanan Berhasil...');

		return redirect('cart/create');
	}

	public function edit($id)
	{
		$penjualan = Pembelian::findOrFail($id);
		return view('pembelian.edit', compact('pembelian'));
	}

	public function status($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		$penjualan->update([
			'kode_jual' => $penjualan->kode_jual,
			'tanggal_penjualan' => $penjualan->tanggal_penjualan,
			'status' => '1',
			'nama_konsumen' => $penjualan->nama_konsumen,
			'total_bayar' => $penjualan->total_bayar,
			'user_id' => $penjualan->user_id
		]);

		
		return back();
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
		$jual = DB::table('penjualan_produk')->where('penjualan_id', $id)->get();
		foreach ($jual as $j) {
			$data = array('id' => $j->id,
			 				'jumlah' => $j->jumlah,
			 				'status' => $j->status,
			 				'produk_id' => $j->produk_id,
			 				'penjualan_id' => $j->penjualan_id,
			 			);
			
			$ids=$j->id;
			$jual = Jual::findOrFail($ids);
			$jual->delete();
		};

		
		$penjualan = Penjualan::findOrFail($id);
		$penjualan->delete();
		return redirect('penjualan');
	}

	public function print($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		return view('penjualan.print', compact('penjualan'));
	}

}
