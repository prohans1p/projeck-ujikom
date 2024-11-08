@extends('user.layout.main')

@section('sip')

<div class="container mb-4 p-4  d-flex justify-content-center">
    <div class="c8 c7 card "  style="width: 45rem;">
        <h5 class="card-header text-center">PENGEMBALIAN</h5>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <form action="{{ route('user.pmb.update', $peminjamen->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" >
                <small><img src="{{ asset('storage/public/image/' . $peminjamen->image) }}" alt="gambar tidak masuk" style="width: 100px; height: auto;"></small>
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3 " >
                <input type="hidden" name="nama_peminjam" class="form-control" value="{{ $peminjamen->nama_peminjam}}" readonly>
                @error('nama_peminjam')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">  kode barang </label>
                <input type="text" name="kode_barang" class="form-control" value="{{ $peminjamen->kode_barang }}" readonly >
                @error('kode_barang')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">jumlah</label>
                <input type="number" name="jumlah" min="1" class="form-control" value="{{ $peminjamen->jumlah }}" readonly  >
                @error('jumlah')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Keperluan</label>
                <input type="text" name="keperluan" class="form-control" value="{{ $peminjamen->keperluan }}" readonly >
                @error('keperluan')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                {{-- <label for="nama_barang" class="form-label">Tanggal pinjam</label> --}}
                <input type="hidden" name="tgl_pinjam" class="form-control" value="{{ $peminjamen->tgl_pinjam }}" readonly >
                @error('tgl_pinjam')
                <div> {{$message}} </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tgl_kembali" class="form-label">Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control"
                       value="{{ old('tgl_kembali', $peminjamen->tgl_kembali ?? date('Y-m-d')) }}" readonly>
                @error('tgl_kembali')
                <div> {{$message}} </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label for="kategori" class="form-label">status</label>
                <input type="text" name="status" class="form-control" value="{{ $peminjamen->status }}" >
                @error('status')
                <div> {{$message}} </div>
                @enderror
            </div> --}}



            <button type="submit" class="btn btn-primary me-2">save</button>
            <a href="{{ route('user.pmb.index')}}" type="reset" class="btn btn-danger">cancel</a>
        </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tglKembaliInput = document.getElementById('tgl_kembali');
        if (!tglKembaliInput.value) {
            const today = new Date().toISOString().split('T')[0];
            tglKembaliInput.value = today;
        }
    });
</script>

@endsection
