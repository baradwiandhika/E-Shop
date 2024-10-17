<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Aksesoris</title>
    <!-- Link ke Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @stack('style')
    <style>
        .banner {
            background-color: #f8f9fa;
            padding: 50px 0;
            text-align: center;
        }
        body {
            padding-top: 56px; /* Memberikan ruang untuk navbar fixed-top */
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white p-3 fixed-top">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="h4">Toko Aksesoris</h1>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Route::is('landing_page') ? 'active' : '' }}" href="{{Route('landing_page')}}">Produk</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{Route::is('produk_aksesoris') ? 'active' : '' }}" href="{{route('produk_aksesoris.data')}}">keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{Route::is('kelola_akun') ? 'active' : '' }}" href="{{route('kelola_akun.data')}}">Tambah Akun</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        @yield('content-dinamis')
    </main>
    
    <!-- Script Bootstrap JS (jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @stack('scripts')
</body>
</html>
