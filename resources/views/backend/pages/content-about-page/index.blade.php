@extends('backend.layouts.app')

@section('title')
    About Pages
@endsection

@section('page-breadcumb')
    About Pages Content
@endsection

@section('page-section')
    Data
@endsection

@section('after-main-style')
    <link rel="stylesheet" href="{{ asset('argon/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('argon/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('argon/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}" />
@endsection

@section('content')
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3 class="mb-0">About Pages Content</h3>
                <button type="button" class="btn btn-primary" id="btn-add-modal" data-toggle="modal"
                    data-target="#createModal">Add
                    Content</button>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Slug</th>
                            <th>Section</th>
                            <th>Language</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Content About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-control-label">
                            Section
                        </label>
                        <select name="addSection" id="addSection" class="form-control text-dark">
                            <option value="">-- Select Sections --</option>
                            @foreach ($about_pages as $about_page)
                                <option value="{{ $about_page->id }}">{{ $about_page->section }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">
                            Language
                        </label>
                        <select name="addLang" id="addLang" class="form-control text-dark">
                            <option value="">-- Select Languages --</option>
                            @foreach ($langs as $lang)
                                <option value="{{ $lang->id }}">{{ $lang->language }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">
                            Title
                        </label>
                        <input type="text" class="form-control text-dark" name="addTitle" id="addTitle">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-control-label">
                            Content
                        </label>
                        <textarea name="addContent" id="addContent" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-save-add">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Page</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="" class="form-control-label">
                            Page Name
                        </label>
                        <input type="hidden" name="editId" id="editId">
                        <input type="text" class="form-control text-dark" name="editPage" id="editPage">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-save-edit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-main-script')
    <script src="{{ asset('argon/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('argon/assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                ajax: "{{ route('backend.about.content.index') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1
                        }
                    },
                    {
                        data: "content_about_slug",
                        name: "content_about_slug"
                    },
                    {
                        data: "section",
                        nama: "section"
                    },
                    {
                        data: "language",
                        nama: "language"
                    },
                    {
                        data: "title",
                        render: function(data, type, row, meta) {
                            var result = data == null ? '-' : data;
                            return result;
                        }
                    },
                    {
                        data: "content",
                        render: function(data, type, row, meta) {
                            return data.substr(0, 20) + ". . . . .";
                        }
                    },
                    {
                        data: "content_about_id",
                        render: function(data, type, row, meta) {
                            let html = "<button class='btn btn-success btn-edit' data-id='" +
                                data +
                                "'>Edit</button>";

                            html += "<button class='btn btn-danger btn-delete' data-id='" +
                                data +
                                "'>Delete</button>";
                            return html;
                        }
                    }
                ]
            });

            $('#btn-add-modal').click(function(e) {
                $('#addLang').val("");
                $('#addSection').val("");
                $('#addTitle').val("");
                $('#addContent').val("");
            });

            $('#btn-save-add').click(function(e) {
                var lang = $('#addLang').val();
                var section = $('#addSection').val();
                var title = $('#addTitle').val();
                var content = $('#addContent').val();
                if (lang == "" || section == "" || content == "") {
                    $('#createModal').modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: "Warning",
                        text: "Please fill the field",
                        timer: 3000
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('backend.about.content.store') }}",
                        data: {
                            'lang_id': lang,
                            'about_page_id': section,
                            'title': title,
                            'content': content,
                            '_token': "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(resp) {
                            $('#createModal').modal('hide');
                            if (resp.code == 200) {
                                table.ajax.reload();
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: resp.message,
                                    timer: 3000
                                });
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Warning",
                                    text: resp.message,
                                    timer: 3000
                                });
                            }

                        }
                    });
                }
            });

            var DTbody = $('#datatable tbody');

            DTbody.on('click', '.btn-delete', function() {
                var id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: "{{ route('backend.pages.destroy') }}",
                    data: {
                        "id": id
                    },
                    success: function(resp) {
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: resp.message,
                            timer: 3000
                        });
                        table.ajax.reload();
                    }
                });
            });

            DTbody.on('click', '.btn-edit', function() {
                var id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: "{{ route('backend.pages.edit') }}",
                    data: {
                        "id": id
                    },
                    success: function(resp) {
                        $('#editModal').modal('show');
                        $('#editId').val(resp.data.id);
                        $('#editPage').val(resp.data.page_name);
                    }
                });
            });

            $('#btn-save-edit').click(function(e) {
                var id = $('#editId').val();
                var page = $('#editPage').val();
                if (page == "") {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: "Warning",
                        text: "Please fill the field",
                        timer: 3000
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('backend.pages.update') }}",
                        data: {
                            "id": id,
                            "page": page,
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(resp) {
                            $('#editModal').modal('hide');
                            if (resp.code == 200) {
                                Swal.fire({
                                    icon: "success",
                                    title: "Success",
                                    text: resp.message,
                                    timer: 3000
                                });
                                table.ajax.reload();
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Warning",
                                    text: resp.message,
                                    timer: 3000
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
