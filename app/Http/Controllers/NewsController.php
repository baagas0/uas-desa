<?php

namespace App\Http\Controllers;

use App\Helpers\General;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;


class NewsController extends Controller
{

    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_category = NewsCategory::get();
        return view('news.main', compact('news_category'));
    }

    /**
     * Display profile
     */
    public function me()
    {
        return view('news.me');
    }

    /**
     * List of resource data
     */
    public function data(Request $request)
    {
        $search = $request->search['value'];

        $data  = News::with('category')->when($search, function ($q, $search) {
            return $q->where('name', 'like', "%$search%");
        })->skip($request->start)->take($request->length)->get();

        return [
            "draw" => $request->draw,
            "recordsFiltered" => News::count(),
            "recordsTotal" => $request->length,
            "data" => $data
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'news_category_id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $resource = News::create([
            'news_category_id' => $request->news_category_id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return $resource;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'news_category_id' => 'required',
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $data = [
            'news_category_id' => $request->news_category_id,
            'title' => $request->title,
            'content' => $request->content,
        ];

        $resource = News::find($id)->update($data);

        return $resource;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::find($id)->delete();
        return true;
    }
}
