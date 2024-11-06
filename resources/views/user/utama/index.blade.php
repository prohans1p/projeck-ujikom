

@extends('user.layout.main')

@section('sip')

  <div class="main">
<!-- card peminjam -->
<div class="card-container p-4">
  <div class="c2 cc card">
    <div class="card-body">
      Barang
      <p class="card-text">{{$totalbarang}}</p>
    </div>
  </div>
  <div class="c3 cc card">
    <div class="card-body">
      Di Pinjam
      <p class="card-text">{{$totalpinjam}}</p>
    </div>
  </div>
  <div class="c4 cc card">
      <div class="card-body">
        Di kembalikan
        <p class="card-text">{{$totalkembali}}</p>
      </div>
    </div>
    {{-- <div class="c5 cc card">
      <div class="card-body">
        User
      </div>
    </div> --}}
</div>
<!-- end card -->

<!-- card tabel -->
 <div class="container p-4">
  <div class="c6 card">
      <div class="card-body">
        <H5 class="container p-2 text-center">DAFTAR BARANG</H5>
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">image</th>
                  <th scope="col">Kode barang</th>
                  <th scope="col">Nama barang</th>
                  <th scope="col">Kategori</th>
                  <th scope="col">Merk</th>
                  <th scope="col">Jumlah</th>
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
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori }}</td>
                    <td>{{ $barang->merk }}</td>
                    <td>{{ $barang->jumlah }}</td>

                </tr>
                @empty

                @endforelse
                </tbody>
            </table>
      </div>
    </div>
 </div>
<!-- end card -->

@endsection
