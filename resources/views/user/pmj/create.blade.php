@extends('user.layout.main')

@section('sip')
<div class="container mb-4 p-4 d-flex justify-content-center">
    <div class="card" style="width: 45rem;">
        <h5 class="card-header">TAMBAH BARANG</h5>
        <div class="card-body">
            <form action="{{ route('user.pmj.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                {{-- <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="text" name="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror">
                    @error('nama_peminjam')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="nama_peminjam" class="form-label">Nama Peminjam</label>
                    <input type="hidden" name="nama_peminjam" value="{{ Auth::user()->name }}" class="form-control">

                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                    @error('nama_peminjam')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>


                {{-- <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input type="text" name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror">
                    @error('kode_barang')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <select name="kode_barang" class="form-control @error('kode_barang') is-invalid @enderror">
                        <option value="">Pilih Kode Barang</option>
                        @foreach($barangs as $barang)
                            <option value="{{ $barang->kode_barang }}" {{ $barang->kode_barang === $barang->kode_barang ? 'selected' : 'kode_barang' }}>
                                {{ $barang->kode_barang }} - {{ $barang->nama_barang }} 
                            </option>
                        @endforeach
                    </select>
                    @error('kode_barang')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input type="number" name="jumlah" min="1" class="form-control @error('jumlah_barang') is-invalid @enderror">
                    @error('jumlah')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="mb-3">
                    <label for="tgl_kembali" class="form-label">status</label>
                    <input type="text" name="status" class="form-control @error('status') is-invalid @enderror">
                    @error('status')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div> --}}


                <div class="mb-3">
                    <label for="keperluan" class="form-label">keperluan</label>
                    <input type="text" name="keperluan" class="form-control @error('keperluan') is-invalid @enderror">
                    @error('keperluan')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tgl_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control @error('tgl_pinjam') is-invalid @enderror" value="{{ old('tgl_pinjam') }}" readonly>
                    @error('tgl_pinjam')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    {{-- <label for="tgl_pinjam" class="form-label">Tanggal kembali</label> --}}
                    <input type="hidden" name="tgl_kembali" id="tgl_kembali" class="form-control @error('tgl_kembali') is-invalid @enderror" value="{{ old('tgl_kembali') }}" >
                    @error('tgl_kembali')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary me-2">Save</button>
                <button type="reset" class="btn btn-danger">Cancel</button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('tgl_pinjam').value = today;
    });
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T');
        document.getElementById('tgl_kembali').value = today;
    });
</script>
@endsection
