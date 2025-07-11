@extends('layouts.layout')
@section('button')
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
            data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
            class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <button class="btn btn-primary btn-sm " data-kt-drawer-show="true" data-kt-drawer-target="#side_form"
                id="button-side-form"><i class="fa fa-plus-circle" style="color:#ffffff" aria-hidden="true"></i> Tambah
                Data</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
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
    </div>

    <div class="modal fade" id="modalDiskon" tabindex="-1" aria-labelledby="modalDiskonLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="discountForm" method="POST">
                @csrf
                {{-- Method spoofing (PUT) akan ditambahkan oleh JS jika perlu --}}
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
                                placeholder="Contoh: 50" min="1" max="100" required>
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

    <div class="modal fade" id="modalBundle" tabindex="-1" aria-labelledby="modalBundleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="bundleForm" method="POST">
                @csrf
                <input type="hidden" name="bundle_uuid" id="bundle_uuid">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalBundleLabel">Atur Free Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Pilih Include Produk Free</label>
                            <select class="form-select" name="included_products[]" id="included_products" multiple required>
                                <!-- Akan diisi dinamis oleh JS -->
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" id="saveBundleBtn" class="btn btn-primary">
                            <i class="fa fa-save me-1"></i>Simpan Bundle
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Definisikan base URL aplikasi menggunakan helper Laravel.
        // Ini akan menghasilkan URL yang benar baik di lokal maupun di hosting.
        const APP_URL = "{{ url('/') }}";

        let control = new Control();

        // --- Event handler untuk tombol diskon (Logika Diperbarui) ---
        $(document).on('click', '.button-discount', function(e) {
            e.preventDefault();
            let productUuid = $(this).data('uuid');
            let form = $('#discountForm');
            let modal = $('#modalDiskon');
            let modalTitle = $('#modalDiskonLabel');
            let saveBtn = $('#saveDiscountBtn');

            form.find('input[name="_method"]').remove(); // Hapus method spoofing lama jika ada

            // Gunakan APP_URL yang sudah kita definisikan untuk membuat URL AJAX yang dinamis
            const checkUrl = `${APP_URL}/admin/diskon-produk/check/${productUuid}`;
            const storeUrl = `${APP_URL}/admin/diskon-produk/store`;
            const updateUrl = (discountUuid) => `${APP_URL}/admin/diskon-produk/update/${discountUuid}`;

            $.ajax({
                url: checkUrl, // URL yang sudah diperbaiki
                type: 'GET',
                success: function(response) {
                    $('#product_uuid').val(productUuid);

                    if (response.has_discount) {
                        modalTitle.text('Edit Diskon Produk');
                        saveBtn.html('<i class="fa fa-save me-1"></i>Update Diskon');
                        form.attr('action', updateUrl(response.discount_data.uuid));
                        form.prepend('<input type="hidden" name="_method" value="PUT">');
                        $('#diskon_persen').val(response.discount_data.diskon_persen);

                        // Pastikan format tanggal dari server sesuai untuk datetime-local
                        // Format yang dibutuhkan: YYYY-MM-DDTHH:mm
                        let tgl = response.discount_data.akhir_tanggal;
                        // Jika formatnya 'YYYY-MM-DD HH:mm:ss', ubah menjadi 'YYYY-MM-DDTHH:mm'
                        if (tgl && tgl.includes(' ')) {
                            tgl = tgl.substring(0, 16).replace(' ', 'T');
                        }
                        $('#akhir_tanggal').val(tgl);

                    } else {
                        modalTitle.text('Tambah Diskon Produk');
                        saveBtn.html('<i class="fa fa-save me-1"></i>Simpan Diskon');
                        form.attr('action', storeUrl);
                        form[0].reset();
                        $('#product_uuid').val(productUuid);
                    }

                    // --- PERBAIKAN LOGIKA WAKTU ---
                    // Kode ini akan membuat string waktu "saat ini" berdasarkan zona waktu Jakarta (WIB)
                    // dan mengaturnya sebagai nilai minimum pada input tanggal.
                    const nowInJakarta = new Date(new Date().toLocaleString("en-US", {
                        timeZone: "Asia/Jakarta"
                    }));

                    // Format tanggal ke dalam YYYY-MM-DDTHH:mm yang dibutuhkan oleh input datetime-local
                    const year = nowInJakarta.getFullYear();
                    const month = String(nowInJakarta.getMonth() + 1).padStart(2, '0');
                    const day = String(nowInJakarta.getDate()).padStart(2, '0');
                    const hours = String(nowInJakarta.getHours()).padStart(2, '0');
                    const minutes = String(nowInJakarta.getMinutes()).padStart(2, '0');

                    const jakartaMinTime = `${year}-${month}-${day}T${hours}:${minutes}`;

                    $('#akhir_tanggal').attr('min', jakartaMinTime);
                    // -------------------------------------------------------------------------

                    modal.modal('show');
                },
                error: function(xhr) { // Tambahkan xhr untuk melihat detail error
                    console.error("AJAX Error:", xhr.status, xhr.responseText); // Log error ke console
                    Swal.fire('Error',
                        'Gagal mengecek status diskon produk. Cek console browser untuk detail.',
                        'error');
                }
            });
        });

        // --- Event handler untuk submit form ---
        $('#discountForm').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let url = form.attr('action'); // URL sudah di-set dengan benar sebelumnya
            // Method POST selalu digunakan karena kita memakai _method:PUT untuk update
            let method = 'POST';
            let data = form.serialize();
            let saveBtn = $('#saveDiscountBtn');

            saveBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-1"></i>Menyimpan...');

            $.ajax({
                url: url,
                type: method,
                data: data,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#modalDiskon').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#kt_table_data').DataTable().ajax.reload();
                    } else {
                        Swal.fire('Gagal!', response.message || 'Terjadi kesalahan.', 'error');
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Terjadi kesalahan. Silakan coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire('Gagal!', errorMessage, 'error');
                },
                complete: function() {
                    // Cek title modal untuk menentukan teks tombol
                    let originalButtonText = $('#modalDiskonLabel').text().includes('Edit') ?
                        'Update Diskon' : 'Simpan Diskon';
                    saveBtn.prop('disabled', false).html(
                        `<i class="fa fa-save me-1"></i>${originalButtonText}`);
                }
            });
        });

        // --- Sisa Script Anda (Tidak ada perubahan signifikan) ---
        $(document).on('click', '#button-side-form', function() {
            window.location.href = `${APP_URL}/admin/add-product`;
        });

        $(document).on('click', '.button-delete', function(e) {
            e.preventDefault();
            let url = `${APP_URL}/admin/delete-product/` + $(this).attr('data-uuid');
            let label = $(this).attr('data-label');
            control.ajaxDelete(url, label);
        });

        const initDatatable = async () => {
            if ($.fn.DataTable.isDataTable('#kt_table_data')) {
                $('#kt_table_data').DataTable().clear().destroy();
            }
            $('#kt_table_data').DataTable({
                responsive: true,
                pageLength: 10,
                order: [
                    [0, 'asc']
                ],
                processing: true,
                ajax: `${APP_URL}/admin/get-product`, // Perbaiki URL di sini juga
                columns: [{
                        data: null,
                        render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1
                    },
                    {
                        data: 'judul_product',
                        className: 'text-center'
                    },
                    {
                        data: 'thumbnail',
                        className: 'text-center',
                        render: (data) =>
                            `<a class="d-block overlay fancybox" data-fancybox="lightbox-group" href="${APP_URL}/public/product-thumbnail/${data}"><div class="overlay-wrapper bgi-no-repeat bgi-position-center bgi-size-cover card-rounded min-h-175px" style="background-image:url('${APP_URL}/public/product-thumbnail/${data}')"></div><div class="overlay-layer card-rounded bg-dark bg-opacity-25 shadow"><i class="bi bi-eye-fill text-white fs-3x"></i></div></a>`
                    },
                    {
                        data: 'price',
                        className: 'text-center'
                    },
                    {
                        data: 'nama_kategori',
                        className: 'text-center'
                    },
                    {
                        data: 'uuid',
                    }
                ],
                columnDefs: [{
                    targets: -1,
                    title: 'Aksi',
                    width: '12rem',
                    orderable: false,
                    className: 'text-center',
                    render: function(data, type, full, meta) {

                        const editUrl = `${APP_URL}/admin/edit-product/${data}`;
                        return `
                            <div class="d-flex gap-2" style="flex-flow: wrap;">
                                <a href="${editUrl}" class="btn btn-warning btn-icon btn-sm" title="Edit Produk">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="javascript:;" type="button" data-uuid="${data}" data-label="Product" class="btn btn-danger button-delete btn-icon btn-sm" title="Hapus Produk">
                                    <i class="fa fa-trash"></i>
                                </a>
                                <a href="javascript:;" type="button" data-uuid="${data}" class="btn btn-success button-discount btn-icon btn-sm" title="Atur Diskon">
                                    <i class="fa fa-percent"></i>
                                </a>
                                ${full.nama_kategori && full.nama_kategori.toLowerCase().trim() === 'bundle' ? `
                                                    <a href="javascript:;" type="button" data-uuid="${data}" class="btn btn-info button-bundle btn-icon btn-sm" title="Atur Bundle">
                                                        <i class="fa fa-box"></i>
                                                    </a>` : ''}
                            </div>
                        `;
                    },
                }],
            });
        };

        // Event handler tombol Atur Bundle
        $(document).on('click', '.button-bundle', function(e) {
            e.preventDefault();
            let productUuid = $(this).data('uuid');
            let form = $('#bundleForm');
            let modal = $('#modalBundle');
            let saveBtn = $('#saveBundleBtn');

            form.find('input[name="_method"]').remove();
            $('#bundle_uuid').val(productUuid);

            // Kosongkan multiselect
            $('#included_products').empty();

            const fetchUrl = `${APP_URL}/admin/bundle/get/${productUuid}`;
            const saveUrl = `${APP_URL}/admin/bundle/store`;

            $.ajax({
                url: fetchUrl,
                type: 'GET',
                success: function(response) {
                    response.all_free_products.forEach((product) => {
                        let selected = response.selected_products.includes(product.uuid) ?
                            'selected' : '';
                        $('#included_products').append(
                            `<option value="${product.uuid}" ${selected}>${product.judul_product}</option>`
                        );
                    });

                    form.attr('action', saveUrl);
                    modal.modal('show');
                },
                error: function(xhr) {
                    console.error("AJAX Error:", xhr.status, xhr.responseText);
                    Swal.fire('Error', 'Gagal memuat data produk bundle.', 'error');
                }
            });
        });

        // Submit form Bundle
        $('#bundleForm').on('submit', function(e) {
            e.preventDefault();
            let form = $(this);
            let url = form.attr('action');
            let data = form.serialize();
            let saveBtn = $('#saveBundleBtn');

            saveBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin me-1"></i>Menyimpan...');

            $.ajax({
                url: url,
                type: 'POST',
                data: data,
                success: function(response) {
                    if (response.status === 'success') {
                        $('#modalBundle').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#kt_table_data').DataTable().ajax.reload();
                    } else {
                        Swal.fire('Gagal!', response.message || 'Terjadi kesalahan.', 'error');
                    }
                },
                error: function(xhr) {
                    let errorMessage = 'Terjadi kesalahan.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }
                    Swal.fire('Gagal!', errorMessage, 'error');
                },
                complete: function() {
                    saveBtn.prop('disabled', false).html(
                        '<i class="fa fa-save me-1"></i>Simpan Bundle');
                }
            });
        });

        $(function() {
            initDatatable();
        });
    </script>
@endsection
