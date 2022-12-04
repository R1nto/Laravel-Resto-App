@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-6">
        <h2>Update Kategori</h2>
        <form action="{{ url('admin/kategori/'.$kategori->idkategori) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mt-2">
                <label class="form-label" for="">Kategori :</label>
                <input class="form-control" value="{{ $kategori->kategori }}" type="text" name="kategori" id="">
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection