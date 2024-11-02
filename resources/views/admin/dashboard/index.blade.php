@extends('admin.layout1.main')

@section('content')

  <div class="main">
<!-- card peminjam -->
<div class="card-container p-4">
  <div class="c2 cc card">
    <div class="card-body">
      Barang
    </div>
  </div>
  <div class="c3 cc card">
    <div class="card-body">
      Di Pinjam
    </div>
  </div>
  <div class="c4 cc card">
      <div class="card-body">
        Di kembalikan
      </div>
    </div>
    <div class="c5 cc card">
      <div class="card-body">
        User
      </div>
    </div>
</div>
<!-- end card -->

<!-- card tabel -->
 <div class="container p-4">
  <div class="c6 card">
      <div class="card-body">
          <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">status</th>
                  <th scope="col">email</th>
                  <th scope="col">role</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->status }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
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
