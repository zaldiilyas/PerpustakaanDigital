@extends('layouts.main')

@section('content')
    <section class="courses">
        <h2>Tambah Kategori</h2>
        <div class="container">
          <div class="bgForm">
            <form action="/tambahKategori" method="POST">
                @method('post')
                @csrf
                <label for="name">Nama Kategori :</label>
                <input type="text" id="name" class="inpt" name="name" required>
                <br><br>
                <center>
                    <button class="btn" type="submit">Tambah</button>
                </center>
            </form>
          </div>
        </div>
    </section>
@endsection