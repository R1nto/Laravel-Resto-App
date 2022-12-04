@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-6">
        <h2>Insert Menu</h2>
        <form action="{{ url('admin/menu') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-2">

                <select class="form-select mt-3" name="idkategori" id="" onchange="this.form.submit()">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->idkategori }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>

                <label class="form-label mt-3" for="">Menu :</label>
                <input class="form-control" type="text" name="menu" id="">
                <span class="text-danger">
                    @error('menu')
                        {{ $message }}
                    @enderror
                </span>

                <label class="form-label mt-3" for="">Deskripsi :</label>
                <input class="form-control" type="text" name="deskripsi" id="">
                <span class="text-danger">
                    @error('deskripsi')
                        {{ $message }}
                    @enderror
                </span>

                <label class="form-label mt-3" for="">Harga :</label>
                <input class="form-control" type="number" name="harga" id="">
                <span class="text-danger">
                    @error('harga')
                        {{ $message }}
                    @enderror
                </span>

                <label class="form-label mt-3" for="">Gambar :</label>
                <input class="form-control" type="file" name="gambar" id="">
                <span class="text-danger">
                    @error('gambar')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="mt-3">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </form>
    </div>
</div>
@endsection