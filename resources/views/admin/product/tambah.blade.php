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

        /* Sembunyikan progress bar Dropzone */
        .dz-progress {
            display: none !important;
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
                                    <label class="form-label">Kategori</label>
                                    <select name="uuid_kategori" class="form-select" data-control="select2"
                                        id="from_select_kategori" data-placeholder="Pilih jenis inputan">
                                    </select>
                                    <small class="text-danger uuid_kategori_error"></small>
                                </div>

                                <div class="mb-10">
                                    <label class="form-label">Price ($)</label>
                                    <input type="text" id="price" class="form-control" name="price"
                                        placeholder="$0.00">
                                    <small class="text-danger price_error"></small>
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

                                <!-- Dropzone container -->
                                <div class="fv-row mb-10">
                                    <label class="form-label">Image Product</label>
                                    <div class="dropzone" id="dropzone-image-product">
                                        <div class="dz-message needsclick">
                                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                            <div class="ms-4">
                                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to
                                                    upload.</h3>
                                                <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                            </div>
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

        Dropzone.autoDiscover = false;

        const dropzone = new Dropzone("#dropzone-image-product", {
            url: "#", // dummy karena kita submit pakai AJAX manual
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            maxFilesize: 10,
            addRemoveLinks: true,
            paramName: "image_product[]",
            acceptedFiles: "image/*"
        });

        // Variable to store category data
        let categoryData = [];

        // Function to toggle price field visibility
        function togglePriceField(selectedUuid) {
            const priceContainer = $('.mb-10').has('#price'); // Find the container with price input

            // Find the selected category data
            const selectedCategory = categoryData.find(cat => cat.uuid === selectedUuid);

            if (selectedCategory && selectedCategory.nama_kategori.toLowerCase() === 'free') {
                $('#price').prop('disabled', true); // Disable price field
                $('#price').val('$0.00'); // Set price value to 0
            } else {
                $('#price').prop('disabled', false); // Enable price field
            }
        }

        // Add event listener for category selection change
        $(document).on('change', '#from_select_kategori', function() {
            const selectedUuid = $(this).val();
            togglePriceField(selectedUuid);
        });

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();
            console.log("Form submission initiated."); // For debugging

            // Disable button and show loading spinner
            const submitButton = $(this).find('.btn-submit');
            submitButton.prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...'
                );


            let form = $(this)[0];
            let formData = new FormData(form);

            // Check if category is free, set price to 0
            const selectedUuid = $('#from_select_kategori').val();
            const selectedCategory = categoryData.find(cat => cat.uuid === selectedUuid);
            if (selectedCategory && selectedCategory.nama_kategori.toLowerCase() === 'free') {
                formData.set('price', '0'); // Set price to 0 for free products
            }

            // Append files from Dropzone to FormData
            dropzone.getAcceptedFiles().forEach((file, i) => {
                formData.append("image_product[]", file);
            });
            console.log("FormData prepared, sending AJAX request."); // For debugging


            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: 'POST',
                url: '/admin/store-product',
                data: formData,
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
                        // Don't reset form, so user can correct errors
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
                complete: function() {
                    // Re-enable the button regardless of success or error
                    submitButton.prop('disabled', false).html(
                        '<i class="bi bi-file-earmark-diff"></i> Simpan');
                }
            });
        });

        function push_select_kategori() {
            $.ajax({
                url: "{{ route('admin.kategori-get') }}",
                method: "GET",
                success: function(res) {
                    // Store category data globally
                    categoryData = res.data;

                    $('#from_select_kategori').html("");
                    let html = "<option selected disabled>Pilih jenis inputan</option>";
                    $.each(res.data, function(x, y) {
                        html += `<option value="${y.uuid}">${y.nama_kategori}</option>`;
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
