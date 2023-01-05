@extends('layout_frontend.app')
@section('content')

    <!-- Banner -->
    <div class="col-lg-12 col-md-12 px-0">
        <div id="carouselExampleControls" class="carousel slide mb-3" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="http://wonosegorokec.boyolali.go.id/files/slider/thumb/1140_450-1616465481-image.jpeg"
                        style="width: 100%; height: 500px" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="http://boyolali.go.id/files/slider/thumb/1140_450-1642406437-wakil.jpg"
                        style="width: 100%; height: 500px" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100"
                        src="http://boyolali.go.id/files/slider/thumb/1140_450-1657598810-RRTT%20thtjtj.jpg"
                        style="width: 100%; height: 500px" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>



    <!-- Berita -->
    <div class="row mb-3">
        <div class="col-12 badge text-bg-dark">
            <h4 class="fw-semibold ">Artikel Terkini</h4>
            <hr size="20px" color="blue" >
        </div>

        @foreach ($news as $item)
        <div class="col-md-4 mt-4">
            <div class="card">
                <img class="card-img-top" src="https://www.kemendesa.go.id/berita/assets/images/artikel/Menteri_Desa_PDTT_22-12-2022_1.jpg"
                    alt="Card image cap">
                <div class="card-body">
                    <small>{{ $item->category->name }}</small>
                    <h5 class="card-title">{{ $item->title }}</h5>
                    <p class="card-text">{{ Str::limit($item->content, 10) }}.</p>
                    <a href="{{ route('beritaView', $item->id) }}" class="btn btn-primary">Comments</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
