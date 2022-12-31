@extends('layouts.app')
@section('page_title', 'Pengguna')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Pengguna</h4>
                    <button type="button" class="create btn btn-info mb-3 float-right"data-toggle="modal"
                        data-target="#formModal" data-whatever="@mdo">
                        <i class=" fas fa-plus"></i> Tambah Data
                    </button>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nama</th>
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
                    <h4 class="modal-title" id="exampleModalLabel1">Form Category News-category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST" action="{{ route('news-category.store') }}">
                        <div class="form-group" field="name">
                            <label for="name" class="control-label">Nama:</label>
                            <input type="text" class="form-control" id="name" name="name">
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
    <script src="{{ asset('libs/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('libs/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('dist/js/pages/forms/select2/select2.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            window.page_url = window.base_url + `news-category`;
            window.form = $('#form');
            window.serialize = form.serializeArray();
            // widow.serialize

            console.log(window.serialize);

            window.table = $('#table').DataTable({
                stateSave: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: `{{ route('news-category.data') }}`,
                    type: 'GET',
                },
                columns: [{
                        data: 'name'
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
