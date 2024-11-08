@extends('admin.layout1.main')

@section('content')

<div class="container mb-4 p-4  d-flex justify-content-center">
    <div class="c8 c7 card "  style="width: 45rem;">
        <h5 class="card-header text-center">EDIT BARANG</h5>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form action="{{ route('barang.update', $barangs->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" value="{{ $barangs->kode_barang }}" required>
                @error('kode_barang')
                    <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barangs->nama_barang }}" required>
                @error('nama_barang')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control" value="{{ $barangs->kategori }}" required>
                @error('kategori')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" name="merk" class="form-control" value="{{ $barangs->merk }}" required>
                @error('merk')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah"  min="1"  class="form-control" value="{{ $barangs->jumlah }}" required>
                @error('jumlah')
                <div> {{$message}} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary me-2">save</button>
            <a href="{{ route('barang.index')}}"  type="reset" class="btn btn-danger">cansel</a>

        </form>
        </div>
    </div>
</div>


@endsection

