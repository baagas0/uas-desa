@extends('layout_frontend.app')
@section('content')
    <div class="row my-3">
        <div class="col-12 text-center my-3">
            <h3>Produk UMKM</h3>
        </div>

        @foreach ($produk as $item)
            <div class="col-md-4 mt-4">
                <div class="card">
                    <img class="card-img-top" src="{{ Storage::url($item->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <small>{{ $item->owner }} | {{ $item->phone_number }}</small>
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($item->price, 2) }}</p>
                        <a href="#" class="hubungi_penjual btn btn-primary"
                            data-image="{{ Storage::url($item->image) }}" data-owner="{{ $item->owner }}"
                            data-phone_number="{{ $item->phone_number }}">Hubungi Penjual</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.hubungi_penjual').on('click', function() {
                let e = $(this)[0];
                console.log(e.dataset);
                Swal.fire({
                    imageUrl: e.dataset.image,
                    // imageHeight: 1500,
                    // imageAlt: 'A tall image'
                    html: `Pemilik: ${e.dataset.owner}<br>No Telf: ${e.dataset.phone_number}`,
                })
            });
        });
    </script>
@endsection
