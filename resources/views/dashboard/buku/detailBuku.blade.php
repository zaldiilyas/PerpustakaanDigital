@extends('layouts.main')

@section('content')
    <section class="bgBuku">
        <h2>Detail Buku E-Library</h2>
        
        @if(session('error'))
            <script>
                alert('{{ session('error') }}');
            </script>
        @endif

        <article class="detailBuku">
            <div class="detail__image">
                <img src="/img/b1.png" alt="">
            </div>
            <div class="detail__content">
                @foreach ($books as $book)
                    <center>
                        <h4 >{{ $book->judul }}</h4>
                    </center>
                    <p>Penerbit : {{ $book->penerbit }}</p>
                    <br>
                    <p>{{ $book->isi }}</p>
                    <form action="/detailPinjaman" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="post_id" value="{{ $book->id }}">
                        <input type="hidden" name="keterangan" value="proses">
                        <button class="btnDetailPinjaman" type="submit">Pinjam</button>
                    </form>
                @endforeach
            </div>
        </article>
    </section>
@endsection