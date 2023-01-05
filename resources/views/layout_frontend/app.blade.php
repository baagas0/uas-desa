<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


    <title>Karangjati</title>
    @yield('css')
</head>

<body>

    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <div class="d-flex flex-row align-items-center mt-auto">
                    <img src="http://wonosegorokec.boyolali.go.id/files/setting/thumb/190_115-logo.png" alt=""
                        width="50">
                    <div class="px-3">
                        <h5 class="mb-0">Website Desa Karangajati</h5>
                        <p>Wonosegoro Boyolali</p>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item active">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/tentang">Tentang</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/berita">Berita</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/vidio">Video</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/galleri">Galeri</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Produk UMKM</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pengaduan">Pengaduan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/kontak">Kontak</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>

                </ul>
            </div>
        </nav>

        @yield('content')

        <!-- Footer -->
        <div class="footer">
            {{-- <div class="d-flex flex-row align-items-start justify-content-between bg-dark text-white p-4"> --}}
            <div class="row  bg-secondary text-white p-4">
                <div class="col-md-4">
                    <h4>Desa Karangjati</h4>
                    <p class="">Dusun III, Desa Karangjati, Kecamatan Wonosegoro, Kabupaten Boyolali, Provinsi
                        Jawa Tengah Kode Pos 57382</p>
                    <p class="mb-0">diskominfo@boyolali.go.id</p>
                    <p class="mb-0">Telp: (0276) 320009 </p>
                </div>
                <div class="col-md-3">
                    <h4>KATEGORI</h4>
                    <div>
                        <span class="badge badge-xl badge-dark">Beranda</span>
                        <span class="badge badge-xl badge-dark">Berita</span>
                        <span class="badge badge-xl badge-dark">Video</span>
                        <span class="badge badge-xl badge-dark">Galeri</span>
                        <span class="badge badge-xl badge-dark">Pengaduan</span>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        <div class="footer-bottom">
            <div class="row bg-dark text-light p-1">
                <p class="col-md-12">Desa Karangjati Copyright © 2023 Wonosegoro - All rights reserved || Designed By : Talista 14495 </p>
            </div>
        </div>
    </div>

</body>

</html>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/21718162e0.js" crossorigin="anonymous"> </script>
@yield('js')
