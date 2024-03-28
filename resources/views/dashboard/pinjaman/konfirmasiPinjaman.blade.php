@extends('layouts.main')

@section('content')
    @if (session()->has('success'))
      <script>
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "{{ session('success') }}",
          showConfirmButton: false,
          timer: 1500
        });
      </script>
    @endif
    <section class="courses">
        <h2>Data Pinjaman</h2>
        <center>
            <div class="search-container">
                <form action="/konfirmasiPinjaman" method="GET">
                    <div class="input-group mb-3">
                      <input type="text" name="keyword" class="search-input" placeholder="Search..." value="{{ request('keyword') ?? old('keyword') }}">
                      <button class="search-button" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
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
                    <p>Terkonfirmasi</p>
                  </div>
                @else
                  <div class="col col-4" data-label="Payment Status">
                    <form action="/konfirmasiPinjaman/{{ $peminjam->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <button type="submit" class="detail-pinjaman">Confirm</button>
                    </form>
                  </div>
                @endif
              </li>
            @endforeach

          </ul>
        </div>
    </section>
@endsection