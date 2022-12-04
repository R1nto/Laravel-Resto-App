@extends('Backend.back')

@section('admincontent')
    <div>
        <h1>Order Detail</h1>
    </div>
            <form action="{{ url('admin/orderdetail/create') }}" method="get">
                <div class="row">
                <div class="mt-2 col-4 ">
                    <label class="form-label" for="">Tanggal Mulai :</label>
                    <input class="form-control" type="date" name="tglmulai" id="">
                </div>
                <div class="mt-2 col-4">
                    <label class="form-label" for="">Tanggal Akhir :</label>
                    <input class="form-control"  type="date" name="tglakhir" id="">
                </div>
                <div class="my-4 col-4">
                    <p></p>
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </div>
            </form>
    
    <div class="mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Menu</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                </tr>
            </thead>
            @php
                $no=1;
            @endphp
            <tbody>
                    @foreach ($details as $detail )
                     <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $detail->tglorder }}</td>
                        <td>{{ $detail->pelanggan }}</td>
                        <td>{{ $detail->menu }}</td>
                        <td>{{ number_format($detail->harga) }}</td>
                        <td>{{ $detail->jumlah }}</td>
                        <td>{{ number_format($detail->total) }}</td>
                    </tr>
                    @endforeach
            </tbody>
        </table>      
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $details->withQueryString()->links() }}
      </div>
@endsection