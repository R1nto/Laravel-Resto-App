@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Menu</h1>
    </div>
    <div class="mt-3">
        <a href="{{ url('admin/menu/create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="row mt-2">
        <div class="col-4 mb-2">
            <form action="{{ url('admin/select') }}" method="get">
                <select class="form-select" name="idkategori" id="" onchange="this.form.submit()">
                    <option value="">---Pilih Kategori---</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->idkategori }}">{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </form>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Menu</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Harga</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                    @foreach ($menus as $menu )
                     <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $menu->kategori }}</td>
                        <td>{{ $menu->menu }}</td>
                        <td>{{ $menu->deskripsi }}</td>
                        <td><img width="100px" src="{{ asset('images/'.$menu->gambar) }}" alt=""></td>
                        <td>{{ number_format($menu->harga) }}</td>
                        <td><a href="{{ url('admin/menu/'.$menu->idmenu.'/edit') }}">Ubah</a></td>
                        <td><a href="{{ url('admin/menu/'.$menu->idmenu) }}">Hapus</a></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>      
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $menus->withQueryString()->links() }}
      </div>
    
@endsection