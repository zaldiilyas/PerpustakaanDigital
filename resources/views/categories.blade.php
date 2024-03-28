@extends('layouts.main')

@section('content')
    <section class="courses">
        <h2>Kategori Buku E-Library</h2>
        <div class="container courses__container">

            @foreach ($categories as $category)
                <article class="course">
                    <div class="course__info">
                        <a href="#" class="btn btn-primary"><h4>{{ $category->name }}</h4></a>
                    </div>
                </article>
            @endforeach

        </div>
    </section>
@endsection