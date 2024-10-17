@extends('templates.app')

@section('content-dinamis')
<div class="container mt-5">
    <div class="d-flex justify-content-end">
        <form class="d-flex me-3" action="{{ route('kelola_akun.data') }}" method="GET">
            <input type="text" name="cari" placeholder="Cari Pengguna..." class="form-control me-2">
            <button type="submit" class="btn btn-primary">Cari</button>
        </form>
        <a href="{{ route('kelola_akun.tambah') }}" class="btn btn-success">+ Tambah</a>
    </div>
        <br>
        @if (Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <table class="table table-stripped table-bordered mt-3 text-center">
            <thead>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @if (count($aksesoris) < 1)
                    <tr>
                        <td colspan="6">Data Pengguna Kosong</td>
                    </tr>
                @else
                    @foreach ($aksesoris as $index => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['email'] }}</td>
                            <td class="d-flex justify-content-center">
                                <a href="{{ route('kelola_akun.ubah', $item['id']) }}" class="btn btn-primary me-2">Edit</a>
                                <button class="btn btn-danger" onclick="showModalDelete('{{ $item->id }}','{{ $item->name }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>


        {{-- memanggil pagination --}}
        <div class="d-flex justify-content-end my-3">
            {{ $aksesoris->links() }}
        </div>

        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">HAPUS PENGGUNA</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        apakah anda yakin ingin menghapus pengguna tersebut <b id="nama_obat"></b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
                        <button type="submit" class="btn btn-danger">hapus</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- modal stok --}}
        <div class="modal fade" id="modalEditStock" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="number" name="stock" id="stock" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function showModalDelete(id, name) {
            $('#nama_obat').text(name);
            $('#exampleModal').modal('show');
            let url = "{{ route('kelola_akun.hapus' , ':id')}}";
            url = url.replace(':id', id);
            $("form").attr('action',url);
            $("exampleModal").modal('show');
        }   
        
    </script>
@endpush
