@extends('templates.app')

@section('content-dinamis')
    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <form class="d-flex me-3" action="{{ route('produk_aksesoris.data') }}" method="GET">
                <input type="text" name="cari" placeholder="Cari Nama Obat..." class="form-control me-2">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <a href="{{ route('produk_aksesoris.tambah') }}" class="btn btn-success">+ Tambah</a>
        </div>
        <br>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-stripped table-bordered mt-3 text-center">
            <thead>
                <th>Jenis</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @if (count($aksesoris) < 1)
                    <tr>
                        <td colspan="6">Data Obat Kosong</td>
                    </tr>
                @else
                    @foreach ($aksesoris as $index => $item)
                        <tr>
                            <td>{{ $item['name'] }}</td>
                            <td>{{$item['stock']}}</td>
                            <td>Rp. {{ number_format($item['price'], 0, ',', '.') }}</td>
                            </td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('produk_aksesoris.ubah', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                                <form action="{{ route('produk_aksesoris.hapus', $item['id']) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus item ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
            
        </table>

        <div class="d-flex justify-content-end my-3">
            {{ $aksesoris->links() }}
        </div>

    @endsection

    
