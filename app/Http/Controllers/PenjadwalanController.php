<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Jual;
use App\Produk;
use App\User;
use Auth;
use DB;

class PenjadwalanController extends Controller
{
    public function index(Request $request)
	{
		$user = Auth::user();
		$idu = $user->id;
		// $penjualan_list = DB::table('penjualans')->where('user_id', $idu)->get();
		$penjualan_list = Penjualan::all();

		
		return view('penjadwalan.index', compact('penjualan_list'));
	}

	public function store(Request $request)
	{
		$penjualan_id = $request->penjualan_id;
		$produk_id = $request->produk_id;
		$penjualan_list = Jual::all();
		$penjualan = $penjualan_list->where('penjualan_id', $penjualan_id);
		$j = $penjualan->where('produk_id', $produk_id);

		foreach ($j as $ju) {
			$jual = Jual::findOrFail($ju->id);
			$jual->update([
				'id' => $jual->id,
				'status' => $jual->status+1,
				'jumlah' => $jual->jumlah,
				'produk_id' => $jual->produk_id,
				'penjualan_id' => $jual->penjualan_id,
			]);
			
		}

		
		return back();
	}

	public function edit(Request $request)
	{
		return back();
	}

	public function hapus($id)
	{
		$penjualan = Penjualan::findOrFail($id);
		$jual = Jual::all();
		$batals = $jual->where('penjualan_id', $id);
			foreach ($batals as $batal) {
				$del = Jual::findOrFail($batal->id);
				$del->delete();
			}
		$penjualan->delete();

		return back();
	}

	public function ganti(Request $request)
	{
		$penjualan_id = $request->penjualan_id;
		$produk_id = $request->produk_id;
		$penjualan_list = Jual::all();
		$penjualan = $penjualan_list->where('penjualan_id', $penjualan_id);
		$jual = $penjualan->where('produk_id', $produk_id);

		return view('pemesanan.edit', compact('jual'));
	}
}
