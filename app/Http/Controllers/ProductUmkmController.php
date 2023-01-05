<?php

namespace App\Http\Controllers;

use App\Models\ProductUmkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProductUmkmController extends Controller
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
        return view('product-umkm.main');
    }

    /**
     * List of resource data
     */
    public function data(Request $request)
    {
        $search = $request->search['value'];

        $data  = ProductUmkm::when($search, function ($q, $search) {
            return $q->where('name', 'like', "%$search%");
        })->skip($request->start)->take($request->length)->get();

        return [
            "draw" => $request->draw,
            "recordsFiltered" => ProductUmkm::count(),
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
            'image' => 'required|file',
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'owner' => 'required|max:255',
            'phone_number' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $photo = $request->file('image');
        // Generate a file name with extension
        $fileName = 'produk-umkm-' . time() . '.' . $photo->getClientOriginalExtension();
        // Save the file
        $public = 'public/';
        $photo_path = 'photo/'.$fileName;
        $path = $photo->storeAs($public . 'photo', $fileName);

        $resource = ProductUmkm::create([
            'image' => $photo_path,
            'name' => $request->name,
            'price' => $request->price,
            'owner' => $request->owner,
            'phone_number' => $request->phone_number,
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
            'name' => 'required|max:255',
            'price' => 'required|max:255',
            'owner' => 'required|max:255',
            'phone_number' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'owner' => $request->owner,
            'phone_number' => $request->phone_number,
        ];

        if($request->hasFile('image')) {
            $photo = $request->file('image');
            // Generate a file name with extension
            $fileName = 'produk-umkm-' . time() . '.' . $photo->getClientOriginalExtension();
            // Save the file
            $path = $photo->storeAs('public/photo', $fileName);

            $data['image'] = $path;
        }

        

        $resource = ProductUmkm::find($id)->update($data);

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
        ProductUmkm::find($id)->delete();
        return true;
    }
}

