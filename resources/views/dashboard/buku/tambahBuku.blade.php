@extends('layouts.main')

@section('content')
    <section class="courses">
        <h2>Tambah Buku</h2>
        <div class="container">
          <div class="bgForm">
            <form action="/tambahBuku" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <label for="judul">Judul :</label>
                <input type="text" id="judul" class="inpt" name="judul" required>
                <br><br>
                <label for="categories">Categories :</label>
                <select id="category_id" class="inpt" name="categories_id">
                  @foreach ($categories as $category)
                      @if (old('category_id') == $category->id)
                          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                      @else
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endif
                  @endforeach
                </select>
                <br><br>
                <label for="penulis">Penulis :</label>
                <input type="text" id="penulis" class="inpt" name="penulis" required>
                <br><br>
                <label for="penerbit">Penerbit :</label>
                <input type="text" id="penerbit" class="inpt" name="penerbit" required>
                <br><br>
                <label for="tahunTerbit">Tahun Terbit :</label>
                <input type="text" id="tahunTerbit" class="inpt" name="tahunTerbit" required>
                <br><br>
                <label for="image">Foto Buku :</label>
                <input type="file" id="image" class="inpt" name="image" required>
                <br><br>
                <label for="isi">Isi :</label>
                <textarea name="isi" id="isi" cols="30" rows="10" class="inpt" required></textarea>
                <br><br>
                <center>
                    <button class="btn" type="submit">Tambah</button>
                </center>
            </form>
          </div>
        </div>
    </section>
@endsection