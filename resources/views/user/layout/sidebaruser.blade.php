<div class="sidebar">
    <div class="header">
        <div class="list-item">
            <a href="">
                <img src="" alt="" class="icon">
                <span class="description-header">Peminjaman Barang</span>
            </a>
        </div>
    </div>
    <div class="illustration">
        <img src="{{ asset('image/barang-removebg-preview.png')}}" alt="" width="80%">
    </div><hr>
    <div class="main-content">
        <div class="list-item">
            <a href="{{ route('user.utama.index')}}">
                <i class="bi bi-speedometer2 i1"></i>
                <span class="description">Dashboard</span>
            </a>
        </div><hr>
        <div class="list-item">
            <a href="{{ route('user.daftar.index')}}">
                <i class="bi bi-speedometer2 i1"></i>
                <span class="description"> Daftar Barang</span>
            </a>
        </div><hr>
        <div class="list-item">
            <a href="{{ route('user.pmj.index')}}">
                <i class="bi bi-speedometer2 i1"></i>
                <span class="description"> Peminjaman</span>
            </a>
        </div><hr>
        <div class="list-item">
            <a href="{{ route('user.pmb.index')}}">
                <i class="bi bi-speedometer2 i1"></i>
                <span class="description"> Pengembalian</span>
            </a>
        </div><hr>

        <div class="list-item">
            <a href="{{ route('user.riwayat.index')}}">
                <i class="bi bi-speedometer2 i1"></i>
                <span class="description"> Riwayat</span>
            </a>
        </div><hr>

        <div class="list-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" style="border: none; background: none; color: inherit; cursor: pointer;">
                    <i class="bi bi-speedometer2 i1"></i>
                    <span class="description">Logout</span>
                </button>
            </form>
        </div>
        <hr>
        <hr>

    </div>
</div>
