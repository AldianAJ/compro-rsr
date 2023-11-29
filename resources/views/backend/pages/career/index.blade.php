@extends('backend.layouts.app')

@section('title')
    Career
@endsection

@section('page-breadcumb')
    Career
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
                <h3 class="mb-0">Master Career</h3>
                <button type="button" class="btn btn-warning" id="btn-add-modal" data-toggle="modal"
                    data-target="#createModal">Add
                    Career</button>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Section</th>
                            <th>Image</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Data Career</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Section
                            </label>
                            <input name="addSection" id="addSection" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Image
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="addImage" name="addImage"
                                    lang="en">
                                <label class="custom-file-label" for="image">Select file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" id="btn-save-add">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Language</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <input type="hidden" name="editId" id="editId">
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Section
                            </label>
                            <textarea name="editSection" id="editSection" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Image
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="editImage" name="editImage"
                                    lang="en">
                                <label class="custom-file-label" for="image">Select file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning" id="btn-save-edit">Save changes</button>
                    </div>
                </form>
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
                ajax: "{{ route('backend.career.index') }}",
                columns: [{
                        data: "id",
                        render: function(data, type, row, meta) {
                            return meta.row + 1
                        }
                    },
                    {
                        data: "section",
                        name: "section"
                    },
                    {
                        data: "image",
                        render: function(data, type, row, meta) {
                            let html =
                                `<img src="{{ asset('storage/${data}') }}" alt="" style="width:5rem;">`;
                            return html;
                        }
                    },
                    {
                        data: "id",
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
                $('#addSection').val("");
                $('#addImage').val("");
            });

            // $('#btn-save-add').click(function(e) {
            //     var section = $('#addSection').val();
            //     if (section == "") {
            //         $('#createModal').modal('hide');
            //         Swal.fire({
            //             icon: "error",
            //             title: "Warning",
            //             text: "Please fill the field",
            //             timer: 3000
            //         });
            //     } else {
            //         $.ajax({
            //             type: "POST",
            //             url: "{{ route('backend.career.store') }}",
            //             data: {
            //                 'section': section,
            //                 '_token': "{{ csrf_token() }}"
            //             },
            //             dataType: "json",
            //             success: function(resp) {
            //                 $('#createModal').modal('hide');
            //                 if (resp.code == 200) {
            //                     Swal.fire({
            //                         icon: "success",
            //                         title: "Success",
            //                         text: resp.message,
            //                         timer: 3000
            //                     });
            //                 } else {
            //                     Swal.fire({
            //                         icon: "error",
            //                         title: "Warning",
            //                         text: resp.message,
            //                         timer: 3000
            //                     });
            //                 }
            //                 table.ajax.reload();
            //             }
            //         });
            //     }
            // });
            $('form#addForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("_token", "{{ csrf_token() }}");
                if (formData.get('addSection') == "" || formData.get("addImage").name == "") {
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
                        url: "{{ route('backend.career.store') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                            $('#createModal').modal('hide');
                            if (resp.code == 200) {
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
                            table.ajax.reload();
                        }
                    });
                }
            });

            $('form#editForm').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                formData.append("_token", "{{ csrf_token() }}");
                if (formData.get('editSection') == "") {
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
                        url: "{{ route('backend.career.update') }}",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                            $('#editModal').modal('hide');
                            if (resp.code == 200) {
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
                            table.ajax.reload();
                        }
                    });
                }
            });

            var DTbody = $('#datatable tbody');

            DTbody.on('click', '.btn-delete', function() {
                var id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: "{{ route('backend.career.destroy') }}",
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
                    url: "{{ route('backend.career.edit') }}",
                    data: {
                        "id": id
                    },
                    success: function(resp) {
                        $('#editModal').modal('show');
                        $('#editId').val(resp.data.id);
                        $('#editSection').val(resp.data.section);
                        $('#editImage').val("");
                    }
                });
            });

            // $('#btn-save-edit').click(function(e) {
            //     var id = $('#editId').val();
            //     var content = $('#editContent').val();
            //     var language = $('#editLang').val();
            //     if (content == "" || language == "") {
            //         $('#editModal').modal('hide');
            //         Swal.fire({
            //             icon: "error",
            //             title: "Warning",
            //             text: "Please fill the field",
            //             timer: 3000
            //         });
            //     } else {
            //         $.ajax({
            //             type: "POST",
            //             url: "{{ route('backend.career.update') }}",
            //             data: {
            //                 "id": id,
            //                 "content": content,
            //                 "lang_id": language,
            //                 "_token": "{{ csrf_token() }}"
            //             },
            //             success: function(resp) {
            //                 $('#editModal').modal('hide');
            //                 if (resp.code == 200) {
            //                     Swal.fire({
            //                         icon: "success",
            //                         title: "Success",
            //                         text: resp.message,
            //                         timer: 3000
            //                     });
            //                     table.ajax.reload();
            //                 } else {
            //                     Swal.fire({
            //                         icon: "error",
            //                         title: "Warning",
            //                         text: resp.message,
            //                         timer: 3000
            //                     });
            //                 }
            //             }
            //         });
            //     }
            // });
        });
    </script>
@endsection
