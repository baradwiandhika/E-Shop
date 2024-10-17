@extends('templates.app')

@section('content-dinamis')

<form action="{{ route('kelola_akun.ubah.proses', $user['id'])}}" method="POST" class="card p-5">
    @csrf
    @method('PATCH')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nama Pengguna: </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name" value="{{ $user['name'] }}">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="email" name="email" value="{{ $user['email'] }}">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="password" class="col-sm-2 col-form-label">Password : </label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="password" name="password" value="{{old('password')}}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
</form>
@endsection
