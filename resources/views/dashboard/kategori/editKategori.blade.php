@extends('layouts.main')

@section('content')
    <section class="courses">
        <h2>Tambah Kategori</h2>
        <div class="container">
          <div class="bgForm">
            <form action="/dataKategori/{{ $categories->id }}" method="POST">
                @method('put')
                @csrf
                <label for="name">Nama Kategori :</label>
                <input type="text" id="name" class="inpt" name="name" value="{{ old('name', $categories->name) }}" required>
                <br><br>
                <center>
                    <button class="btn" type="submit">Edit</button>
                </center>
            </form>
          </div>
        </div>
    </section>
@endsection