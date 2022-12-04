<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Restoran Rinto</title>
    <link rel="stylesheet" href="{{ asset("bootstrap/css/bootstrap.min.css") }}">
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mt-2">
            <nav class="navbar navbar-expand-lg " style="background-color: #e3f2fd;">
                <div class="container-fluid">
                    <h2>Admin Page</h2>
                    <ul class="navbar-nav gap-5">
                        <li class="navbar-item">{{ Auth::user()->email }}</li>
                        <li class="navbar-item">Level : {{ Auth::user()->level }} </li>
                        <li class="navbar-item"><a href="{{ url('admin/logout') }}">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row">
            <div class="col-2 mt-3">
                <ul class="list-group">
                    @if (Auth::user()->level == 'admin')
                        <li class="list-group-item"><a href="{{ url('admin/user') }}">User</a></li>        
                    @endif
                    @if (Auth::user()->level == 'kasir')
                        <li class="list-group-item"><a href="{{ url('admin/order') }}">Order</a></li>        
                        <li class="list-group-item"><a href="{{ url('admin/orderdetail') }}">Order Detail</a></li>        
                    @endif
                    @if (Auth::user()->level == 'manager')
                        <li class="list-group-item"><a href="{{ url('admin/kategori') }}">Kategori</a></li>        
                        <li class="list-group-item"><a href="{{ url('admin/menu') }}">Menu</a></li>        
                        <li class="list-group-item"><a href="{{ url('admin/pelanggan') }}">Pelanggan</a></li>        
                        <li class="list-group-item"><a href="{{ url('admin/order') }}">Order</a></li>        
                        <li class="list-group-item"><a href="{{ url('admin/orderdetail') }}">Order Detail</a></li>        
                    @endif
                </ul>
            </div>
            <div class="col-10 mt-3">
                @yield('admincontent')
            </div>
        </div>
        <div class="mt-4" style="background-color: #e3f2fd;">
            <p class="text-center">@Rinto.com</p>
        </div>
    </div>
    <script src="{{ asset("bootstrap/js/bootstrap.min.js") }}"></script>
</body>
</html>