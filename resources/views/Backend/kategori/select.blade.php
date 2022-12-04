@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Kategori</h1>
    </div>
    <div class="mt-3">
        <a href="{{ url('admin/kategori/create') }}" class="btn btn-primary">Tambah Data</a>
    </div>
    <div class="mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Ubah</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                    @foreach ($kategoris as $kategori )
                     <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kategori->kategori }}</td>
                        <td><a href="{{ url('admin/kategori/'.$kategori->idkategori.'/edit') }}">Ubah</a></td>
                        <td><a href="{{ url('admin/kategori/'.$kategori->idkategori) }}">Hapus</a></td>
                    </tr>
                    @endforeach
            </tbody>
        </table>      
    </div>
    
@endsection