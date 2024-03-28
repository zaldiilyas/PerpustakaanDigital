<!-- Navbar Page Start -->
<nav>
    <div class="container nav__container">
        <h4>E-Library</h4>
        <ul class="nav__menu">
            <li><a href="/">Home</a></li>
            <li><a href="/book">Book</a></li>
            <li><a href="/categories">Category</a></li>
            {{-- <li><a href="contact.html">Contact</a></li> --}}
        </ul>
        @auth
        <div class="dropdown">
            <a href="#" class="dropbtn">Menu <i class='bx bx-caret-down'></i></a>
            <div class="dropdown-content">
                @if(auth()->user()->level === 'admin')
                    <a href="/dataBuku">Data Buku</a>
                    <a href="/dataKategori">Data Kategori</a>
                    <a href="/konfirmasiPinjaman">Konfirmasi</a>
                    <a href="/dataPetugas">Data Petugas</a>
                @elseif(auth()->user()->level === 'petugas')
                    <a href="/dataBuku">Data Buku</a>
                    <a href="/dataKategori">Data Kategori</a>
                    <a href="/konfirmasiPinjaman">Konfirmasi</a>
                @else
                    <a href="/dataPinjaman">Data Pinjaman</a>
                @endif
            
                @auth
                    <a href="/logout">Logout</a>
                @endauth
            </div>            
        </div>
        
        @else
            <ul class="nav__menu">
                <li><a href="/login">Login</a></li>
            </ul>
        @endauth
        <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
        <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>
    </div>
</nav>
<!-- Navbar Page End -->