@extends('templates.app')

@section('content-dinamis')
{{-- <h1>ini halaman Landing Page</h1> --}}
@endsection

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Aksesoris</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>   
    <main class="container">
        <section class="banner">
            <h1>Temukan Aksesoris Terbaik untuk Gaya Anda!</h1>
        </section>

        <section id="produk" class="my-5">
            <h2 class="text-center">Aksesoris Pilihan Kami</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98w-lrv40fb8mgiv77.webp" class="card-img-top" alt="Produk 1">
                        <div class="card-body">
                            <h5 class="card-title">Cincin</h5>
                            <p class="card-text">Rp 85.000</p>
                            <a href="{{ route('produk_aksesoris.tambah') }}" class="btn btn-success">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="https://down-id.img.susercontent.com/file/14710463d780caeb064e0d404e586317.webp" class="card-img-top" alt="Produk 2">
                        <div class="card-body">
                            <h5 class="card-title">Gelang</h5>
                            <p class="card-text">Rp 110.000</p>
                            <a href="{{ route('produk_aksesoris.tambah') }}" class="btn btn-success">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="https://down-id.img.susercontent.com/file/id-11134207-7r98y-lm74k1t7l12s20.webp" class="card-img-top" alt="Produk 3">
                        <div class="card-body">
                            <h5 class="card-title">Kalung</h5>
                            <p class="card-text">Rp 175.000</p>
                            <a href="{{ route('produk_aksesoris.tambah') }}" class="btn btn-success">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        <img src="https://down-id.img.susercontent.com/file/id-11134207-7r991-lsadlv3b5l6l1c.webp" class="card-img-top" alt="Produk 4">
                        <div class="card-body">
                            <h5 class="card-title">Anting</h5>
                            <p class="card-text">Rp 120.000</p>
                            <a href="{{ route('produk_aksesoris.tambah') }}" class="btn btn-success">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>
