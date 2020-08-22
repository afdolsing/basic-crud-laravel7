@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Edit Profil</h3>
                    <a href="/profil" class="btn btn-primary">Kembali</a>
                    <br>
                    <br>
                    @foreach($profil as $data)
                    <form action="/profil/update" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" required="required"
                                value="{{ $data->nama }}">
                        </div>
                        <div class="form-group">
                            <label>Umur</label>
                            <input type="text" class="form-control" name="umur" required="required"
                                value="{{ $data->umur }}">
                        </div>
                        <div class="form-group">
                            <label for="hobi">Hobi</label>
                            <select id="hobi" class="form-control" name="hobi">
                                @foreach ($hobi as $item)
                                <option @if ($data->hobi == $item->nama_hobi) selected @else value="" @endif >{{ $item->nama_hobi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update" class="btn btn-primary">
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
