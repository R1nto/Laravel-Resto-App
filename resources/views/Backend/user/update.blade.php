@extends('Backend.back')

@section('admincontent')
<div class="row">
    <div class="col-6">
        <h2>Update Password</h2>
        <form action="{{ url('admin/user/'.$user->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mt-2">
                <label class="form-label" for="">Password :</label>
                <input class="form-control" type="password" name="password" id="">
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