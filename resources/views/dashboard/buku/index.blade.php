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
        <h2>Data Buku</h2>
        <center>
          <form action="/dataBuku" method="GET">
            <div class="search-container">
                <input type="text" name="keyword" class="search-input" placeholder="Cari..." value="{{ request('keyword') ?? old('keyword') }}">
                <button type="submit" class="search-button">
                  <i class="fa fa-search"></i>
                </button>
            </div>
          </form>
        </center>
        <br><br>
        <div class="container">
          <a href="/tambahBuku" class="tambahBuku"><button>Tambah Buku</button></a>
          <ul class="responsive-table">
            <li class="table-header">
              <div class="col col-1">No</div>
              <div class="col col-2">Nama Buku</div>
              <div class="col col-3">Penulis</div>
              <div class="col col-4">Kategori</div>
              <div class="col col-4">Opsi</div>
            </li>
            @foreach ($books as $book)
              <li class="table-row">
                <div class="col col-1" data-label="Job Id">42235</div>
                <div class="col col-2" data-label="Customer Name">{{ $book->judul }}</div>
                <div class="col col-3" data-label="Amount">{{ $book->penulis }}</div>
                <div class="col col-4" data-label="Payment Status">{{ $book->category->name }}</div>
                <div class="col col-4" data-label="Payment Status" style="display: flex; justify-content: space-between;">
                  <form action="/dataBuku/{{ $book->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="detail-pinjaman-hapus">Hapus</button>
                  </form>
                  <a href="/dataBuku/{{ $book->id }}/edit" class="detail-pinjaman">Edit</a>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
    </section>
@endsection