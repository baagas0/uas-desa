@extends('layout_frontend.app')
@section('content')
<div class="row my-3">
    <div class="col-12 text-center my-3">
        <h3>Berita</h3>
    </div>

    <div class="col-4">
        <img class="" src="https://www.kemendesa.go.id/berita/assets/images/artikel/Menteri_Desa_PDTT_22-12-2022_1.jpg"
                style="width: 100%">
    </div>

    <div class="col-8">
        <small>{{ $news->category->name }}</small>
        <h5 class="card-title">{{ $news->title }}</h5>
        <p class="card-text">{{ Str::limit($news->content, 10) }}.</p>

        <h5>Komentar</h5>
        @foreach ($comments as $item)
        <p class="mb-0">Nama : {{ $item->name }}</p>
        <p class="mb-0">Subjek : {{ $item->subject }}</p>
        <p class="mb-0">Pesan : {{ $item->content }}</p>
        <hr>
        @endforeach
    </div>

    <div class="col-12 mt-3">
        <form action="{{ route('addComment') }}" method="post">
            @csrf
            <input type="text" name="news_id" value="{{ $news->id }}" hidden>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <p>Nama</p>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <p>Subjek</p>
                        <input type="text" class="form-control" name="subject">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <p>Pesan</p>
                        <textarea name="content" id="" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Kirim Komentar</button>
                </div>
            </div>
            
        </form>
    </div>
    
</div>
@endsection