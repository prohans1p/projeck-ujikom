@extends('admin.layout1.main')

@section('content')

<div class="container mb-4 p-4  d-flex justify-content-center">
    <div class="c8 c7 card "  style="width: 45rem;">
        <h5 class="card-header text-center">EDIT BARANG</h5>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form action="{{ route('peminjaman.update', $peminjamen->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_barang" class="form-label">nama peminjam</label>
                <input type="text" name="nama_peminjam" class="form-control" value="{{ $peminjamen->nama_peminjam }}" required>
                @error('nama_peminjam')
                    <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" value="{{ $peminjamen->kode_barang }}" required>
                @error('kode_barang')
                    <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" min="1" class="form-control" value="{{ $peminjamen->jumlah }}" required>
                @error('jumlah')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tgl_pinjam" class="form-label">Tanggal pinjam</label>
                <input type="date" name="tgl_pinjam" class="form-control" value="{{ $peminjamen->tgl_pinjam }}" required>
                @error('tgl_pinjam')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal kembali</label>
                <input type="date" name="tgl_kembali" class="form-control" value="{{ $peminjamen->tgl_kembali }}" required>
                @error('tgl_kembali')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keperluan" class="form-label">keperluan </label>
                <input type="text" name="keperluan" class="form-control" value="{{ $peminjamen->keperluan }}" required>
                @error('keperluan')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">keperluan </label>
                <input type="text" name="status" class="form-control" value="{{ $peminjamen->status }}" required>
                @error('status')
                <div> {{$message}} </div>
                @enderror
            </div>

            <button type="reset" class="btn btn-danger">cansel</button>
            <button type="submit" class="btn btn-primary me-2">save</button>

        </form>
        </div>
    </div>
</div>


@endsection

