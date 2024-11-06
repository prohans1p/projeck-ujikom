@extends('admin.layout1.main')

@section('content')


    <div class="main">
        <div class="container p-4">
            <h1>DAFTAR BARANG</h1>
            <div class="card">
                <div class="card-header">
                    <i class="bi bi-shop"></i>


                    <a href="{{ route('barang.create')}}" type="button" style="float:right;" class="btn btn-success position-relative" >
                        Tambah barang</a>
                </div>
                <div class="card-body mt-0">
                    <div class="row mb-3 justify-content-between align-items-center">
                        <div class="col-md-6 col-sm-8">
                            <div class="form-inline">
                                <label for="entries" celass="mr-2">Show</label>
                                <select name="entries" id="entries" class="form-control form-control-sm w-25 mr-2">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-md-6 col-sm-4 d-flex justify-content-end">
                            <input type="text" id="search" class="form-control form-control-sm w-50 ml-auto" placeholder="Search...">
                        </div> --}}
                    </div>

                    <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                        <table id="datatablesSimple" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>image</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Merk</th>
                                    <th>Jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($barangs as $barang)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($barang->image)
                                            <img src="{{ asset('storage/public/image/' . $barang->image) }}" alt="Gambar Pengembalian" style="width: 100px; height: auto;">
                                        @else
                                            <span>Gambar Belum Tersedia</span>
                                        @endif
                                    </td>
                                    {{-- <th>{{ $barang->id }}</th> --}}
                                    <td>{{ $barang->kode_barang }}</td>
                                    <td>{{ $barang->nama_barang }}</td>
                                    <td>{{ $barang->kategori }}</td>
                                    <td>{{ $barang->merk }}</td>
                                    <td>{{ $barang->jumlah }}</td>
                                    <td>

                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $barang->id) }}" method="POST">
                                            <a href="{{ route('barang.edit', $barang->id)}}" class="btn btn-primary btn-sm ">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">hapus</button>
                                        </form>
                                        <!-- Button Edit -->

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data tidak ditemukan</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                        <!-- Pagination -->
                        {{ $barangs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
        @endif
    </script>
@endsection
