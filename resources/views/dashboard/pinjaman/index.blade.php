@extends('layouts.main')

@section('content')
    <section class="courses">
        <h2>Data Pinjaman</h2>
        <center>
            <div class="search-container">
                <input type="text" class="search-input" placeholder="Cari...">
                <button type="submit" class="search-button">
                  <i class="fa fa-search"></i>
                </button>
            </div>
        </center>
        <br><br>
        <div class="container">
          <ul class="responsive-table">
            <li class="table-header">
              <div class="col col-1">No</div>
              <div class="col col-2">Nama Peminjam</div>
              <div class="col col-2">Judul Buku</div>
              <div class="col col-2">Status</div>
              <div class="col col-3">Opsi</div>
            </li>

            @foreach ($peminjams as $peminjam)
              <li class="table-row">
                <div class="col col-1" data-label="Job Id">42235</div>
                <div class="col col-2" data-label="Customer Name">{{ $peminjam->user->name }}</div>
                <div class="col col-2" data-label="Customer Name">{{ $peminjam->book->judul }}</div>
                <div class="col col-2" data-label="Customer Name">{{ $peminjam->status_peminjaman }}</div>
                @if ($peminjam->status_peminjaman === "terpinjam")
                  <div class="col col-4" data-label="Payment Status">
                    <a href="/detailPinjaman/{{ $peminjam->id }}" target="_blank"><button class="detail-pinjaman">Nota</button></a>
                  </div>
                @else
                  <div class="col col-4" data-label="Payment Status">
                    <form action="/detailPinjaman/{{ $peminjam->id }}" method="POST">
                      @method('DELETE')
                      @csrf
                      <button type="submit" class="detail-pinjaman-hapus">Batalkan</button>
                    </form>
                  </div>
                @endif
              </li>
            @endforeach

          </ul>
        </div>
    </section>
@endsection