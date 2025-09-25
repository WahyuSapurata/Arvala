@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <button class="btn btn-info btn-sm" id="button-side-form">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" id="svg-button" viewBox="0 0 512 512">
                    <style>
                        #svg-button {
                            fill: #ffffff
                        }
                    </style>
                    <path
                        d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM217.4 376.9L117.5 269.8c-3.5-3.8-5.5-8.7-5.5-13.8s2-10.1 5.5-13.8l99.9-107.1c4.2-4.5 10.1-7.1 16.3-7.1c12.3 0 22.3 10 22.3 22.3l0 57.7 96 0c17.7 0 32 14.3 32 32l0 32c0 17.7-14.3 32-32 32l-96 0 0 57.7c0 12.3-10 22.3-22.3 22.3c-6.2 0-12.1-2.6-16.3-7.1z" />
                </svg>
                Kembali
            </button>
        </div>
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
        }

        .dz-progress {
            display: none !important;
        }

        .dz-preview.sortable-ghost {
            opacity: 0.4;
        }
    </style>
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body p-0">
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
                                        data-placeholder="Pilih jenis inputan"></select>
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
                                    <textarea id="deskripsi" name="deskripsi">{{ $data->deskripsi }}</textarea>
                                    <small class="text-danger deskripsi_error"></small>
                                </div>

                                <div class="mb-10">
                                    <div><label for="thumbnail" class="form-label">Thumbnail</label></div>
                                    <div class="drop-zone" id="dropZoneThumbnail">
                                        <input type="file" class="file-input" name="thumbnail" accept="image/*">
                                        <p class="placeholder-text"
                                            style="display: {{ $data->thumbnail ? 'none' : 'block' }};">Drag & Drop an image
                                            here or click to select</p>
                                        <img class="preview img-fluid shadow"
                                            src="{{ asset('public/product-thumbnail/' . $data->thumbnail) }}"
                                            style="display: {{ $data->thumbnail ? 'block' : 'none' }};">
                                        <button type="button" class="remove-btn"
                                            style="display: {{ $data->thumbnail ? 'block' : 'none' }};">&times;</button>
                                    </div>
                                    <div><small class="text-danger thumbnail_error"></small></div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
    <script>
        let control = new Control();
        var currentPath = window.location.pathname;
        var pathParts = currentPath.split('/');
        var lastPart = pathParts[pathParts.length - 1];

        tinymce.init({
            selector: "#deskripsi",
            height: "480"
        });

        $('#price').on('input', function() {
            $(this).val($(this).val().replace(/[^0-9.]/g, ''));
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
                $(this).val('');
            }
        });

        $(document).on('click', '#button-side-form', () => window.history.back());

        Dropzone.autoDiscover = false;

        const existingImages = @json(json_decode($data->image_product ?? '[]'));
        const storagePath = "{{ asset('public/product-detail') }}";
        const deletedImages = [];

        const myDropzone = new Dropzone("#kt_dropzonejs_edit_product", {
            url: "#", // This should be a real URL or prevented from submitting
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
                existingImages.forEach(function(filename) {
                    const mockFile = {
                        name: filename,
                        size: 123456, // dummy size
                        accepted: true,
                        status: Dropzone.ADDED,
                        type: 'image/jpeg', // dummy type
                        _isExisting: true
                    };
                    dz.emit("addedfile", mockFile);
                    dz.emit("thumbnail", mockFile, `${storagePath}/${filename}`);
                    dz.emit("complete", mockFile);
                    dz.files.push(mockFile); // Manually add to files array
                });

                this.on("removedfile", function(file) {
                    if (file._isExisting) {
                        deletedImages.push(file.name);
                    }
                });
            }
        });

        // Initialize SortableJS on the Dropzone container
        new Sortable(document.querySelector("#kt_dropzonejs_edit_product"), {
            items: ".dz-preview",
            ghostClass: "sortable-ghost",
            animation: 150,
            onEnd: function(evt) {
                // This function is triggered when sorting is finished
                const orderedFiles = [];
                const previews = document.querySelectorAll('#kt_dropzonejs_edit_product .dz-preview');

                previews.forEach(preview => {
                    // Find the corresponding file in myDropzone.files based on the element
                    const file = myDropzone.files.find(f => f.previewElement === preview);
                    if (file) {
                        orderedFiles.push(file);
                    }
                });

                // Replace the internal files array with the new sorted array
                myDropzone.files = orderedFiles;
            },
        });


        let categoryData = [];

        function togglePriceField(selectedUuid) {
            const selectedCategory = categoryData.find(cat => cat.uuid === selectedUuid);
            if (selectedCategory && selectedCategory.nama_kategori.toLowerCase() === 'free') {
                $('#price').prop('disabled', true).val('$0.00');
            } else {
                $('#price').prop('disabled', false);
            }
        }

        $(document).on('change', '#from_select_kategori', function() {
            togglePriceField($(this).val());
        });

        $(document).on('submit', ".form-data", function(e) {
            e.preventDefault();
            const submitButton = $(this).find('.btn-submit');
            submitButton.prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Menyimpan...'
            );

            const formData = new FormData(this);
            const selectedUuid = $('#from_select_kategori').val();
            const selectedCategory = categoryData.find(cat => cat.uuid === selectedUuid);
            if (selectedCategory && selectedCategory.nama_kategori.toLowerCase() === 'free') {
                formData.set('price', '0');
            }

            // Handle deleted images
            deletedImages.forEach(filename => formData.append("deleted_images[]", filename));

            const orderedExistingImages = [];

            // Now, iterate through the correctly ordered myDropzone.files array
            myDropzone.files.forEach(file => {
                if (file._isExisting) {
                    // This is an existing file, add its name to the ordered list
                    if (!deletedImages.includes(file.name)) {
                        orderedExistingImages.push(file.name);
                    }
                } else {
                    // This is a new file that needs to be uploaded
                    formData.append("image_product[]", file);
                }
            });

            // Append the correctly ordered existing images to formData
            orderedExistingImages.forEach(filename => {
                formData.append("ordered_existing_images[]", filename);
            });


            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $.ajax({
                type: 'POST',
                url: '/admin/update-product/' + lastPart,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $(".text-danger").html("");
                    if (response.success) {
                        swal.fire({
                                text: `Product berhasil di Edit`,
                                icon: "success",
                                showConfirmButton: false,
                                timer: 1500
                            })
                            .then(() => window.location.href = '/admin/product');
                    } else {
                        swal.fire({
                            title: response.message,
                            text: response.data,
                            icon: "warning",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                },
                error: function(xhr) {
                    $(".text-danger").html("");
                    $.each(xhr.responseJSON["errors"], (key, value) => $(`.${key}_error`).html(value));
                },
                complete: function() {
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
                    categoryData = res.data;
                    let html = "",
                        selectedKategori = @json($data->uuid_kategori);
                    $.each(res.data, (x, y) => {
                        let selected = y.uuid == selectedKategori ? "selected" : "";
                        html += `<option value="${y.uuid}" ${selected}>${y.nama_kategori}</option>`;
                    });
                    $('#from_select_kategori').html(html);
                    if (selectedKategori) togglePriceField(selectedKategori);
                },
                error: () => alert("Gagal mengambil data kategori."),
            });
        }
        $(function() {
            push_select_kategori();
        });
    </script>
@endsection
