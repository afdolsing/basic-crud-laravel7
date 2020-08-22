<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Prophecy\Promise\ReturnPromise;

class CrudController extends Controller
{
    public function index()
    {
        // menampilkan atau memanggil data profil dari tabel profil  di db sebanyak 3 data dan menentukan paginate setiap halaman berisi 3 data
        $profil = DB::table('profil')->paginate(5);
        // kemudian di kembalikan/dikirim datanya ke folder profil file index.blade.php
        return view('profil.index', compact('profil'));
    }

    public function cari(Request $request)
    {
        // request yang di inputkan di dalam kolom pencarian tadi kemudian disimpan dalam variabel cari.
        $cari = $request->cari;
        // query untuk mencari data yang berada dalam tabel profil berdasarkan nama
        $profil = DB::table('profil')->where('nama', 'LIKE', "%" . $cari . "%")->paginate();
        // kemudian di kembalikan / dikirim data ke folder profil file.index.php
        return view('profil.index', compact('profil'));
    }

    public function tambah()
    {
        // mengambil data di tabel hobi
        $hobi = DB::table('hobi')->get();
        //menampilkan halaman tambah profil
        return view('profil.tambah', compact('hobi'));
    }

    public function store(Request $request)
    {
        //query untuk insert data ke tabel profil
        DB::table('profil')->insert([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'hobi' => $request->hobi
        ]);
        //setelah di insert  dikembalikan ke route profil yang berfungsi mengembalikan ke halaman utama profil
        return redirect('/profil');
    }

    public function edit($id)
    {
        //megambil data di tabel profil berdasarkan id / kolom id
        $profil = DB::table('profil')->where('id', $id)->get();
        //megambil data di tabel hobi
        $hobi = DB::table('hobi')->get();
        // mengembalikan ke halaman edit dan mengirim data profil
        return view('profil.edit', compact('profil', 'hobi'));
    }

    public function update(Request $request)
    {
        //query untuk update data profil berdasarkan kolom id pada tabel profil
        DB::table('profil')->where('id', $request->id)->update([
            'nama' => $request->nama,
            'umur' => $request->umur,
            'hobi' => $request->hobi
        ]);
        //setelah di update di kembalikan ke route profil yang berfungsi mengembalikan ke halaman utama profil.
        return redirect('/profil');
    }
    public function hapus($id)
    {
        //query untuk menghapus data profil berdasarkan kolom id
        DB::table('profil')->where('id', $id)->delete();
        // setelah menghapus di kembalikan ke route profil yang berfungsi ke halaman utama profil
        return redirect('/profil');
    }
}
