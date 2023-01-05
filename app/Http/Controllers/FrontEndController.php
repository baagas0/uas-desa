<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Complaint;
use App\Models\Gallery;
use App\Models\News;
use App\Models\ProductUmkm;
use App\Models\VidioActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class FrontEndController extends Controller
{
    public function index() {
        $news = News::orderBy('id', 'desc')->get();

        return view('index', compact('news'));
    }

    public function tentang() {
        return view('tentang');
    }

    public function berita() {
        $news = News::orderBy('id', 'desc')->get();

        return view('berita', compact('news'));
    }

    public function beritaView($id) {
        $news = News::find($id);
        $comments = Comment::where('news_id', $id)->orderBy('id', 'desc')->get();

        return view('berita-view', compact('news', 'comments'));
    }

    public function produk() {
        $produk = ProductUmkm::orderBy('id', 'desc')->get();

        return view('product-umkm', compact('produk'));
    }

    public function addComment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'news_id' => 'required|max:255',
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
            'content' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $resource = Comment::create([
            'news_id' => $request->news_id,
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    public function vidio() {
        $vidio = VidioActivity::orderBy('id', 'desc')->get();
        // dd($vidio);

        return view('vidio', compact('vidio'));
    }

    public function galleri() {
        $images = Gallery::orderBy('id', 'desc')->get();

        return view('galleri', compact('images'));
    }

    public function pengaduan() {
        $complaints = Complaint::orderBy('id', 'desc')->get();

        return view('pengaduan', compact('complaints'));
    }

    public function addPengaduan(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'subject' => 'required|max:255',
            'content' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $resource = Complaint::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'content' => $request->content,
        ]);

        return redirect()->back();
    }

    public function kontak() {
        return view('kontak');
    }

    public function login() {
        return view('login');
    }

}
