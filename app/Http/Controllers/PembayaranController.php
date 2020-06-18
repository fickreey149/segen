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

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembayaran_list = Pembayaran::all();
        $jumlah_pembayaran = Pembayaran::count();

        return view('pembayaran.index', compact('pembayaran_list', 'jumlah_pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $pembayaran_list = Pembayaran::all();

        return view('pembayaran.create', compact('penjualan', 'pembayaran_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();


        if ($request->hasFile('bukti')) {
            $bukti = $request->file('bukti');
            $ext = $bukti->getClientOriginalExtension();

            if ($request->file('bukti')) {
                $bukti_name = date('YmdHis'). ".$ext";
                $upload_path = 'fotoupload';
                $request->file('bukti')->move($upload_path, $bukti_name);
                $input['bukti'] = $bukti_name;
            }
        } else {
            $input['bukti'] = "dummycamera.png";
        }

        $validator = Validator::make($input, [
            'tgl_bayar' => 'required|date',
            'jumlah_bayar' => 'required|string',

        ]);

        if ($validator->fails()) {
            return redirect('pembayaran/create/'.+$request->penjualan_id)
                ->withInput()
                ->withErrors($validator);
        }

        $pembayaran = Pembayaran::create(
            [
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'total_tagihan' => $request->total_tagihan,
            'status' => $request->status,
            'kekurangan' => $request->total_tagihan - $request->jumlah_bayar,
            'bukti' => $input['bukti'],
            'penjualan_id' => $request->penjualan_id
            ]);

        return redirect('tagihan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
