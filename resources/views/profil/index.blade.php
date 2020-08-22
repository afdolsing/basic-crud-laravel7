@extends('layouts.master')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1>Data Profil</h1>
            <p>Cari Data Profil :</p>
            <form action="/profil/cari" mehod="GET" class="forminline">
                <div class="form-row">
                    <div class="col-7">
                        <input class="form-control" type="text" name="cari" placeholder="Cari Profil" value="{{ old('cari') }}">
                    </div>
                    <div class="col">
                        <input class="btn btn-primary ml-3" type="submit" value="CARI">
                    </div>
                  </div>
            </form>
            <br>
            <a href="/profil/tambah" class="btn btn-primary">+ Tambah
                Profil Baru</a>
            <br>
            <br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Hobi</th>
                    <th>Opsi</th>
                </tr>
                @if ($profil->total() > 0)
                @foreach($profil as $data)
                <tr>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->umur }}</td>
                    <td>{{ $data->hobi }}</td>
                    <td>
                        <a class="btn btn-warning" href="/profil/edit/{{ $data->id }}">Edit</a>
                        <a class="btn btn-danger" href="/profil/hapus/{{ $data->id }}">Hapus</a>
                    </td>
                </tr>
                @endforeach
                @else
                    <td class="text-center bg-danger" colspan="4">Data Tidak Ditemukan</td>
                @endif

            </table>
            <br>
            Halaman : {{ $profil->currentPage() }} <br>
            Jumlah Data : {{ $profil->total() }} <br>
            Data per Halaman : {{ $profil->perPage() }}<br>
            <br>
            {{ $profil->links() }}
        </div>
    </div>
</div>
@endsection
