@extends('layouts.app')
@section('page_title', 'Karyawan')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Karyawan</h4>
                    <button type="button" class="create btn btn-info mb-3 float-right"data-toggle="modal"
                        data-target="#formModal" data-whatever="@mdo">
                        <i class=" fas fa-plus"></i> Tambah Data
                    </button>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Telepon</th>
                                    <th>Jabatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel1">Form Penilaian</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST" action="{{ route('users.store') }}">
                        <div class="form-group" field="nik">
                            <label for="nik" class="control-label">NIK:</label>
                            <input type="text" class="form-control" id="nik" name="nik">
                            <div class="error text-danger"></div>
                        </div>
                        <div class="form-group" field="name">
                            <label for="name" class="control-label">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name">
                            <div class="error text-danger"></div>
                        </div>
                        <div class="form-group" field="birth_place">
                            <label for="birth_place" class="control-label">Tempat Lahir:</label>
                            <input class="form-control" id="birth_place" name="birth_place">
                            <div class="error text-danger"></div>
                        </div>
                        <div class="form-group" field="birth_date">
                            <label for="birth_date" class="control-label">Tanggal Lahir:</label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date">
                            <div class="error text-danger"></div>
                        </div>
                        <div class="form-group" field="phone">
                            <label for="phone" class="control-label">Telepon:</label>
                            <input type="number" class="form-control" id="phone" name="phone">
                            <div class="error text-danger"></div>
                        </div>
                        <div class="form-group" field="role_id">
                            <label for="role_id" class="control-label">Jabatan:</label>
                            <select class="select2 form-control" id="role_id" name="role_id"
                                style="height: 36px; width: 100%">
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <div class="error text-danger"></div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/select2/dist/css/select2.min.css') }}">
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment-with-locales.min.js"
        integrity="sha512-42PE0rd+wZ2hNXftlM78BSehIGzezNeQuzihiBCvUEB3CVxHvsShF86wBWwQORNxNINlBPuq7rG4WWhNiTVHFg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/forms/select2/select2.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.page_url = window.base_url + `employees`;
            window.form = $('#form');
            window.serialize = form.serializeArray();

            console.log(window.serialize);

            window.table = $('#table').DataTable({
                stateSave: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: `{{ route('employees.data') }}`,
                    type: 'GET',
                },
                columns: [{
                        data: 'nik'
                    },
                    {
                        data: 'name'
                    },
                    {
                        data: 'birth_place'
                    },
                    {
                        data: 'birth_date',
                        render: function(value, row, data) {
                            return moment(value).locale('id').format('LL');
                        }
                    },
                    {
                        data: 'phone'
                    },
                    {
                        data: 'position',
                        render: function(value, row, data) {
                            if (!data.role?.name) {
                                return '-';
                            }

                            return data.role.name;
                        }
                    },

                    {
                        data: 'id',
                        render: function(value, row, data) {
                            return `
                            <button type="button" class="btn btn-primary update"><i class=" fas fa-pencil-alt"></i> Edit</button>
                            <button type="button" class="btn btn-danger delete"><i class=" fas fa-trash"></i></button>
                            `;
                        }
                    }

                ],
            });
        })
    </script>

    <script src="{{ asset('dist/js/crud.js') }}"></script>
@endsection
