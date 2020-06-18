<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Jurkam;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Session;
use Validator;

class JurkamController extends Controller

{
	public function daftar()
	{
		$jurkam_list = Jurkam::all();
		$jumlah_jurkam = Jurkam::count();
		return view('jurkam.daftar', compact('jurkam_list', 'jumlah_jurkam'));
	}

	public function index()
	{
		$jurkam_list = Jurkam::orderBy('nama_jurkam', 'asc')->paginate(10);
		$jumlah_jurkam = Jurkam::count();
		return view('jurkam.index', compact('jurkam_list', 'jumlah_jurkam'));
	}

	public function show($id)
	{
		$jurkam = Jurkam::findOrFail($id);
		return view('jurkam.show', compact('jurkam'));
	}

	public function create()
	{
		$list_kategori = ['fotografi', 'vidiografi'];
		$list_gender = ['Laki-laki', 'Perempuan'];
		
		return view('jurkam.create', compact('list_kategori', 'list_gender'));
	}

	public function store(Request $request)
	{
		$input = $request->all();
		$list_gender = ['Laki-laki', 'Perempuan'];
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
			'nama_jurkam' => 'required|string|max:40',
			'nik' => 'required|string',
			'alamat' => 'required|string|max:200',
			'gender' => 'required|string',
			'no_hp' => 'required|string',
			'foto' => 'sometimes|max:5000',
			'tanggal_lahir' => 'required|date',
			'tempat_lahir' => 'required|string',
			'kategori' => 'required|string',

			'email' => 'required|email|max:100|unique:users',
			'password' => 'required|min:6',
			'level' => 'required|in:admin,jurkam,pelanggan,kasir'

		]);

		if ($validator->fails()) {
			return redirect('jurkam/create')
				->withInput()
				->withErrors($validator);
		}

		if (
			$user = User::create([
				'name' => $request->nama_jurkam,
				'email' => $request->email,
				'password' => bcrypt($input['password']),
				'level' => $request->level,
			])
		) {
			$user_id = $user->id;
		}

		$jurkam = Jurkam::create(
			[
				'nama_jurkam' => $request->nama_jurkam,
				'nik' => $request->nik,
				'alamat' => $request->alamat,
				'gender' => $list_gender[$request->gender],
				'no_hp' => $request->no_hp,
				'foto' => $input['foto'],
				'tanggal_lahir' => $request->tanggal_lahir,
				'tempat_lahir' => $request->tempat_lahir,
				'kategori' => $request->kategori,
				'user_id' => $user_id,
			]);
		

		return redirect('jurkam');
	}

	public function edit($id)
	{
		$list_gender = ['Laki-laki', 'Perempuan'];
		$list_kategori = ['fotografi', 'vidiografi'];
		$jurkam = Jurkam::findOrFail($id);
		$user_id = $jurkam->user_id;
		$user = User::findOrFail($user_id);

		return view('jurkam.edit', compact('jurkam', 'list_kategori', 'list_gender', 'user'));
	}

	public function update($id, Request $request)
	{
		$jurkam = Jurkam::findOrFail($id);
		$user_id = $jurkam->user_id;
		$user = User::findOrFail($user_id);
		$list_gender = ['Laki-laki', 'Perempuan'];


		$input = $request->all();

		if ($request->hasFile('foto')) {

			$exist = Storage::disk('foto')->exist($jurkam->foto);
			if (isset($jurkam->foto) && $exist) {
				$delete = Storage::disk('foto')->delete($jurkam->foto);
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
			$input['foto'] = $jurkam->foto;
		}

		$input['gender'] = $list_gender[$request->gender];

		$input['name'] = $request->nama_jurkam;
		$input['password'] = $user->password;

		$validator = Validator::make($input, [
			'nama_jurkam' => 'required|string|max:40',
			'nik' => 'required|string',
			'alamat' => 'required|string|max:200',
			'gender' => 'required|string',
			'no_hp' => 'required|string',
			'foto' => 'sometimes|max:5000',
			'tanggal_lahir' => 'required|date',
			'tempat_lahir' => 'required|string',
			'kategori' => 'required|string',

			'email' => 'required|email|max:100',
		]);
		if ($validator->fails()) {
			return redirect('jurkam/' . $id . '/edit')
				->withInput()
				->withErrors($validator);
		}

		$jurkam->update($input);

		$user->update($input);

		return redirect('jurkam');
	}

	public function destroy($id)
	{
		$jurkam = Jurkam::findOrFail($id);
		$user_id = $jurkam->user_id;
		$user = User::findOrFail($user_id);
		$jurkam->delete();
		$user->delete();

		return redirect('jurkam');
	}

}