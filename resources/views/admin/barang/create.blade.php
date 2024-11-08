@extends('admin.layout1.main')

@section('content')

<div class="container mb-4 p-4  d-flex justify-content-center">
    <div class="c8 c7 card "  style="width: 45rem;">
        <h5 class="card-header">TAMBAH BARANG</h5>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf


            <div class="form-group mb-3">
                <label class="font-weight-bold">image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" >
                <small><img src="{{ asset('storage/public/image/' . $barang->image) }}" alt="gambar tidak masuk" style="width: 100px; height: auto;"></small>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror">
                @error('kode_barang')
                    <div class="alert alert-denger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control @error('nama_barang') is-invalid @enderror">
                @error('nama_barang')
                <div class="alert alert-danger mt-3"> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror">
                @error('kategori')
                <div class="alert alert-danger mt-3"> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="merk" class="form-label">Merk</label>
                <input type="text" name="merk" class="form-control @error('merk')is-invalid @enderror ">
                @error('merk')
                <div class="alert alert-danger mt-3"> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="number" name="jumlah" min="1" class="form-control @error('jumlah') @enderror">
                @error('jumlah')
                <div class="alert alert-danger mt-3"> {{$message}} </div>
                @enderror
            </div>

                <button type="submit" class="btn btn-primary me-2">save</button>
                <a href="{{ route('barang.index')}}"  type="reset" class="btn btn-danger">cansel</a>
        </form>
        </div>
      </div>
</div>


@endsection
