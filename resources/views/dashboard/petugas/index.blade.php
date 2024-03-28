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
        <h2>Data Petugas</h2>
        <center>
            <form action="/dataPetugas" method="GET">
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
          <a href="/tambahPetugas" class="tambahBuku"><button>Tambah Petugas</button></a>
          <ul class="responsive-table">
            <li class="table-header">
              <div class="col col-1">No</div>
              <div class="col col-2">Nama Petugas</div>
              <div class="col col-3">Email</div>
              <div class="col col-4">Opsi</div>
            </li>
            @foreach ($officers as $officer)
              <li class="table-row">
                <div class="col col-1" data-label="Job Id">42235</div>
                <div class="col col-2" data-label="Customer Name">{{ $officer->name }}</div>
                <div class="col col-3" data-label="Customer Name">{{ $officer->email }}</div>
                <div class="col col-4" data-label="Payment Status">
                  <form action="/dataPetugas/{{ $officer->id }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="detail-pinjaman-hapus">Hapus</button>
                  </form>
                </div>
              </li>
            @endforeach
          </ul>
        </div>
    </section>
@endsection