@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <!--begin::Page title-->
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <!--begin::Title-->
            <button class="btn btn-primary btn-sm " data-kt-drawer-show="true" data-kt-drawer-target="#side_form"
                id="button-side-form"><i class="fa fa-plus-circle" style="color:#ffffff" aria-hidden="true"></i> Tambah
                Data</button>
            <!--end::Title-->
        </div>
        <!--end::Page title-->
    </div>
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container">
            <div class="row">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="container">
                            <div class="py-5 table-responsive">
                                <table id="kt_table_data"
                                    class="table table-striped table-rounded border border-gray-300 table-row-bordered table-row-gray-300">
                                    <thead class="text-center">
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Thumbnail</th>
                                            <th>Price</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Container-->
    </div>

    <!-- Modal Tambah Diskon -->
    <div class="modal fade" id="modalDiskon" tabindex="-1" aria-labelledby="modalDiskonLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="discountForm" method="POST">
                @csrf
                <input type="hidden" name="product_uuid" id="product_uuid">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDiskonLabel">Tambah Diskon Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Diskon (%)</label>
                            <input type="number" name="diskon_persen" id="diskon_persen" class="form-control"
                                placeholder="50%" min="1" max="100" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Berakhir Diskon</label>
                            <input type="datetime-local" name="akhir_tanggal" id="akhir_tanggal" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="saveDiscountBtn" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i>Simpan Diskon
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        let control = new Control();

        $(document).on('click', '#button-side-form', function() {
            window.location.href = '/admin/add-product';
        })

        $(document).on('click', '.button-update', function(e) {
            e.preventDefault();
            window.location.href = '/admin/edit-product/' + $(this).attr('data-uuid');
        })

        $(document).on('click', '.button-delete', function(e) {
            e.preventDefault();
            let url = '/admin/delete-product/' + $(this).attr('data-uuid');
            let label = $(this).attr('data-label');
            control.ajaxDelete(url, label)
        })

        // Event handler untuk tombol diskon
        $(document).on('click', '.button-discount', function(e) {
            e.preventDefault();

            let productUuid = $(this).attr('data-uuid');
            let productName = $(this).attr('data-product-name');

            // Set data ke modal
            $('#product_uuid').val(productUuid);
            $('#product_name').val(productName);

            // Reset form
            $('#diskon_persen').val('');
            $('#akhir_tanggal').val('');

            // Set minimum date to today
            let today = new Date().toISOString().split('T')[0];
            $('#akhir_tanggal').attr('min', today);

            // Show modal
            $('#modalDiskon').modal('show');
        });

        // Handle form submit
        $('#discountForm').on('submit', function(e) {
            e.preventDefault();

            let formData = {
                product_uuid: $('#product_uuid').val(),
                diskon_persen: $('#diskon_persen').val(),
                akhir_tanggal: $('#akhir_tanggal').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            // Disable button saat proses
            $('#saveDiscountBtn').prop('disabled', true).html(
                '<i class="fa fa-spinner fa-spin me-1"></i>Menyimpan...');

            $.ajax({
                url: '/admin/diskon-produk/store', // Fixed URL - was '/admin/diskon.store'
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#modalDiskon').modal('hide');

                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: 'Diskon berhasil ditambahkan',
                            showConfirmButton: false,
                            timer: 2000
                        });

                        // Reload datatable
                        $('#kt_table_data').DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: response.message || 'Terjadi kesalahan saat menyimpan diskon'
                        });
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Terjadi kesalahan saat menyimpan diskon';

                    if (xhr.responseJSON && xhr.responseJSON.errors) {
                        let errors = xhr.responseJSON.errors;
                        errorMessage = Object.values(errors).flat().join(', ');
                    } else if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: errorMessage
                    });

                    // Log error for debugging
                    console.log('Error details:', xhr.responseJSON);
                },
                complete: function() {
                    // Enable button kembali
                    $('#saveDiscountBtn').prop('disabled', false).html(
                        '<i class="fa fa-save me-1"></i>Simpan Diskon');
                }
            });
        });

        $(document).on('keyup', '#search_', function(e) {
            e.preventDefault();
            control.searchTable(this.value);
        })

        const initDatatable = async () => {
            // Destroy existing DataTable if it exists
            if ($.fn.DataTable.isDataTable('#kt_table_data')) {
                $('#kt_table_data').DataTable().clear().destroy();
            }

            // Initialize DataTable
            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                processing: true,
                ajax: '/admin/get-product',
                columns: [{
                    data: null,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }, {
                    data: 'judul_product',
                    className: 'text-center',
                }, {
                    data: 'thumbnail',
                    className: 'text-center',
                    render: function(data, type, row, meta) {
                        let result;
                        result =
                            `
                                <!--begin::Overlay-->
                                <a class="d-block overlay fancybox" data-fancybox="lightbox-group" href="{{ asset('/public/product-thumbnail/${data}') }}">
                                    <!--begin::Image-->
                                    <div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px"
                                        style="background-image:url('/public/product-thumbnail/${data}')">
                                    </div>
                                    <!--end::Image-->

                                    <!--begin::Action-->
                                    <div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow">
                                        <i class="bi bi-eye-fill text-white fs-3x"></i>
                                    </div>
                                    <!--end::Action-->
                                </a>
                                <!--end::Overlay-->
                            `;
                        return result;
                    }
                }, {
                    data: 'price',
                    className: 'text-center',
                }, {
                    data: 'nama_kategori',
                    className: 'text-center',
                }, {
                    data: 'uuid',
                }],
                columnDefs: [{
                    targets: -1,
                    title: 'Aksi',
                    width: '12rem',
                    orderable: false,
                    className: 'text-center',
                    render: function(data, type, full, meta) {
                        return `
                            <div class="d-flex gap-2" style="flex-flow: wrap;">
                                <a href="javascript:;" type="button" data-uuid="${data}" data-kt-drawer-show="true" data-kt-drawer-target="#side_form" class="btn btn-warning button-update btn-icon btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>

                                <a href="javascript:;" type="button" data-uuid="${data}" data-label="Product" class="btn btn-danger button-delete btn-icon btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>

                                <a href="javascript:;" type="button" data-uuid="${data}" data-product-name="${full.judul_product}" class="btn btn-success button-discount btn-icon btn-sm" title="Tambah Diskon">
                                    <i class="fa fa-percent"></i>
                                </a>
                            </div>
                        `;
                    },
                }],
                rowCallback: function(row, data, index) {
                    var api = this.api();
                    var startIndex = api.context[0]._iDisplayStart;
                    var rowIndex = startIndex + index + 1;
                    $('td', row).eq(0).html(rowIndex);
                },
            });
        };

        $(function() {
            initDatatable();
        });
    </script>
@endsection
