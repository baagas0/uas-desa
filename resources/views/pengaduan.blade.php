@extends('layout_frontend.app')
@section('content')
<div class="row my-3">
    <div class="col-12 text-center my-3">
        <h3>Pengaduan</h3>
    </div>
    
    <div class="col-10">
        
        <form action="{{ route('addPengaduan') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <p>Nama</p>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <p>Subjek</p>
                        <input type="text" name="subject" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <p>Pesan</p>
                        <textarea name="content" id="" cols="5" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Kirim Pengaduan</button>
                </div>
            </div>
            
        </form>
    </div>

    <div class="col-12 my-3">
        <h5>Daftar Pengaduan</h5>
    </div>
    @foreach ($complaints as $item)
    <div class="col-12 my-2">
        <small>{{ $item->name }}</small>
        <h5 class="mb-0">{{ $item->subject }}</h5>
        <p>{{ $item->content }}</p>
        <hr>
    </div>    
    @endforeach
    
    
</div>
@endsection