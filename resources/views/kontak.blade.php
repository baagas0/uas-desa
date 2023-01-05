@extends('layout_frontend.app')
@section('content')
    <!-- Zawiyah Start -->
    <div class="col-12 text-center my-3">
        <h3>Contact Us</h3>
    </div>
    <section>
        <div>

            <div class="mb-3">
                <iframe style="border:0; width: 100%; height: 350px;"
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31658.515510666337!2d110.62412478741832!3d-7.3185317915082795!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a75bf2cf8ff23%3A0xd83d5a9b8610b89b!2sKantor%20Desa%20Karangjati!5e0!3m2!1sid!2sid!4v1672634435932!5m2!1sid!2sid"
                    frameborder="0" allowfullscreen></iframe>
            </div><!-- End Google Maps -->

            {{-- bru --}}
            <div class="col-12 row text-justify">
                <div class="col-lg-8 col-md-8">
                    <div>
                        <h4>Our Address</h4>
                        <p><i class="fa-sharp fa-solid fa-map-pin fa-lg"></i>
                            Dusun III, Karangjati, Kec. Wonosegoro, Kabupaten Boyolali, Jawa Tengah 57382</p>
                    </div>

                    <div>
                        <h4>Email Us</h4>
                        <p><i class="fa-solid fa-envelope fa-lg"></i>
                            ppid@boyolali.go.id</p>
                    </div>

                    <div>
                        <h4>Call Us</h4>
                        <p> <i class="fa-sharp fa-solid fa-phone fa-lg"></i>
                            (024) 3517261</p>
                    </div>

                    <div class="mb-4">
                        <h4>Opening Hours</h4>
                        <strong> <i class="fa-solid fa-clock fa-lg"></i>
                            Senin - Jum'at : </strong>08.00 - 16.00
                        <strong>Sabtu - Minggu:</strong> Tutup
                    </div>


                </div>

                <div class="col-lg-4 col-md-4">

                    <div>
                        <a href="https://web.facebook.com/people/Pemkab-Boyolali/100069280776748/"> <i
                                class="fa-brands fa-facebook fa-3x p-1"> </i>
                            {{-- <p>Facebook</p> --}}
                        </a>
                        <a href="https://www.instagram.com/pemkab_boyolali/"> <i
                                class="fa-3x fa-brands fa-instagram p-1"></i>
                        </a>

                        <a href="https://www.youtube.com/channel/UCKGBzlZWkFYzb6nlN7MfvJA"> <i
                                class="fa-3x fa-brands fa-youtube p-1"></i>
                        </a>

                        <a href="https://twitter.com/pemkab_boyolali"> <i class="fa-3x fa-brands fa-twitter p-1"></i>
                        </a>
                    </div>


                </div>

                <!--End Contact Form -->

            </div>
    </section>
@endsection
