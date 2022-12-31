<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <div class="d-flex flex-row align-items-center mt-auto">
                    <img src="https://sekartaji.desa.id/desa/logo/logo_desa_sekartaji__sid__hgk8Ezw.jpg" alt="" width="50">
                    <div class="px-3">
                        <h5 class="mb-0">Desa Sekartaji</h5>
                        <p>asdasd</p>
                    </div>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                    <a class="nav-link" href="/vidio">Vidio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/galleri">Galleri</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/pengaduan">Pengaduan</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/kontak">Kontak</a>
                </li>

              </ul>
            </div>
        </nav>

        @yield('content')

        <!-- Footer -->
        <div class="footer">
            {{-- <div class="d-flex flex-row align-items-start justify-content-between bg-dark text-white p-4"> --}}
            <div class="row  bg-dark text-white p-4">
                <div class="col-md-4">
                    <h4>Desa Sekartaji</h4>
                    <p class="">Banjar Dinas Sekartaji, Desa Sekartaji, Nusa Penida Kecamatan Nusa Penida Kabupaten Klungkung Provinsi Bali Kode Pos 80771</p>
                    <p class="mb-0">Email: info@sekartaji.desa.id</p>
                    <p class="mb-0">Telp: 081xxxxxx</p>
                </div>
                <div class="col-md-3">
                    <h4>KATEGORI</h4>
                    <div>
                        <span class="badge badge-xl badge-secondary">Beranda</span>
                        <span class="badge badge-xl badge-secondary">Berita</span>
                        <span class="badge badge-xl badge-secondary">Vidio</span>
                        <span class="badge badge-xl badge-secondary">Galleri</span>
                        <span class="badge badge-xl badge-secondary">Pengaduan</span>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
    </div>

  </body>
</html>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>