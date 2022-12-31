@extends('layouts.app')
@section('page_title', 'Berita')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Berita</h4>
                    <button type="button" class="create btn btn-info mb-3 float-right"data-toggle="modal"
                        data-target="#formModal" data-whatever="@mdo">
                        <i class=" fas fa-plus"></i> Tambah Data
                    </button>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Kontent</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Kategori</th>
                                    <th>Judul</th>
                                    <th>Kontent</th>
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
                    <h4 class="modal-title" id="exampleModalLabel1">Form Category News</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="form" method="POST" action="{{ route('news.store') }}">
                    <div class="form-group" field="news_category_id">
                            <label for="news_category_id" class="control-label">Kategori:</label>
                            <select class="select2 form-control" id="news_category_id" name="news_category_id"
                                style="height: 36px;width: 100%;">
                                <option value="" selected>Pilih</option>
                                @foreach ($news_category as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <div class="error text-danger"></div>
                        </div>
                        <div class="form-group" field="title">
                            <label for="title" class="control-label">Judul:</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <div class="error text-danger"></div>
                        </div>
                        <div class="form-group" field="content">
                            <label for="content" class="control-label">Konten:</label>
                            <!-- <textarea class="form-control" name="content" id="content" cols="2" rows="5"></textarea> -->
                            <input type="text" class="form-control" id="content" name="content">
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
            window.page_url = window.base_url + `news`;
            window.form = $('#form');
            window.serialize = form.serializeArray();
            // widow.serialize

            console.log(window.serialize);

            window.table = $('#table').DataTable({
                stateSave: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url: `{{ route('news.data') }}`,
                    type: 'GET',
                },
                columns: [
                    {
                        data: 'news_category_id',
                        render: function(value, row, data) {
                            return data.category.name;
                        }
                    },
                    {
                        data: 'title'
                    },
                    {
                        data: 'content'
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
