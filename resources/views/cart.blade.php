@extends('front')

@section('content')
    @if (session('cart'))
        @php
            $no=1;
            $total =0;
        @endphp
        <div class="">
            <div>
                <a class="btn btn-danger" href="{{ url('batal') }}">Batal</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Menu</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (session('cart') as $idmenu=>$menu)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $menu['menu'] }}</td>
                            <td>{{ number_format($menu['harga']) }}</td>
                            <td>
                                <span>
                                    <a href="{{ url('tambah/'.$menu['idmenu']) }}"> [+] </a>
                                </span>
                                {{ $menu['jumlah'] }}
                                <span>
                                    <a href="{{ url('kurang/'.$menu['idmenu']) }}"> [-] </a>
                                </span>
                            </td>
                            <td>{{ $menu['jumlah'] * $menu['harga'] }}</td>
                            <td><a href="{{ url('hapus/'.$menu['idmenu']) }}">Hapus</a></td>
                        </tr>
                        @php
                            $total = $total + ($menu['jumlah'] * $menu['harga']);
                        @endphp
                    @endforeach
                    <tr>
                        <td colspan="4">Total Pembayaran</td>
                        <td>{{ number_format($total) }}</td>
                    </tr>
                </tbody>
            </table>
            <div>
                <a class="btn btn-success" href="{{ url('checkout') }}">Checkout</a>
            </div>
        </div>
    @else
        <script>window.location.href="/"</script>
    @endif
@endsection