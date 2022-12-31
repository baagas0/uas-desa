@extends('layouts.app')
@section('page', 'Profile Pengguna')
@section('content')
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="{{ asset('images/profile.png') }}" class="rounded-circle"
                            width="150" />
                        <h4 class="card-title m-t-10">{{ auth()->user()->name }}</h4>
                        <h6 class="card-subtitle">{{ auth()->user()->email }}</h6>
                    </center>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Tabs -->
                <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month"
                            role="tab" aria-controls="pills-setting" aria-selected="false">Update Profile</a>
                    </li>
                </ul>
                <!-- Tabs -->
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="previous-month" role="tabpanel"
                        aria-labelledby="pills-setting-tab">
                        <div class="card-body">
                            <form class="form-horizontal form-material" id="form" method="POST"
                                action="{{ route('users.update') }}/{{ auth()->user()->id }}">
                                @csrf
                                <div class="form-group">
                                    <label class="col-md-12">Nama</label>
                                    <div class="col-md-12">
                                        <input type="text" value="{{ auth()->user()->name }}"
                                            class="form-control form-control-line" name="name" id="name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" value="{{ auth()->user()->email }}"
                                            class="form-control form-control-line" name="email" id="email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Kata Sandi</label>
                                    <div class="col-md-12">
                                        <input type="password" class="form-control form-control-line" name="password" id="password">
                                        <small class="text-danger">*isi jika ingin mengganti</small>
                                    </div>
                                </div>

                                <div class="form-group" field="roles" hidden>
                                    <div class="col-sm-12">
                                        <label for="roles" class="control-label">Hak Akses:</label>
                                        <select class="select2 form-control" id="roles" name="roles[]"
                                            multiple="multiple" style="height: 36px;width: 100%;">
                                            @foreach (auth()->user()->roles as $role)
                                                <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="error text-danger"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success" type="button" id="submit">Update
                                            Profile</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('libs/select2/dist/css/select2.min.css') }}">
@endsection
@section('script')
    <script src="{{ asset('libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/forms/select2/select2.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.page_url = window.base_url + `users`;
            let form = $('#form');
            let serialize = form.serializeArray();


            $("#submit").on("click", function() {
                $.ajax({
                    type: form.attr("method"),
                    url: form.attr("action"),
                    data: form.serializeArray(),
                    success: function(res) {
                        $("#table").DataTable().ajax.reload();
                        $("#formModal").modal("hide");
                        toastr.success("Data berhasil disimpan", "Notifikasi");
                        window.location = '/users/me';
                    },
                    error: function(err) {
                        let res = err.responseJSON;
                        $(`.error`).empty();
                        setError(res);
                        toastr.error("Data tidak valid", "Notifikasi");
                    },
                });
            });

        })
    </script>

    {{-- <script src="{{ asset('dist/js/crud.js') }}"></script> --}}
@endsection
