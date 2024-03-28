@extends('layouts.main')

@section('content')
    <section class="courses">
        <h2>Koleksi Buku E-Library</h2>
        <center>
            <form action="/book" method="GET">
                <div class="search-container">
                    <input type="text" name="keyword" class="search-input" placeholder="Cari..." value="{{ request('keyword') ?? old('keyword') }}">
                    <button type="submit" class="search-button">
                      <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </center>
        <br><br>
        <div class="container courses__container">

            @foreach ($books as $book)
                <article class="course">
                    <div class="course__image">
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Buku">
                    </div>
                    <div class="course__info">
                        <h4>{{ $book->judul }}</h4>
                        <p>{{ $book->isi }}</p>
                        <a href="/detailBuku/{{ $book->id }}" class="btn btn-primary">Lihat</a>
                    </div>
                </article>
            @endforeach

        </div>
    </section>
@endsection