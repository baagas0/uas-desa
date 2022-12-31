<?php

namespace App\Http\Controllers;

use App\Helpers\General;
use App\Models\Role;
use App\Models\RoleAccess;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

// use Illuminate\Validation\Validator;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $allow_roles = [1, 7]; // Admin & Kepala cabang
            $allowed = General::check($allow_roles);
            if ($allowed == false) {
                Redirect::to('home')->send();
            } else {
                return $next($request);
            }
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.main');
    }

    /**
     * Display profile
     */
    public function me()
    {
        return view('users.me');
    }

    /**
     * List of resource data
     */
    public function data(Request $request)
    {
        $search = $request->search['value'];

        $data = User::when($search, function ($q, $search) {
            return $q->where('name', 'like', "%$search%");
        })->skip($request->start)->take($request->length)->get();

        return [
            "draw" => $request->draw,
            "recordsFiltered" => User::count(),
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|max:255',
            'roles' => 'required|array',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $resource = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $role_pivot = [];
        foreach ($request->roles as $key => $role_id) {
            if ($role_id) {
                array_push($role_pivot, [
                    'user_id' => $resource->id,
                    'role_id' => $role_id
                ]);
            }
        }
        $roles = RoleAccess::insert($role_pivot);

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
            'email' => "required|unique:users,email,{$id}|email",
            'password' => 'max:255',
            'roles' => 'required|array',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $resource = User::find($id)->update($data);

        $role_pivot = [];
        foreach ($request->roles as $key => $role_id) {
            if ($role_id) {
                array_push($role_pivot, [
                    'user_id' => $id,
                    'role_id' => $role_id
                ]);
            }
        }

        RoleAccess::whereUserId($id)->delete();
        $roles = RoleAccess::insert($role_pivot);

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
        User::find($id)->delete();
        return true;
    }
}
