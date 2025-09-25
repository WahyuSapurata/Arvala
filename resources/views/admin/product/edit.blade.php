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

        .dropzone .dz-preview .dz-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            /* atau 'cover' kalau mau isi penuh */
        }

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

                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="uuid" value="{{ $data->uuid }}">

                                <div class="mb-10">
                                    <label class="form-label">Judul Product</label>
                                    <input type="text" id="judul_product" value="{{ $data->judul_product }}"
                                        class="form-control" name="judul_product">
                                    <small class="text-danger judul_product_error"></small>
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
                                    <label class="form-label">Price ($)</label>
                                    <input type="text" id="price" class="form-control" name="price"
                                        value="{{ $data->price }}" placeholder="$0.00">
                                    <small class="text-danger price_error"></small>
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

                                <div class="fv-row mb-10">
                                    <label class="form-label">Image Product</label>
                                    <div class="dropzone" id="kt_dropzonejs_edit_product">
                                        <div class="dz-message needsclick">
                                            <i class="bi bi-file-earmark-arrow-up text-primary fs-3x"></i>
                                            <div class="ms-4">
                                                <h3 class="fs-5 fw-bold text-gray-900 mb-1">Drop files here or click to
                                                    upload</h3>
                                                <span class="fs-7 fw-semibold text-gray-400">Upload up to 10 files</span>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-danger image_product_error"></small>
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
        var pathParts = currentPath.split('/');
        var lastPart = pathParts[pathParts.length - 1];

        var options = {
            selector: "#deskripsi",
            height: "480"
        };
        tinymce.init(options);

        // Format price input (sama seperti form add)
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

        const existingImages = @json(json_decode($data->image_product ?? '[]'));
        const storagePath = "{{ asset('public/product-detail') }}";
        const deletedImages = [];

        const myDropzone = new Dropzone("#kt_dropzonejs_edit_product", {
            url: "#", // dummy
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            maxFilesize: 10,
            paramName: "image_product[]",
            acceptedFiles: "image/*",
            addRemoveLinks: true,
            init: function() {
                let dz = this;

                // Preload existing images
                existingImages.forEach(function(filename) {
                    const mockFile = {
                        name: filename,
                        size: 123456,
                        accepted: true,
                        status: Dropzone.ADDED,
                        type: 'image/jpeg'
                    };

                    dz.emit("addedfile", mockFile);
                    dz.emit("thumbnail", mockFile, `${storagePath}/${filename}`);
                    dz.emit("complete", mockFile);

                    const hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'existing_image_product[]';
                    hiddenInput.value = filename;
                    mockFile.previewElement.appendChild(hiddenInput);
                    mockFile._isExisting = true;

                    $(mockFile.previewElement).find('.dz-remove').on('click', function() {
                        deletedImages.push(filename);
                        dz.removeFile(mockFile);
                    });
                });

                dz.on("addedfile", function(file) {
                    file.previewElement.classList.add('dz-success', 'dz-complete');
                });

                dz.on("removedfile", function(file) {
                    if (!file._isExisting) {
                        return;
                    }
                    const hidden = file.previewElement.querySelector(
                        'input[name="existing_image_product[]"]');
                    if (hidden) {
                        hidden.remove();
                    }
                });
            }
        });

        // Variable to store category data
        let categoryData = [];

        // Function to toggle price field visibility (sama seperti form add)
        function togglePriceField(selectedUuid) {
            const priceContainer = $('.mb-10').has('#price');

            // Find the selected category data
            const selectedCategory = categoryData.find(cat => cat.uuid === selectedUuid);

            if (selectedCategory && selectedCategory.nama_kategori.toLowerCase() === 'free') {
                $('#price').prop('disabled', true); // Disable price field
                $('#price').val('$0.00'); // Set price value to 0 with format
            } else {
                $('#price').prop('disabled', false); // Enable price field
            }
        }

        // Add event listener for category selection change
        $(document).on('change', '#from_select_kategori', function() {
            const selectedUuid = $(this).val();
            togglePriceField(selectedUuid);
        });

        // Submit form
        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();
            console.log("Form submission initiated."); // For debugging

            // Disable button and show loading spinner
            const submitButton = $(this).find('.btn-submit');
            submitButton.prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...');

            const form = $(".form-data")[0];
            const formData = new FormData(form);

            // Check if category is free, set price to 0
            const selectedUuid = $('#from_select_kategori').val();
            const selectedCategory = categoryData.find(cat => cat.uuid === selectedUuid);
            if (selectedCategory && selectedCategory.nama_kategori.toLowerCase() === 'free') {
                formData.set('price', '0'); // Set price to 0 for free products
            }

            // Add new files from Dropzone
            myDropzone.files.forEach(file => {
                if (!file._isExisting) {
                    formData.append("image_product[]", file);
                }
            });

            // Send data of deleted images
            deletedImages.forEach(filename => {
                formData.append("deleted_images[]", filename);
            });
            console.log("FormData prepared, sending AJAX request."); // For debugging


            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $.ajax({
                type: 'POST',
                url: '/admin/update-product/' + lastPart,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".text-danger").html("");
                    if (response.success == true) {
                        swal.fire({
                            text: `Product berhasil di Edit`,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500,
                        }).then(function() {
                            window.location.href = '/admin/product';
                        });
                    } else {
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
                    submitButton.prop('disabled', false).html('<i class="bi bi-file-earmark-diff"></i> Simpan');
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

                    let html = "";
                    let selectedKategori = @json($data->uuid_kategori);

                    $.each(res.data, function(x, y) {
                        let selected = y.uuid == selectedKategori ? "selected" : "";
                        html += `<option value="${y.uuid}" ${selected}>${y.nama_kategori}</option>`;
                    });

                    $('#from_select_kategori').html(html);

                    // Check initial category after loading
                    if (selectedKategori) {
                        togglePriceField(selectedKategori);
                    }
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
