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
        <h2>Data Kategori</h2>
        <center>
          <form action="/dataKategori" method="GET">
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
          <a href="/tambahKategori" class="tambahBuku"><button>Tambah Kategori</button></a>
          <ul class="responsive-table">
            <li class="table-header">
              <div class="col col-1">No</div>
              <div class="col col-2">Nama Kategori</div>
              <div class="col col-3">Opsi</div>
            </li>
            @foreach ($categories as $category)
              <li class="table-row">
                <div class="col col-1" data-label="Job Id">42235</div>
                <div class="col col-2" data-label="Customer Name">{{ $category->name }}</div>
                <div class="col col-4" data-label="Payment Status" style="display: flex; justify-content: space-between;">
                  <form action="/dataKategori/{{ $category->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="detail-pinjaman-hapus">Hapus</button>
                  </form>
                  <a href="/dataKategori/{{ $category->id }}/edit" class="detail-pinjaman">Edit</a>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
    </section>
@endsection