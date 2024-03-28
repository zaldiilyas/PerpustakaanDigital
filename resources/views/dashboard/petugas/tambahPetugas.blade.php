@extends('layouts.main')

@section('content')
    <section class="courses">
        <h2>Tambah Petugas</h2>
        <div class="container">
          <div class="bgForm">
            <form action="/tambahPetugas" method="POST">
                @method('post')
                @csrf
                <label for="name">Nama :</label>
                <input type="text" id="name" class="inpt" name="name" required>
                <br><br>
                <label for="email">Email :</label>
                <input type="email" id="email" class="inpt" name="email" required>
                <br><br>
                <label for="password">Password :</label>
                <input type="password" id="password" class="inpt" name="password" required>
                <br><br>
                <center>
                    <button class="btn" type="submit">Tambah</button>
                </center>
            </form>
          </div>
        </div>
    </section>
@endsection