@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <button class="btn btn-info btn-sm" id="button-side-form">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" id="svg-button"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <style>
                        #svg-button {
                            fill: #ffffff
                        }
                    </style>
                    <path
                        d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z" />
                </svg>
                Kembali</button>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
@endsection
@section('content')
    <style>
        .drop-zone {
            border: 2px dashed #007bff;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        .drop-zone.dragover {
            background-color: #e9ecef;
        }

        .drop-zone img {
            max-width: 100%;
            height: 100%;
            display: none;
            border-radius: 10px;
        }

        .drop-zone input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
    </style>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">

                <div class="card">
                    <div class="card-body p-0">
                        <!--begin::Card body-->
                        <div class="card-body hover-scroll-overlay-y">
                            <form class="form-data" enctype="multipart/form-data">

                                <input type="hidden" name="id">
                                <input type="hidden" name="uuid">

                                <div class="mb-10">
                                    <label class="form-label">Judul Product</label>
                                    <input type="text" id="judul_product" class="form-control" name="judul_product">
                                    <small class="text-danger judul_product_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Price ($)</label>
                                    <input type="text" id="price" class="form-control" name="price"
                                        placeholder="$0.00">
                                    <small class="text-danger price_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Kategori</label>
                                    <select name="uuid_kategori" class="form-select" data-control="select2"
                                        id="from_select_kategori" data-placeholder="Pilih jenis inputan">
                                    </select>
                                    <small class="text-danger uuid_kategori_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi"></textarea>
                                    <small class="text-danger deskripsi_error"></small>
                                </div>

                                <div class="mb-10">
                                    <div>
                                        <label for="thumbnail" class="form-label">Thumbnail</label>
                                    </div>
                                    <!--begin::Image input-->
                                    <div class="drop-zone" id="dropZone">
                                        <input type="file" class="file-input" name="thumbnail" accept="image/*">
                                        <p class="placeholder-text">Drag & Drop an image here or click to select</p>
                                        <img class="preview img-fluid shadow">
                                    </div>
                                    <!--end::Image input-->
                                    <div>
                                        <small class="text-danger thumbnail_error"></small>
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    <div class="col-md-3">
                                        <label for="detail_1" class="form-label">Detail Image 1</label>
                                        <div class="drop-zone" id="dropZone1">
                                            <input type="file" name="detail_1" accept="image/*" class="file-input">
                                            <p class="placeholder-text">Drag & Drop or Click</p>
                                            <img class="preview img-fluid shadow">
                                        </div>
                                        <div>
                                            <small class="text-danger detail_1_error"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="detail_2" class="form-label">Detail Image 2</label>
                                        <div class="drop-zone" id="dropZone2">
                                            <input type="file" name="detail_2" accept="image/*" class="file-input">
                                            <p class="placeholder-text">Drag & Drop or Click</p>
                                            <img class="preview img-fluid shadow">
                                        </div>
                                        <div>
                                            <small class="text-danger detail_2_error"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="detail_3" class="form-label">Detail Image 3</label>
                                        <div class="drop-zone" id="dropZone3">
                                            <input type="file" name="detail_3" accept="image/*" class="file-input">
                                            <p class="placeholder-text">Drag & Drop or Click</p>
                                            <img class="preview img-fluid shadow">
                                        </div>
                                        <div>
                                            <small class="text-danger detail_3_error"></small>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="detail_4" class="form-label">Detail Image 4</label>
                                        <div class="drop-zone" id="dropZone4">
                                            <input type="file" name="detail_4" accept="image/*" class="file-input">
                                            <p class="placeholder-text">Drag & Drop or Click</p>
                                            <img class="preview img-fluid shadow">
                                        </div>
                                        <div>
                                            <small class="text-danger detail_4_error"></small>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Meta</label>
                                    <input type="text" id="meta" class="form-control" name="meta">
                                    <small class="text-danger meta_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Link</label>
                                    <input type="text" id="link" class="form-control" name="link">
                                    <small class="text-danger link_error"></small>
                                </div>

                                <div class="separator separator-dashed mt-8 mb-5"></div>
                                <div class="d-flex gap-5">
                                    <button type="submit"
                                        class="btn btn-success btn-sm btn-submit d-flex align-items-center"><i
                                            class="bi bi-file-earmark-diff"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

            </div>
        </div>
        <!--end::Container-->
    </div>
@endsection
@section('script')
    <script>
        let control = new Control();

        var options = {
            selector: "#deskripsi",
            height: "480"
        };
        tinymce.init(options);

        $('#price').on('input', function() {
            let value = $(this).val().replace(/[^0-9.]/g, ''); // Hanya angka dan titik
            $(this).val(value); // Biarkan user memasukkan angka tanpa langsung format
        });

        $('#price').on('blur', function() {
            let value = $(this).val();
            let floatValue = parseFloat(value);

            if (!isNaN(floatValue)) {
                $(this).val('$' + floatValue.toLocaleString('en-US', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }));
            } else {
                $(this).val(''); // Kosongkan jika input tidak valid
            }
        });

        $(document).on('click', '#button-side-form', function() {
            window.history.back();
        })

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: 'POST',
                url: '/admin/store-product',
                data: new FormData($(".form-data")[0]),
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".text-danger").html("");
                    if (response.success == true) {
                        swal
                            .fire({
                                text: `Product berhasil di Tambah`,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500,
                            })
                            .then(function() {
                                window.location.href = '/admin/product';
                            });
                    } else {
                        $("form")[0].reset();
                        $("#from_select").val(null).trigger("change");
                        // $(".form-select").val(null).trigger("change");
                        swal.fire({
                            title: response.message,
                            text: response.data,
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
                error: function(xhr) {
                    $(".text-danger").html("");
                    $.each(xhr.responseJSON["errors"], function(key, value) {
                        $(`.${key}_error`).html(value);
                    });
                },
            });
        });

        function push_select_kategori() {
            $.ajax({
                url: "{{ route('admin.kategori-get') }}",
                method: "GET",
                success: function(res) {
                    console.log(res);

                    $('#from_select_kategori').html("");
                    let html = "<option selected disabled>Pilih jenis inputan</option>";
                    $.each(res.data, function(x, y) {
                        html += `<option value="${y.uuid}">${y.nama_kategori}</option>`;
                    });
                    $('#from_select_kategori').html(html);
                },
                error: function(xhr) {
                    alert("gagal");
                },
            });
        }

        $(function() {
            push_select_kategori();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.drop-zone').each(function() {
                let dropZone = $(this);
                let fileInput = dropZone.find('.file-input');
                let preview = dropZone.find('.preview');
                let placeholderText = dropZone.find('.placeholder-text');

                fileInput.on('change', function(event) {
                    handleFiles(event.target.files, preview, placeholderText);
                });

                dropZone.on('dragover', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).addClass('dragover');
                });

                dropZone.on('dragleave', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).removeClass('dragover');
                });

                dropZone.on('drop', function(event) {
                    event.preventDefault();
                    event.stopPropagation();
                    $(this).removeClass('dragover');
                    let files = event.originalEvent.dataTransfer.files;
                    fileInput[0].files = files;
                    handleFiles(files, preview, placeholderText);
                });
            });

            function handleFiles(files, preview, placeholderText) {
                if (files.length > 0) {
                    let file = files[0];
                    if (file.type.startsWith('image/')) {
                        let reader = new FileReader();
                        reader.onload = function(event) {
                            preview.attr('src', event.target.result).show();
                            placeholderText.hide();
                        };
                        reader.readAsDataURL(file);
                    } else {
                        alert('Please upload a valid image file.');
                    }
                }
            }
        });
    </script>
@endsection
