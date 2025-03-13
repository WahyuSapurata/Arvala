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
            padding: 20px;
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

        .remove-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 25px;
            height: 25px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            display: none;
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

                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="uuid" value="{{ $data->uuid }}">

                                <div class="mb-10">
                                    <label class="form-label">Judul Product</label>
                                    <input type="text" id="judul_product" value="{{ $data->judul_product }}"
                                        class="form-control" name="judul_product">
                                    <small class="text-danger judul_product_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Price ($)</label>
                                    <input type="text" id="price" class="form-control" name="price"
                                        value="{{ $data->price }}" placeholder="$0.00">
                                    <small class="text-danger price_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Kategori</label>
                                    <select name="uuid_kategori" class="form-select" data-control="select2"
                                        value="{{ $data->uuid_kategori }}" id="from_select_kategori"
                                        data-placeholder="Pilih jenis inputan">
                                    </select>
                                    <small class="text-danger uuid_kategori_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Deskripsi</label>
                                    <textarea id="deskripsi" name="deskripsi" value="{{ $data->deskripsi }}">{{ $data->deskripsi }}</textarea>
                                    <small class="text-danger deskripsi_error"></small>
                                </div>

                                <div class="mb-10">
                                    <div>
                                        <label for="thumbnail" class="form-label">Thumbnail</label>
                                    </div>
                                    <div class="drop-zone" id="dropZoneThumbnail">
                                        <input type="file" class="file-input" name="thumbnail" accept="image/*">
                                        <p class="placeholder-text"
                                            style="display: {{ $data->thumbnail ? 'none' : 'block' }};">
                                            Drag & Drop an image here or click to select
                                        </p>
                                        <img class="preview img-fluid shadow"
                                            src="{{ asset('public/product-thumbnail/' . $data->thumbnail) }}"
                                            style="display: {{ $data->thumbnail ? 'block' : 'none' }};">
                                        <button type="button" class="remove-btn"
                                            style="display: {{ $data->thumbnail ? 'block' : 'none' }};">&times;</button>
                                    </div>
                                    <div>
                                        <small class="text-danger thumbnail_error"></small>
                                    </div>
                                </div>

                                <div class="row mb-10">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <div class="col-md-3">
                                            <label for="detail_{{ $i }}" class="form-label">Detail Image
                                                {{ $i }}</label>
                                            <div class="drop-zone" id="dropZone{{ $i }}">
                                                <input type="file" name="detail_{{ $i }}" accept="image/*"
                                                    class="file-input">
                                                <p class="placeholder-text"
                                                    style="display: {{ $data->{'detail_' . $i} ? 'none' : 'block' }};">
                                                    Drag & Drop or Click
                                                </p>
                                                <img class="preview img-fluid shadow"
                                                    src="{{ asset('public/product-detail_' . $i . '/' . $data->{'detail_' . $i}) }}"
                                                    style="display: {{ $data->{'detail_' . $i} ? 'block' : 'none' }};">
                                                <button type="button" class="remove-btn"
                                                    style="display: {{ $data->{'detail_' . $i} ? 'block' : 'none' }};">&times;</button>
                                            </div>
                                            <div>
                                                <small class="text-danger detail_{{ $i }}_error"></small>
                                            </div>
                                        </div>
                                    @endfor
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Meta</label>
                                    <input type="text" id="meta" class="form-control" name="meta"
                                        value="{{ $data->meta }}">
                                    <small class="text-danger meta_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Link</label>
                                    <input type="text" id="link" class="form-control" name="link"
                                        value="{{ $data->link }}">
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

        var currentPath = window.location.pathname;
        var pathParts = currentPath.split('/'); // Membagi path menggunakan karakter '/'
        var lastPart = pathParts[pathParts.length - 1]; // Mengambil elemen terakhir dari array

        var options = {
            selector: "#deskripsi",
            height: "480"
        };
        tinymce.init(options);

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
                url: '/admin/update-product/' + lastPart,
                data: new FormData($(".form-data")[0]),
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".text-danger").html("");
                    if (response.success == true) {
                        swal
                            .fire({
                                text: `Product berhasil di Edit`,
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

                    let html = ""; // Inisialisasi html di awal
                    let selectedKategori =
                        @json($data->uuid_kategori); // Ambil nilai dengan aman dari Blade ke JS

                    $.each(res.data, function(x, y) {
                        let selected = y.uuid == selectedKategori ? "selected" :
                            ""; // Cek apakah harus selected
                        html += `<option value="${y.uuid}" ${selected}>${y.nama_kategori}</option>`;
                    });

                    $('#from_select_kategori').html(html);
                },
                error: function(xhr) {
                    alert("Gagal mengambil data kategori.");
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
                let removeBtn = dropZone.find('.remove-btn');

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
                    handleFiles(files);
                });

                fileInput.on('change', function(event) {
                    handleFiles(event.target.files);
                });

                removeBtn.on('click', function() {
                    fileInput.val('');
                    preview.hide().attr('src', '');
                    placeholderText.show();
                    removeBtn.hide();
                });

                function handleFiles(files) {
                    if (files.length > 0) {
                        let file = files[0];
                        if (file.type.startsWith('image/')) {
                            if (file.size > 2 * 1024 * 1024) {
                                alert('File terlalu besar! Maksimal 2MB.');
                                return;
                            }
                            let reader = new FileReader();
                            reader.onload = function(event) {
                                preview.attr('src', event.target.result).show();
                                placeholderText.hide();
                                removeBtn.show();
                            };
                            reader.readAsDataURL(file);
                        } else {
                            alert('Harap unggah file gambar yang valid.');
                        }
                    }
                }
            });
        });
    </script>
@endsection
