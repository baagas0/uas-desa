<?php

namespace App\Http\Controllers;

use App\Helpers\General;
use App\Models\RoleAccess;
use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
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
        $roles = Role::where('name', '!=', 'admin')->get();

        return view('employees.main', compact('roles'));
    }

    /**
     * List of resource data
     */
    public function data(Request $request)
    {
        $search = $request->search['value'];

        $data = Employee::when($search, function ($q, $search) {
            return $q->where('name', 'like', "%$search%");
        })->with('role')->skip($request->start)->take($request->length)->get();

        return [
            "draw" => $request->draw,
            "recordsFiltered" => Employee::count(),
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
            'nik' => 'required|max:255|unique:employees,nik',
            'name' => 'required|max:255',
            'birth_place' => 'required|max:255',
            'birth_date' => 'required|date',
            'phone' => 'required|max:15',
            'role_id' => 'required|exists:roles,id',
            // 'position' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $resource = Employee::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            // 'position' => $request->position,
        ]);

        $resource = User::create([
            'name' => $request->name,
            'email' => "{$request->nik}@gmail.com",
            'password' => bcrypt("default"),
        ]);

        $roles = RoleAccess::create([
            'user_id' => $resource->id,
            'role_id' => $request->role_id
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
            'nik' => "required|max:255|unique:employees,nik,{$id}",
            'name' => 'required|max:255',
            'birth_place' => 'required|max:255',
            'birth_date' => 'required|date',
            'phone' => 'required|max:15',
            // 'position' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json($validator->errors(), 400);
        }

        $data = [
            'nik' => $request->nik,
            'name' => $request->name,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'phone' => $request->phone,
            'role_id' => $request->role_id,
            // 'position' => $request->position,
        ];

        $resource = Employee::find($id)->update($data);

        $user = User::where('employee_id', $id)->first();
        $user_id = $user->id;

        $user->update([
            'name' => $request->name,
            'email' => "{$request->nik}@gmail.com",
            'password' => bcrypt("default"),
        ]);

        $roles = RoleAccess::where('user_id', $user_id)->update([
            'role_id' => $request->role_id
        ]);

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
        Employee::find($id)->delete();
        return true;
    }
}
