@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Tambah Data Profil</h3>
                    <a href="/profil" class="btn btn-primary"> Kembali</a>
                    <br>
                    <br>
                    <form action="/profil/store" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="umur">Umur</label>
                            <input class="form-control" id="umur" type="text" name="umur">
                        </div>
                        <div class="form-group">
                            <label for="state">Hobi</label>
                            <select id="state" class="form-control" name="hobi">
                                <option value="">--Pilih Hobi--</option>
                                @foreach ($hobi as $item)
                                <option>{{ $item->nama_hobi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
