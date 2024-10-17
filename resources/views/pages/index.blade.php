@extends('templates.app')

@section('content-dinamis')
    <div class="container mt-5">
        <h1>Daftar Aksesoris</h1>
        <div class="d-flex justify-content-end">
            <a href="{{ route('produk_aksesoris.tambah') }}" class="btn btn-success">+ Tambah</a>
        </div>
        <br>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-striped table-bordered mt-3 text-center">
            <thead>
                <tr>
                    <th>Jenis</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($aksesoris->isEmpty())
                    <tr>
                        <td colspan="4">Data Obat Kosong</td>
                    </tr>
                @else
                    @foreach ($aksesoris as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('produk_aksesoris.ubah', $item->id) }}" class="btn btn-primary me-2">Edit</a>
                                <form action="{{ route('produk_aksesoris.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Anda yakin ingin menghapus item ini?');">
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
    </div>
@endsection
