@extends('backend.layouts.app')

@section('title')
    Product
@endsection

@section('page-breadcumb')
    Master
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
                <h3 class="mb-0">Product</h3>
                <button type="button" class="btn btn-warning" id="btn-add-modal" data-toggle="modal"
                    data-target="#createModal">Add Product</button>
            </div>

            <div class="table-responsive py-4">
                <table class="table table-flush" id="datatable">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Brand</th>
                            <th>Product</th>
                            <th>Thumbnail Image</th>
                            <th>Detail Image</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Productt</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addForm" enctype="multipart/form-data">
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Brand
                            </label>
                            <select name="addBrand" id="addBrand" class="form-control text-dark">
                                <option value="">-- Select Brands --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Product
                            </label>
                            <input type="text" class="form-control text-dark" name="addProduct" id="addProduct">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Thumbnail Image
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="addImage" name="addImage"
                                    lang="en">
                                <label class="custom-file-label" for="image">Select file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Image Detail
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="addImageDetail" name="addImageDetail"
                                    lang="en">
                                <label class="custom-file-label" for="image">Select file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button class="btn btn-warning" type="submit" id="btn-save-add">Save
                            changes</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Content About</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" id="editForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Brand
                            </label>
                            <input type="hidden" name="editId" id="editId">
                            <select name="editBrand" id="editBrand" class="form-control text-dark">
                                <option value="">-- Select Brand --</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Product
                            </label>
                            <input type="text" class="form-control text-dark" name="editProduct" id="editProduct">
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Thumbnail Image
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="editImage" name="editImage"
                                    lang="en">
                                <label class="custom-file-label" for="image">Select file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-control-label">
                                Detail Image
                            </label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="editImageDetail"
                                    name="editImageDetail" lang="en">
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
                ajax: "{{ route('backend.product.index') }}",
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1
                        }
                    },
                    {
                        data: "brand_name",
                        name: "brand_name"
                    },
                    {
                        data: "product_name",
                        nama: "product_name"
                    },
                    {
                        data: "image_url",
                        render: function(data, type, row, meta) {
                            let html =
                                `<img src="{{ asset('storage/${data}') }}" alt="" style="width:5rem;">`;
                            return html;
                        }
                    },
                    {
                        data: "image_url_detail",
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
                $('#addBrand').val("");
                $('#addProduct').val("");
                $('#addImage').val("");
                $('#addImageDetail').val("");
            });

            $("form#addForm").submit(function(e) {
                e.preventDefault();

                var brand = $('#addBrand').val();
                var product = $('#addProduct').val();
                var image = $('#addImage')[0].files;
                var imageDetail = $('#addImageDetail')[0].files;

                var formData = new FormData(this);
                formData.append("_token", "{{ csrf_token() }}");

                if (brand == "" || product == "" || image.length == 0 || imageDetail.length == 0) {
                    $('#createModal').modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: "Warning",
                        text: "Please fill the field and image",
                        timer: 3000
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('backend.product.store') }}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
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

            DTbody.on('click', '.btn-edit', function() {
                var id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: "{{ route('backend.product.index') }}",
                    data: {
                        "id": id
                    },
                    success: function(resp) {
                        $('#editModal').modal('show');
                        $('#editId').val(resp.data.id);
                        $('#editBrand').val(resp.data.brand_id);
                        $('#editProduct').val(resp.data.product_name);
                        $('#editImage').val("");
                    }
                });
            });

            $('form#editForm').submit(function(e) {
                e.preventDefault();
                var brand = $('#editBrand').val();
                var product = $('#editProduct').val();
                var formData = new FormData(this);
                formData.append("_token", "{{ csrf_token() }}");

                if (brand == "" || product == "") {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        icon: "error",
                        title: "Warning",
                        text: "Please fill the field and image",
                        timer: 3000
                    });
                } else {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('backend.product.update') }}",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(resp) {
                            $('#editModal').modal('hide');
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

            DTbody.on('click', '.btn-delete', function() {
                var id = $(this).data("id");
                $.ajax({
                    type: "GET",
                    url: "{{ route('backend.product.destroy') }}",
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
        });
    </script>
@endsection
