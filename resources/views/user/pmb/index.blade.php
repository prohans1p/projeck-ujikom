@extends('user.layout.main')

@section('sip')
    <div class="main">
        <div class="container p-4">
            <h3>DAFTAR PENGEMBALIAN BARANG</h3>
        <div class="card">
            <div class="card-header">
                <i class="bi bi-shop"></i>
             {{-- <a href="{{ route('pmb.create') }} "  type="button" style="float:right;" class="btn btn-success position-relative" >Tambah Barang</a> --}}
            </div>
            <div class="card-body mt-0">
                <div class="row mb-3 justify-content-between align-items-center">
                    <div class="col-md-6 col-sm-8">
                        <div class="form-inline">
                            <label for="entries" class="mr-2">show</label>
                            <select name="entries" id="entries" class="form-control form-control-sm w-25 mr-2">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                    </div>

                    {{-- <div class="col-md-6 col-sm-4 d-flex justify-content-end">
                        <input type="text" id="search" class="form-control form-control-sm w-50 ml-auto" placeholder="search...">
                    </div> --}}
                </div>
                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                    <table id="datatablesSimple" class="table table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Keperluan</th>
                            <th>Status</th>
                            <th>Image</th>
                        </thead>

                        <tbody>
                            @forelse ($peminjamen as $peminjaman)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>{{$peminjaman->kode_barang}}</td>
                                <td>{{$peminjaman->jumlah}}</td>
                                <td>{{$peminjaman->tgl_pinjam}}</td>
                                <td>{{$peminjaman->tgl_kembali}}</td>
                                <td>{{ $peminjaman->keperluan}}</td>
                                <td>{{ $peminjaman->status}}</td>
                                <td>
                                    @if($peminjaman->image)
                                        <img src="{{ asset('storage/storage/public/image/' . $peminjaman->image) }}" alt="Gambar Pengembalian" style="width: 100px; height: auto;">
                                    @else
                                        <span>Gambar Belum Tersedia</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($peminjaman->status !== 'sudah kembali')
                                        <a href="{{ route('user.pmb.edit', $peminjaman->id) }}" class="btn btn-primary btn-sm">Kembali</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger ">
                                data belum tersedia
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $peminjamen->links()}}
                </div>
            </div>
          </div>
        </div>
      <!-- end card -->

    </div>
@endsection
