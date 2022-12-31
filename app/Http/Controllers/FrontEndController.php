<?php

namespace App\Http\Controllers;

class FrontEndController extends Controller
{
    public function index() {
        return view('index');
    }

    public function tentang() {
        return view('tentang');
    }

    public function berita() {
        return view('berita');
    }

    public function vidio() {
        return view('vidio');
    }

    public function galleri() {
        return view('galleri');
    }

    public function pengaduan() {
        return view('pengaduan');
    }

    public function kontak() {
        return view('kontak');
    }

}
