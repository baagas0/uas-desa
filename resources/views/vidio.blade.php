@extends('layout_frontend.app')
@section('content')
<div class="row my-3">
    <div class="col-12 text-center my-3">
        <h3>Video</h3>
    </div>
    
    @foreach ($vidio as $item)
        <div class="col-md-4 mt-4">
            <div class="card">
                <iframe class="card-img-top" width="560" height="315" src="https://www.youtube.com/embed/{{ $item->youtube_embed }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                {{-- <img class="card-img-top" src="https://sekartaji.desa.id/desa/upload/artikel/sedang_1667874375_4.jpg"
                    alt="Card image cap"> --}}
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                </div>
            </div>
        </div>
    @endforeach
    
</div>
@endsection