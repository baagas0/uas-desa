@extends('layout_frontend.app')
@section('content')
<div class="row my-3">
    <div class="col-12 text-center my-3">
        <h3>Berita</h3>
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