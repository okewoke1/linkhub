</div>

<!-- Footer -->
<footer class="sticky-footer bg-gray-400">
    <div class="container my-auto">
        <div class="copyright text-center my-auto text-gray-900">
            <span>Copyright &copy;2024. Badan Pusat Statistik Kabupaten Sekadau</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/demo/datatables-demo.js"></script>

<script src="<?php echo base_url() ?>/assets/js/"></script>


<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>/assets/sweetalert2/sweetalert2.min.js"></script>
<script src="<?php echo base_url() ?>/assets/toastr/toastr.min.js"></script>

<!-- Sertakan jQuery dan jQuery UI (untuk autocomplete) -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- SCRIPT CIPTAAN -->
<script src="<?php echo base_url() ?>/assets/js/autocomplete.js"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

<!-- DataTables JS dan ekstensi Buttons -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<!-- PDFMake (untuk ekspor PDF) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>

<!-- Ekstensi Column Visibility -->
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>


<!-- JSZip (untuk ekspor Excel) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<!-- Library Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<!-- Initialize DataTable -->
// <script>
//     $(document).ready(function() {
//         $('#tabel_spk').DataTable({
//             dom: 'Blfrtip', // Enables buttons
//             buttons: [
//                 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
//             ]
//         });
//     });
// </script>

<script>
        $(document).ready(function() {
            $('#table_dashboard1').DataTable();  
            $('#table_dashboard2').DataTable();  
            $('#table_dashboard3').DataTable();  
            $('#tabel_bast').DataTable(); 
        });

</script>


<script>
$(document).ready(function() {
    $('#tabel_spk').DataTable({
        dom: 'Blfrtip', // B: Buttons, l: Length Menu, f: Filter, r: Processing, t: Table, p: Pagination
        // dom: '<"row"<"col-sm-1"B><"col-sm-9"l><"col-sm-2"f>>' + // Menempatkan tombol, menu panjang, dan filter dalam satu baris
        //      't' + // Tabel
        //     //  '<"row"<"col-sm-12"p>>', 
        //     'p',
        //      // Pagination di bawah tabel
        buttons: [
            {
                extend: 'excelHtml5',
                text: 'Excel', // Teks tombol
                title: 'Data Export', // Judul file Excel
                exportOptions: {
                    columns: ':visible' // Ekspor hanya kolom yang terlihat
                }
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF', // Teks tombol
                title: 'Data Export', // Judul file PDF
                orientation: 'landscape', // Orientasi halaman PDF
                pageSize: 'A4',
                exportOptions: {
                    columns: ':visible' // Ekspor hanya kolom yang terlihat
                },
                customize: function(doc) {
                    doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split(''); // Mengatur lebar tabel otomatis
                }
            }
        ],
        
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]], // Opsi jumlah baris per halaman
        pageLength: 10 // Jumlah baris default pada halaman pertama
    });
});
</script>


<script>
$(document).ready(function() {
    $('#tabel_perkegiatan').DataTable({
        dom: 'Blfrtip', // B: Buttons, l: Length Menu, f: Filter, r: Processing, t: Table, p: Pagination
         buttons: [
            {
                extend: 'excelHtml5',
                text: 'Excel', // Teks tombol
                className: 'btn btn-success btn-sm mx-1' // Styling Bootstrap
            },
            {
                extend: 'pdfHtml5',
                text: 'PDF', // Teks tombol
                className: 'btn btn-danger btn-sm mx-1',
                orientation: 'landscape', // Orientasi halaman PDF
                pageSize: 'A4'
            },

        ],
        
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ], // Opsi jumlah baris
        pageLength: 10 // Jumlah baris default
    });
});
</script>



<style>
    @media (max-width: 576px) {
        .btn-text {
        display: none;
        }
    }
</style>


<script>
    $(document).ready(function() {
        $('.view-detail').on('click', function() {
            const spkData = JSON.parse($(this).attr('data-spk'));
            let details = '';

            // Format rincian tugas dalam bentuk tabel
            details += '<table class="table">';
            details += '<thead><tr><th>No</th><th>Uraian Tugas</th><th>Volume</th><th>Satuan</th><th>Nilai Perjanjian</th></tr></thead>';
            details += '<tbody>';

            spkData.rincian_tugas.forEach(function(rinci, index) {
                details += `<tr>
                                <td style="text-align: center;vertical-align: middle;">${index + 1}</td> <!-- Menambahkan nomor -->
                                <td style="width:200px;text-align: left;vertical-align: middle;">${rinci.uraian_tugas}</td>
                                <td style="text-align: center;vertical-align: middle;">${rinci.volume}</td>
                                <td style="text-align: center;vertical-align: middle;">${rinci.satuan}</td>
                                <td style="text-align: center;vertical-align: middle;">Rp. ${new Intl.NumberFormat('id-ID').format(rinci.nilai_perjanjian)}</td>
                            </tr>`;
            });

            details += '</tbody>';
            details += `<tfoot>
                            <tr>
                                <td></td><td></td><td></td>
                                <td><strong>Total:</strong></td>
                                <td><b>Rp. ${new Intl.NumberFormat('id-ID').format(spkData.total_perjanjian)}</b></td> <!-- Mengambil total dari spkData -->
                            </tr>
                        </tfoot>`; // Menambahkan total di bagian bawah tabel
            details += '</table>';

            Swal.fire({
                title: `Rincian Tugas untuk No SPK: ${spkData.no_spk}`,
                html: details,
                icon: 'info',
                showCloseButton: true,
                showCancelButton: false,
                focusConfirm: false,
                confirmButtonText: 'Tutup',
                width: '800px',  // Menambah lebar popup
                customClass: {
                    popup: 'swal-custom-popup', // Menambahkan kelas kustom untuk popup
                    title: 'swal-custom-title', // Menambahkan kelas kustom untuk judul
                    html: 'swal-custom-html' // Menambahkan kelas kustom untuk konten
                }
            }).then((result) => {
                // Menutup SweetAlert ketika tombol 'Tutup' ditekan
                if (result.isConfirmed) {
                    Swal.close();
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $(document).on('click', '.view-detail_mitra', function() { // Gunakan event delegation
            const spkData = JSON.parse($(this).attr('data-spk') || '{}'); // Cegah error jika data kosong

            // Debugging: Periksa apakah data ada atau tidak
            console.log("SPK Data:", spkData);

            if (!spkData.rincian_tugas || spkData.rincian_tugas.length === 0) {
                Swal.fire({
                    title: "Error",
                    text: "Data rincian tugas tidak ditemukan!",
                    icon: "error"
                });
                return;
            }

            let details = '';

            details += '<table class="table">';
            details += '<thead><tr><th>No</th><th>Uraian Tugas</th><th>Volume</th><th>Satuan</th><th>Nilai Perjanjian</th></tr></thead>';
            details += '<tbody>';

            spkData.rincian_tugas.forEach(function(rinci, index) {
                details += `<tr>
                            <td style="text-align: center;vertical-align: middle;">${index + 1}</td>
                            <td style="width:400px;text-align: left;vertical-align: middle;">${rinci.uraian_tugas}</td>
                            <td style="text-align: center;vertical-align: middle;">${rinci.volume}</td>
                            <td style="text-align: center;vertical-align: middle;">${rinci.satuan}</td>
                            <td style="text-align: center;vertical-align: middle;">Rp. ${new Intl.NumberFormat('id-ID').format(rinci.nilai_perjanjian)}</td>
                        </tr>`;
            });

            details += '</tbody>';
            details += `<tfoot>
                        <tr>
                            <td></td><td></td><td></td>
                            <td><strong>Total:</strong></td>
                            <td><b>Rp. ${new Intl.NumberFormat('id-ID').format(spkData.total_perjanjian || 0)}</b></td>
                        </tr>
                    </tfoot>`;
            details += '</table>';

            Swal.fire({
                title: `Rincian Tugas untuk No SPK: ${spkData.no_spk || 'N/A'}`,
                html: details,
                icon: 'info',
                showCloseButton: true,
                confirmButtonText: 'Tutup',
                width: '1000px',
                customClass: {
                    popup: 'swal-custom-popup', // Menambahkan kelas kustom untuk popup
                    title: 'swal-custom-title', // Menambahkan kelas kustom untuk judul
                    html: 'swal-custom-html' // Menambahkan kelas kustom untuk konten
                }
            });

        });
    });
</script>


<style>
    /* CSS untuk mengubah ukuran font dan lebar SweetAlert */
    .swal-custom-popup {
        font-size: 14px; /* Menentukan ukuran font yang lebih kecil */
    }

    .swal-custom-title {
        font-size: 18px; /* Ukuran font untuk judul */
        font-weight: bold; /* Mengatur ketebalan font judul */
    }

    .swal-custom-html {
        overflow-x: auto; /* Agar tabel tidak melampaui batas */
    }
</style>



<style>
  .button-group a {
    margin-left: 10px;
  }
</style>

<script>
    $(document).ready(function() {
        $('.toggle-detail').on('click', function() {
            var target = $(this).data('target');
            $(target).toggleClass('collapse'); // Toggle the collapse class
            $(this).find('i').toggleClass('fa-plus fa-minus'); // Change the icon
        });
    });
</script>

<style>
    .toast-top-right-custom {
        top: 5px;
        right: 15px;
        bottom: auto;
        /* Adjust this value to move it up or down */
        left: auto;
    }

     .list-group {
        max-height: 200px; /* Atur tinggi maksimum */
        overflow-y: auto; /* Aktifkan scroll */
        border: 1px solid #ddd; /* Tambahkan border untuk visibilitas */
        background-color: white; /* Warna latar belakang */
        position: absolute; /* Posisi di bawah input */
        width: calc(29%); /* Sesuaikan lebar sesuai dengan textbox */
        /* Ganti 20px dengan margin/padding yang sesuai */
    }

    .list-group-item {
        cursor: pointer; /* Ubah kursor saat hover */
    }

    .list-group-item:hover {
        background-color: #f1f1f1; /* Ubah latar belakang saat hover */
    }
</style>

<!-- Tambahkan JavaScript untuk tombol kembali -->
<script>
    $(document).ready(function() {
        $('#kembaliBtn').click(function() {
            // Menggunakan JavaScript untuk kembali ke halaman sebelumnya
            window.history.back();
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Fungsi untuk mengubah string ke format title case
        function toTitleCase(str) {
            return str.replace(/\w\S*/g, function(txt) {
                return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
            });
        }

        $("#nama_mitra").on("input", function() {
            let query = $(this).val();

            if (query.length >= 2) {
                // Mulai mencari jika 2 atau lebih karakter dimasukkan
                $.ajax({
                    url: '<?php echo site_url("kontrak/autocomplete"); ?>', // Endpoint untuk mencari mitra
                    method: "GET",
                    data: {
                        query: query,
                    },
                    dataType: "json",
                    success: function(data) {
                        let list = $("#nama_mitra_list");
                        list.empty(); // Bersihkan hasil sebelumnya

                        if (data.length > 0) {
                            data.forEach(function(item) {
                                let namaMitraFormatted = toTitleCase(item.nama_mitra); // Format nama mitra
                                list.append('<a href="#" class="list-group-item list-group-item-action" data-nama="' + namaMitraFormatted + '" data-id="' + item.id_sobat + '" data-telp="' + item.telp + '">' + namaMitraFormatted + "</a>");
                            });
                            list.show();
                        } else {
                            list.hide();
                        }
                    },
                });
            } else {
                $("#nama_mitra_list").hide(); // Sembunyikan daftar jika kurang dari 2 karakter
            }
        });

        // Sembunyikan daftar saat mengklik di luar
        $(document).on("click", function(e) {
            if (!$(e.target).closest("#nama_mitra").length) {
                $("#nama_mitra_list").hide();
            }
        });

        // Atur nilai input dan sembunyikan daftar saat dipilih
        $(document).on("click", ".list-group-item", function() {
            $("#nama_mitra").val($(this).data("nama")); // Mengambil nama dari data
            $("#id_sobat").val($(this).data("id")); // Mengambil ID dari data
            $("#id_sobat_telp").val($(this).data("id") + " / " + $(this).data("telp")); // Mengambil nomor telepon dari data
            $("#nama_mitra_list").hide(); // Sembunyikan daftar
        });
    });
</script>


<script>
    $(function() {
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right-custom",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000", // Set timer here (2000ms = 2 seconds)
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };
    });
</script>

<script>
    $(document).ready(function() {
        $('#uploadForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                url: '<?php echo base_url('mitra/import_mitra'); ?>',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    var res = JSON.parse(response);
                    if (res.status === 'success') {
                        toastr.success(res.message);
                        // Jeda 3 detik
                        setTimeout(function() {
                            location.reload(); // Me-refresh halaman setelah 3 detik
                        }, 1000);
                    } else {
                        toastr.error(res.message);
                    }
                    $('#importModal').modal('hide');
                },
                error: function() {
                    toastr.error('Gagal mengunggah file.');
                }
            });
        });
    });
</script>


<!-- EDIT KEGIATAN -->
<script>
    $(document).ready(function() {
        // Fetch kelompok_anggaran on page load
        $.ajax({
            url: "<?php echo base_url('kontrak/tampil_kelompok_anggaran'); ?>",
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                // $('#kelompok_anggaran').empty();
                // $('#kelompok_anggaran').append('<option selected="0">Pilih Kelompok Anggaran</option>');
                $.each(response, function(index, item) {
                    $('#kelompok_anggaran').append('<option value="' + item.kelompok_anggaran + '">' + item.kelompok_anggaran + '</option>');
                });
            },
            error: function() {
                console.error("Error fetching data.");
            }
        });

        // Populate uraian_tugas based on selected kelompok_anggaran
        $('#kelompok_anggaran').change(function() {
            var kelompok_anggaran = $(this).val();
            $.ajax({
                url: "<?php echo base_url('kontrak/tampil_kegiatan_by_kelompok_anggaran'); ?>",
                method: 'POST',
                data: {
                    kelompok_anggaran: kelompok_anggaran
                },
                dataType: 'json',
                success: function(response) {
                    $('#uraian_tugas').prop('disabled', false);
                    $('#uraian_tugas').empty();
                    $('#uraian_tugas').append('<option selected="0">Pilih Kegiatan</option>');
                    $.each(response, function(index, item) {
                        $('#uraian_tugas').append('<option value="' + item.id_tugas + '">' + item.uraian_tugas + ' @' + format_rupiah(item.honor) + '</option>');
                    });
                },
                error: function() {
                    console.error("Error fetching data.");
                }
            });
        });
    });

    function format_rupiah(amount) {
        var number_string = amount.toString(),
            sisa = number_string.length % 3,
            rupiah = number_string.substr(0, sisa),
            ribuan = number_string.substr(sisa).match(/\d{3}/g);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        return rupiah;
    }
</script>



<!-- SCRIPT BAGIAN TUGAS  -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#uraian_tugas').change(function() {
            var id_tugas = $('#uraian_tugas').val();
            if (id_tugas != '') {
                $.ajax({
                    url: "<?php echo base_url() ?>kontrak/autofill_tugas",
                    method: "POST",
                    data: {
                        id_tugas: id_tugas,
                        // jenis_kegiatan: jenis_kegiatan
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#id_tugas').val(data[0].id_tugas);
                        $('#satuan').val(data[0].satuan);
                        $('#honor').val(data[0].honor);
                        $('#kode_anggaran').val(data[0].kode_anggaran);
                        $('#rincian_anggaran').val(data[0].rincian_anggaran);
                        $('#volume').val('');
                        $('#jumlah').val('');


                    }
                });
            }
        });
    });
</script>

<script>
    function perkalian() {
        var honor = document.getElementById('honor').value;
        var volume = document.getElementById('volume').value;
        jumlah = honor * volume;

        document.getElementById('jumlah').value = jumlah;
    };
</script>
<script>
    function angka() {
        var volumeInput = document.getElementById('volume');
        // Remove any non-numeric characters
        volumeInput.value = volumeInput.value.replace(/[^0-9]/g, '');
    }
</script>


<script>
    $(document).ready(function() {
        $('#simpan').click(function() {
            var t_spk = $('#keyword').val();
            var t_idmitra = $('#id_sobat').val();
            var id_tugas = $('#id_tugas').val();
            var volume = $('#volume').val();
            var jumlah = $('#jumlah').val();

            // Periksa apakah input kosong
            if (t_spk == '' || t_idmitra == '' || id_tugas == '') {
                // Tampilkan pesan error jika ada input yang kosong
                toastr.warning('Mohon lengkapi semua kolom!');
                return; // Hentikan proses jika ada input yang kosong
            }
            if (volume == '') {
                // Tampilkan pesan error jika ada input yang kosong
                toastr.warning('Pada Kolom Qty tidak Boleh Kosong!');
                return; // Hentikan proses jika ada input yang kosong
            }
            if (volume == 0) {
                // Tampilkan pesan error jika ada input yang kosong
                toastr.warning('Nilai Pada Kolom Qty tidak Boleh 0 !');
                return; // Hentikan proses jika ada input yang kosong
            }
            if (jumlah == 0) {
                toastr.warning('Belum ada Kegiatan!, mohon di lengkapi dahulu!');
                return false; // Stop the form from being submitted
            }

            $.ajax({
                url: "<?php echo base_url('kontrak/simpan_data'); ?>",
                method: 'post',
                data: {
                    t_spk: t_spk,
                    t_idmitra: t_idmitra,
                    id_tugas: id_tugas,
                    volume: volume,
                    jumlah: jumlah
                },
                success: function(response) {
                    $('#uraian_tugas').val('Pilih Kegiatan');
                    $('#id_tugas').val('');
                    $('#kode_anggaran').val('');
                    $('#satuan').val('');
                    $('#honor').val('');
                    $('#volume').val('');
                    $('#jumlah').val('');

                    // Tampilkan pesan popup jika respons berhasil
                    toastr.success("Berhasil menambahkan kegiatan");
                    $('.update').prop('disabled', false);
                },
                error: function(xhr, status, error) {
                    // Tangani kesalahan jika terjadi
                    console.error(xhr.responseText);
                    toastr.warning("Terjadi kesalahan saat menyimpan data ke database.");
                }
            });
        });
    });
</script>



<!-- // Fungsi untuk menampilkan data secara real-time -->
<script>
    $(document).ready(function() {
        function tampilkanData(keyword) {
            $.ajax({
                url: "<?php echo base_url('kontrak/tampil_data'); ?>",
                method: 'post',
                data: {
                    keyword: keyword
                },
                dataType: 'json',
                success: function(response) {
                    var tbody = '';
                    var total_jumlah = 0;
                    
                    $.each(response, function(index, row) {
                        var jabatanLengkap = '';
    
                        // Cek nilai jabatan dan tampilkan dalam bentuk lengkap
                        if (row.jabatan == 'PPL') {
                            jabatanLengkap = 'Petugas Pendataan Lapangan';
                        } else if (row.jabatan == 'PML') {
                            jabatanLengkap = 'Petugas Pemeriksa Lapangan';
                        } else if (row.jabatan == 'PPD') {
                            jabatanLengkap = 'Petugas Pengolahan Data';
                        } else {
                            jabatanLengkap = 'Jabatan Tidak Diketahui';
                        }
                        
                        tbody += '<tr>';
                        tbody += '<td>' + row.no_spk + '</td>';
                        tbody += '<td>' + jabatanLengkap + ' | ' + row.uraian_tugas + ' | ' + row.kelompok_anggaran + '</td>'; // Ganti dengan nama lengkap jabatan
                        // tbody += '<td>' + row.kelompok_anggaran + '</td>';
                        tbody += '<td>' + row.satuan + '</td>';
                        tbody += '<td>' + formatRupiah(row.honor) + '</td>';
                        tbody += '<td>' + row.volume + '</td>';
                        tbody += '<td>' + formatRupiah(row.nilai_perjanjian) + '</td>';
                        tbody += '<td><div class="btn btn-danger btn-sm btn-hapus" data-no_spk="' + row.no_spk + '" data-id_tugas="' + row.id_tugas + '"><i class="fa fa-trash"></i></div></td>';
                        tbody += '</tr>';
                        total_jumlah += parseInt(row.nilai_perjanjian.replace(/\D/g, ''));
                    });
                    var jenis_kegiatan = $('#jenis_kegiatan').val();
                    var batas_total_jumlah = 3700000; // Default threshold

                    // if (jenis_kegiatan === 'pengolahan') {
                    //     batas_total_jumlah = 3490000;
                    // } else if (jenis_kegiatan === 'lapangan') {
                    //     batas_total_jumlah = 3773000;
                    // }

                    if (total_jumlah >= batas_total_jumlah) {
                        toastr.warning('Total Jumlah Sudah Melebihi batas Anggaran (' + formatRupiah(batas_total_jumlah) + ')');
                    }

                    $('#tampil_data tbody').html(tbody);
                    $('#total_jumlah').text(formatRupiah(total_jumlah));
                    $('#terbilang').text(terbilang(total_jumlah));

                }
            });
        }

        // Atur interval untuk memperbarui data setiap 5 detik
        setInterval(function() {
            var keyword = $('#keyword').val();
            tampilkanData(keyword);

            // });
        }, 1000);
        // interval dalam milidetik(misalnya: 5000 untuk 5 detik)

        // Memanggil fungsi tampilkanData saat input teks berubah
        $('#keyword').on('input', function() {
            var keyword = $(this).val();
            tampilkanData(keyword);
        });

        // Fungsi untuk memformat angka menjadi format rupiah
        function formatRupiah(angka) {
            var bilangan = angka.toString().replace(/[^,\d]/g, '');
            var number_string = bilangan.toString().replace(',', '.');
            var split = number_string.split('.');
            var sisa = split[0].length % 3;
            var rupiah = split[0].substr(0, sisa);
            var ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return 'Rp ' + rupiah;
        }

        // Fungsi untuk mengonversi angka menjadi terbilang
        function terbilang(angka) {
            var bilangan = angka.toString();
            var huruf = ["Nol", " Satu", " Dua", " Tiga", " Empat", " Lima", " Enam", " Tujuh", " Delapan", " Sembilan"];
            var satuan = ["", " Ribu", " Juta", "Miliar", "Triliun"];
            var terbilang = "";

            var panjang = bilangan.length;
            var modulus = panjang % 3;
            var pembagian = Math.floor(panjang / 3);

            if (modulus == 1) {
                bilangan = "00" + bilangan;
                pembagian++;
            } else if (modulus == 2) {
                bilangan = "0" + bilangan;
                pembagian++;
            }

            var posisi = 0;
            var grup = [];
            for (var i = 0; i < pembagian; i++) {
                grup[i] = parseInt(bilangan.substr(posisi, 3));
                posisi += 3;
            }

            for (var i = 0; i < pembagian; i++) {
                var nilai = grup[i];
                var nilaiStr = nilai.toString();
                var grupTerbilang = "";

                var ribuan = Math.floor(nilai / 100);
                var ratusan = Math.floor((nilai % 100) / 10);
                var puluhan = Math.floor(nilai % 10);

                if (ribuan > 0) {
                    if (ribuan == 1) grupTerbilang += " Seratus";
                    else grupTerbilang += huruf[ribuan] + " Ratus ";
                }

                if (ratusan > 0) {
                    if (ratusan == 1) {
                        if (puluhan == 0) grupTerbilang += " Sepuluh";
                        else if (puluhan == 1) grupTerbilang += " Sebelas";
                        else grupTerbilang += huruf[puluhan] + "belas";
                    } else grupTerbilang += huruf[ratusan] + " Puluh ";
                }

                if (puluhan > 0 && ratusan != 1) grupTerbilang += huruf[puluhan];
                if (nilai > 0) grupTerbilang += " " + satuan[pembagian - i - 1];

                terbilang += grupTerbilang;

            }

            return 'Terbilang : "' + terbilang + ' Rupiah "';
        }
        // Event untuk menghapus data ketika tombol hapus diklik
        $(document).on('click', '.btn-hapus', function() {
            var noSpk = $(this).data('no_spk');
            var idTugas = $(this).data('id_tugas');
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                $.ajax({
                    url: '<?php echo base_url('kontrak/hapus_data'); ?>',
                    method: 'post',
                    data: {
                        no_spk: noSpk,
                        id_tugas: idTugas
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Tampilkan pesan sukses atau error
                        toastr.success(response.message);
                        // Perbarui tampilan data
                        tampilkanData($('#keyword').val());
                    }
                });
            }
        });
    });
</script>

<script>
    function voc_vol() {
        $('#volume').focus();
    }
</script>
<script>
    $(document).ready(function() {
        $('#generate').click(function() {
            var tanggal_spk = $('#tgl_spk').val();
            var id_sobat = $('#id_sobat').val();
            var ppk = $('#ppk').val();

            // Periksa apakah input kosong
            if (id_sobat == '') {
                // Tampilkan pesan error jika ada input yang kosong
                $('#nama_mitra').focus();
                toastr.error('Mitra Belum Dipilih!');
                return; // Hentikan proses jika ada input yang kosong
            }
            if (tanggal_spk == '') {
                // Tampilkan pesan error jika ada input yang kosong
                $('#tgl_spk').focus();
                toastr.error('Tanggal SPK Belum Diisi!');
                return; // Hentikan proses jika ada input yang kosong
            }
            if (ppk == 0) {
                // Tampilkan pesan error jika ada input yang kosong
                $('#ppk').focus();
                toastr.error('Nama Penjabat Pembuat Komitmen Belum Diisi!');
                return; // Hentikan proses jika ada input yang kosong
            }

             $.ajax({
                url: '<?php echo base_url("kontrak/generate"); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    tanggal_spk: tanggal_spk,
                    id_sobat: id_sobat,
                    ppk: ppk
                },
               
                success: function(response) {
                    // Cek apakah respons memiliki error
                    if (response.error) {
                        // Menampilkan SweetAlert jika ada error
                        Swal.fire({
                            title: 'Mitra Tersebut Sudah Terdata Dibulan ini',
                            text: response.error, // Pesan error
                            icon: 'warning',
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Ya',
                            cancelButtonText: 'Tidak',
                            width: '600px'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Arahkan ke halaman edit dengan URL yang ditentukan
                                var editUrl = '<?php echo base_url("daftarspk/edit_spk/"); ?>' + 
                                                response.spk_number.substr(0, 4) + '-' + 
                                                response.tanggal_spk; // Format URL yang diinginkan
                                window.location.href = editUrl;
                            }
                        });
                    } else if (response.spk_number) {
                        $('#keyword').val(response.spk_number); // Tampilkan SPK jika sukses
                        Swal.fire({
                            title: 'SPK berhasil dibuat!',
                            text: 'Nomor SPK: ' + response.spk_number,
                            icon: 'success',
                            confirmButtonText: 'Tutup',
                            width: '600px'
                        });
                        // Menonaktifkan input
                        $('#keyword').prop('disabled', true);
                        $('#nama_mitra').prop('disabled', true);
                        $('#tgl_spk').prop('disabled', true);
                        $('#ppk').prop('disabled', true);
                        $('#generate').prop('disabled', true);
                         

                        // Mengaktifkan input
                        $('#uraian_tugas').prop('disabled', false);
                        $('#volume').prop('disabled', false);
                        $('#simpan').prop('disabled', false);
                        $('#kelompok_anggaran').prop('disabled', false);
                        $('#uraian_tugas').focus();
                    }
                },
                error: function(xhr, status, error) {
                    var errorMessage = 'An error occurred. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.error) {
                        errorMessage = xhr.responseJSON.error; // Ambil pesan error dari response JSON
                    } else if (xhr.responseText) {
                        errorMessage = xhr.responseText; // Ambil dari responseText jika tidak berbentuk JSON
                    }
                    toastr.error(errorMessage); // Tampilkan pesan error dari server
                }

            });
        });
    });
</script>

<script>
    var isDataUnsaved = false;

    // Set isDataUnsaved to true when any form input changes
    $('#keyword, #tgl_spk, #ppk, #total_jumlah, #id_sobat').on('input', function() {
        isDataUnsaved = true;
    });

    window.addEventListener('beforeunload', function(e) {
        if (isDataUnsaved) {
            var confirmationMessage = 'You have unsaved changes. Are you sure you want to leave this page?';

            e.returnValue = confirmationMessage; // Standard for most browsers
            return confirmationMessage; // For older browsers
        }
    });

    function simpan_spk() {
        var t_idmitra = $('#id_sobat').val();
        var no_spk = $('#keyword').val();
        var tanggal_spk = $('#tgl_spk').val();
        var ppk = $('#ppk').val();
        var total_perjanjian_text = $('#total_jumlah').text();

        // Menghapus tanda titik (.) dan "Rp" dari angka
        var total_perjanjian_number = total_perjanjian_text.replace('Rp ', '').replace(/\./g, '');

        // Mengonversi string menjadi angka
        var total_perjanjian = parseFloat(total_perjanjian_number);
        var id_sobat = $('#id_sobat').val();

        // Periksa apakah input kosong
        if (no_spk == '' || t_idmitra == '' || id_tugas == '' || volume == '') {
            toastr.warning('Mohon lengkapi semua kolom!');
            return; // Hentikan proses jika ada input yang kosong
        }
        if (total_perjanjian <= 0) {
            toastr.warning('Belum ada Kegiatan!, mohon di lengkapi dahulu!');
            return false; // Stop the form from being submitted
        }

        // Menonaktifkan input
        $('#uraian_tugas').prop('disabled', true);
        $('#volume').prop('disabled', true);
        $('#simpan').prop('disabled', true);

        $.ajax({
            url: '<?php echo base_url("kontrak/simpan_spk"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                no_spk: no_spk,
                tanggal_spk: tanggal_spk,
                total_perjanjian: total_perjanjian,
                id_sobat: id_sobat,
                ppk: ppk
            },
            success: function(response) {
                if (response.status == 'success') {
                    toastr.success('Data berhasil disimpan.');
                    isDataUnsaved = false; // Reset the unsaved data flag

                    // location.reload(); // Me-refresh halaman setelah 3 detik


                    // if (confirm('Apakah Anda ingin melihat daftar SPK?')) {
                    //     setTimeout(function() {
                    //         window.location.href = "<?php echo site_url('daftarspk'); ?>";
                    //     }, 1000);
                    // }

                    // Membersihkan form isian
                    $('#keyword').val('');
                    $('#tgl_spk').val('');
                    $('#total_jumlah').text('');
                    $('#id_sobat_telp').val('');
                    $('#ppk').val('');
                    $('#nama_mitra').val('');
                    $('#id_sobat').val('');
                    $('#jenis_kegiatan').val('Pilih Kegiatan');

                    $('#nama_mitra').prop('disabled', false);
                    $('#tgl_spk').prop('disabled', false);
                    $('#ppk').prop('disabled', false);
                    $('#generate').prop('disabled', false);
                } else {
                    toastr.error('Gagal menyimpan data. Silakan coba lagi.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                toastr.warning('Terjadi kesalahan saat menyimpan data.');
            }
        });
    }
</script>


<script>
    var isDataUnsaved = false;

    // Set isDataUnsaved to true when any form input changes
    $('#keyword, #tgl_spk, #ppk, #total_jumlah, #id_sobat').on('input', function() {
        isDataUnsaved = true;
    });

    window.addEventListener('beforeunload', function(e) {
        if (isDataUnsaved) {
            var confirmationMessage = 'You have unsaved changes. Are you sure you want to leave this page?';

            e.returnValue = confirmationMessage; // Standard for most browsers
            return confirmationMessage; // For older browsers
        }
    });

    function update_spk() {
        var t_idmitra = $('#id_sobat').val();
        var no_spk = $('#keyword').val();
        var tanggal_spk = $('#tgl_spk').val();
        var ppk = $('#ppk').val();
        var total_perjanjian_text = $('#total_jumlah').text();

        // Convert the date format from YYYY-MM-DD to D-M-YYYY
        var dateParts = tanggal_spk.split('-');
        var formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0];

        var no_spk4 = no_spk.substring(0, 4) + '-' + formattedDate; // or you can use slice(0, 4)

        // Menghapus tanda titik (.) dan "Rp" dari angka
        var total_perjanjian_number = total_perjanjian_text.replace('Rp ', '').replace(/\./g, '');

        // Mengonversi string menjadi angka
        var total_perjanjian = parseFloat(total_perjanjian_number);
        var id_sobat = $('#id_sobat').val();

        // Periksa apakah input kosong
        if (no_spk == '' || t_idmitra == '' || id_tugas == '' || volume == '') {
            toastr.warning('Mohon lengkapi semua kolom!');
            return; // Hentikan proses jika ada input yang kosong
        }
        if (total_perjanjian <= 0) {
            toastr.warning('Belum ada Kegiatan!, mohon di lengkapi dahulu!');
            return false; // Stop the form from being submitted
        }

        $.ajax({
            url: '<?php echo base_url("kontrak/simpan_spk"); ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                no_spk: no_spk,
                tanggal_spk: tanggal_spk,
                total_perjanjian: total_perjanjian,
                id_sobat: id_sobat,
                ppk: ppk
            },
            success: function(response) {
                if (response.status == 'success') {
                    toastr.success('Data berhasil disimpan.');
                    isDataUnsaved = false; // Reset the unsaved data flag
                    window.location.href = "<?php echo site_url('daftarspk/detail/'); ?>" + no_spk4;
                } else {
                    toastr.warning('Gagal menyimpan data. Silakan coba lagi.');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                toastr.warning('Terjadi kesalahan saat menyimpan data.');
            }
        });
    }
</script>


<script>
    function batalSPK() {
        var no_spk = $('#keyword').val(); // Ambil nilai nomor SPK dari input
        if (confirm('Apakah Anda yakin ingin membatalkan SPK dengan nomor: ' + no_spk + '?')) {
            $.ajax({
                url: '<?php echo base_url("kontrak/hapus_spk"); ?>', // Sesuaikan URL dengan endpoint hapus SPK
                type: 'POST',
                dataType: 'json',
                data: {
                    no_spk: no_spk
                },
                success: function(response) {
                    if (response.success) {
                        // Membersihkan form isian
                        $('#keyword').val('');
                        $('#tgl_spk').val('');
                        $('#total_jumlah').text('');
                        $('#id_sobat').val('');
                        $('#id_sobat_telp').val('');
                        $('#ppk').val('');
                        $('#nama_mitra').val('');
                        $('#id_sobat').val('');
                        // $('#telp').val('');
                        
                        $('#generate').prop('disabled', false);
                        $('#nama_mitra').prop('disabled', false);
                        $('#tgl_spk').prop('disabled', false);
                        $('#ppk').prop('disabled', false);
                        toastr.success('Data SPK berhasil dihapus.');
                    } else {
                        toastr.error('Gagal menghapus data SPK.');
                    }
                },
                error: function() {
                    toastr.error('Terjadi kesalahan dalam melakukan permintaan penghapusan.');
                }
            });
        } else {
            // Jika pengguna memilih "No" pada pesan konfirmasi
            toastr.error('Penghapusan dibatalkan.');
        }
    }
</script>
<!-- AKHIR SCRIPT KONTRAK -->

<!-- AWAL SCRIPT KEGIATAN -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#kelompok_anggaran').change(function() {
            var kelompok_anggaran = $('#kelompok_anggaran').val();
            if (kelompok_anggaran != '') {
                $.ajax({
                    url: "<?php echo base_url() ?>kegiatan/autofill_kode_anggaran",
                    method: "POST",
                    data: {
                        kelompok_anggaran: kelompok_anggaran
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#kode_anggaran').val(data[0].kode_anggaran);
                    }
                });
            }
        });
    });
</script>

<!-- Include script JavaScript untuk mengirim data form tanpa reload -->
<script>
    $(document).ready(function() {
        $('#formTambahAnggaran').submit(function(e) {
            e.preventDefault(); // Menghentikan pengiriman form

            // Ambil nilai dari input
            var kodeAnggaran = $('#kode_anggaran').val();
            var kelompokAnggaran = $('#kelompok_anggaran').val();
            var bidangTeknis = $('#bidang_teknis').val();

            // Kirim data menggunakan AJAX
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('anggaran/tambah_aksi'); ?>",
                data: {
                    kode_anggaran: kodeAnggaran,
                    kelompok_anggaran: kelompokAnggaran,
                    bidang_teknis: bidangTeknis
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        // Tambahkan kode sukses di sini, misalnya tampilkan pesan sukses
                        toastr.success('Data berhasil ditambahkan!');
                        window.location.href = "<?php echo site_url('anggaran/index'); ?>"; // Redirect ke halaman daftar anggaran
                    } else if (response.status === 'error') {
                        // Tampilkan pesan error
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani error jika ada
                    console.error(xhr.responseText);
                    toastr.error('Terjadi kesalahan saat mengirim data!');
                }
            });
        });
    });
</script>


<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-edit_anggaran', function() {
            var kode_lama = $(this).data('kode-lama');
            var kelompok = $(this).data('kelompok');
            var kode = $(this).data('kode');
            var bidang = $(this).data('bidang');

            var formEdit = '<form id="formEditAnggaran" data-kode-lama="' + kode_lama + '">';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="edit_kode_anggaran">Kode Anggaran</label>';
            formEdit += '<input readonly type="text" class="form-control" id="kode_anggaran_lama" value="' + kode + '">';
            formEdit += '</div>';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="edit_kode_anggaran">Kode Anggaran Baru</label>';
            formEdit += '<input type="text" class="form-control" id="edit_kode_anggaran" value="' + kode + '">';
            formEdit += '</div>';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="edit_kelompok_anggaran">Nama Kelompok Anggaran</label>';
            formEdit += '<input type="text" class="form-control" id="edit_kelompok_anggaran" value="' + kelompok + '">';
            formEdit += '</div>';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="edit_bidang_teknis">Bidang Teknis</label>';
            formEdit += '<input type="text" class="form-control" id="edit_bidang_teknis" value="' + bidang + '">';
            formEdit += '</div>';
            formEdit += '<button type="submit" class="btn btn-primary">Simpan Perubahan</button>';
            formEdit += '</form>';

            $('#modalEdit .modal-body').html(formEdit);
            $('#modalEdit').modal('show');
        });

        $('#modalEdit').on('submit', '#formEditAnggaran', function(e) {
            e.preventDefault();
            var kode_lama = $('#kode_anggaran_lama').val();;
            var kode = $('#edit_kode_anggaran').val();
            var kelompok = $('#edit_kelompok_anggaran').val();
            var bidang = $('#edit_bidang_teknis').val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('anggaran/edit_anggaran'); ?>",
                data: {
                    kode_lama: kode_lama,
                    kode: kode,
                    kelompok: kelompok,
                    bidang: bidang
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success('Data berhasil diperbarui!');
                        location.reload(); // Untuk me-refresh halaman setelah berhasil memperbarui data
                    } else {
                        toastr.error('Gagal memperbarui data!');
                    }
                    $('#modalEdit').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    toastr.error('Terjadi kesalahan saat mengirim data!');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Ketika tombol "Edit" diklik
        $('#dataTable').on('click', '.btn-edit', function() {
            // Ambil data dari baris yang sesuai
            var kelompokAnggaran = $(this).closest('tr').find('td:eq(0)').text();
            var kodeAnggaran = $(this).closest('tr').find('td:eq(1)').text();

            // Masukkan data ke dalam input modal
            $('#edit_kelompok_anggaran').val(kelompokAnggaran);
            $('#edit_kode_anggaran').val(kodeAnggaran);

            // Tampilkan modal edit
            $('#modalEdit').modal('show');
        });
    });
</script>
<!-- AKHR SCRIPT KEGIATAN -->
<script>
    $(document).ready(function() {
        // Ketika tombol "Edit" diklik
        $('#dataTable').on('click', '.btn-view', function() {
            // Ambil data dari baris yang sesuai
            var no_spk = $(this).closest('tr').find('td:eq(0)').text();
            var tgl_spk = $(this).closest('tr').find('td:eq(1)').text();

            // Masukkan data ke dalam input modal
            $('#modal-no_spk').val(no_spk);
            $('#modal-tanggal_spk').val(tgl_spk);

            // Tampilkan modal edit
            $('#modalEdit').modal('show');
        });
    });
</script>

<script>
    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }
</script>


<!-- FORM TAMBAH PPK -->
<script>
    $(document).ready(function() {
        $('#formTambahPPK').submit(function(e) {
            e.preventDefault(); // Menghentikan pengiriman form

            // Ambil nilai dari input
            var nip = $('#nip').val();
            var ppk = $('#ppk').val();

            // Kirim data menggunakan AJAX
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ppk/tambah_aksi'); ?>",
                data: {
                    nip: nip,
                    ppk: ppk
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        // Tambahkan kode sukses di sini, misalnya tampilkan pesan sukses
                        toastr.success('Data berhasil ditambahkan!');
                        window.location.href = "<?php echo site_url('ppk/index'); ?>"; // Redirect ke halaman daftar anggaran
                    } else if (response.status === 'error') {
                        // Tampilkan pesan error
                        toastr.error(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani error jika ada
                    console.error(xhr.responseText);
                    toastr.error('Terjadi kesalahan saat mengirim data!');
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-edit', function() {
            var nip_lama = $(this).data('nip-lama');
            var ppk = $(this).data('ppk');
            var nip = $(this).data('nip');

            var formEdit = '<form id="formEditPPK" data-nip-lama"' + nip_lama + '">';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="">NIP Sebelumnya</label>';
            formEdit += '<input readonly type="text" class="form-control" id="nip_lama" value="' + nip + '">';
            formEdit += '</div>';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="">NIP</label>';
            formEdit += '<input type="text" class="form-control" id="edit_nip" value="' + nip + '">';
            formEdit += '</div>';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="">Nama</label>';
            formEdit += '<input type="text" class="form-control" id="edit_ppk" value="' + ppk + '">';
            formEdit += '</div>';
            formEdit += '<button type="submit" class="btn btn-primary">Simpan Perubahan</button>';
            formEdit += '</form>';

            $('#modalEdit .modal-body').html(formEdit);
            $('#modalEdit').modal('show');
        });

        $('#modalEdit').on('submit', '#formEditPPK', function(e) {
            e.preventDefault();
            var nip_lama = $('#nip_lama').val();;
            var nip = $('#edit_nip').val();
            var ppk = $('#edit_ppk').val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('ppk/edit_ppk'); ?>",
                data: {
                    nip_lama: nip_lama,
                    nip: nip,
                    ppk: ppk
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success('Data berhasil diperbarui!');
                        location.reload(); // Untuk me-refresh halaman setelah berhasil memperbarui data
                    } else {
                        toastr.error('Gagal memperbarui data!');
                    }
                    $('#modalEdit').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    toastr.error('Terjadi kesalahan saat mengirim data!');
                }
            });
        });
    });
</script>

<!-- SCRIPT HAPUS DATA DAFTAR SPK -->
<script>
    $(document).ready(function() {
        $('#tabel_spk').on('click', '.hapusSPK', function() {
            // Ambil nilai 'data-no-spk' dari <tr> terdekat tombol yang diklik
            var no_spk = $(this).closest('tr').find('td:eq(1)').text();
            console.log(no_spk); // Untuk keperluan debugging
            // Panggil fungsi cek_ketersediaan_bast terlebih dahulu
            cek_ketersediaan_bast(no_spk);
        });
    });

    // Fungsi untuk mengecek ketersediaan BAST sebelum hapus SPK
    function cek_ketersediaan_bast(no_spk) {
        $.ajax({
            url: '<?php echo base_url("daftarspk/cek_bast"); ?>', // URL ke fungsi backend untuk cek BAST
            type: 'POST',
            dataType: 'json',
            data: {
                no_spk: no_spk
            },
            success: function(response) {
                if (response.has_bast) {
                    // Jika ada BAST terkait, tampilkan pesan error
                    Swal.fire({
                        title: 'Gagal Menghapus!',
                        text: 'Tidak bisa menghapus SPK karena terkait dengan BAST.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                } else {
                    // Jika tidak ada BAST, lanjutkan ke proses penghapusan
                    hapus_daftarspk(no_spk);
                }
            },
            error: function() {
                // Tampilkan error jika pengecekan gagal
                Swal.fire({
                    title: 'Error!',
                    text: 'Terjadi kesalahan saat memeriksa ketersediaan BAST.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    }

    // Fungsi hapus SPK setelah dicek tidak ada BAST
    function hapus_daftarspk(no_spk) {
        // Gunakan SweetAlert2 untuk konfirmasi
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan menghapus SPK nomor: " + no_spk + "?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '<?php echo base_url("daftarspk/hapus_daftarspk"); ?>', // Sesuaikan URL dengan endpoint hapus SPK
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        no_spk: no_spk
                    },
                    success: function(response) {
                        if (response.success) {
                            // Gunakan SweetAlert2 untuk menampilkan pesan sukses
                            Swal.fire({
                                title: 'Sukses!',
                                text: 'Data SPK berhasil dihapus.',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Reload halaman setelah penghapusan sukses
                                location.reload();
                            });
                        } else {
                            // Gunakan SweetAlert2 untuk menampilkan pesan error
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Gagal menghapus data SPK.',
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function() {
                        // Gunakan SweetAlert2 untuk menampilkan pesan error
                        Swal.fire({
                            title: 'Error!',
                            text: 'Terjadi kesalahan dalam melakukan permintaan penghapusan.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            } else {
                // Jika pengguna memilih "Batal" pada pesan konfirmasi
                Swal.fire({
                    title: 'Dibatalkan',
                    text: 'Penghapusan dibatalkan.',
                    icon: 'info',
                    confirmButtonText: 'OK'
                });
            }
        });
    }
</script>



<!-- AKHIR SCRIPT KONTRAK -->

<!-- FORM TAMBAH USER -->
<script>
    $(document).ready(function() {
        $('#formTambahUser').submit(function(e) {
            e.preventDefault(); // Menghentikan pengiriman form

            // Ambil nilai dari input
            var username = $('#username').val();
            var password = $('#password').val();
            var level = $('#level').val();
            var is_active = $('#is_active').val();

            // Kirim data menggunakan AJAX
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('user/tambah_aksi'); ?>",
                data: {
                    username: username,
                    password: password,
                    level: level,
                    is_active: is_active
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        // Tambahkan kode sukses di sini, misalnya tampilkan pesan sukses
                        toastr.success('Data berhasil ditambahkan!');
                        window.location.href = "<?php echo site_url('user/index'); ?>"; // Redirect ke halaman daftar anggaran
                    } else if (response.status === 'error') {
                        // Tampilkan pesan error
                        toastr.success(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Tangani error jika ada
                    console.error(xhr.responseText);
                    toastr.error('Terjadi kesalahan saat mengirim data!');
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('#togglePassword').on('click', function() {
            var passwordField = $('#password');
            var passwordFieldType = passwordField.attr('type');
            var icon = $(this).find('i');
            if (passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });
    });
</script>


<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-edit_user', function() {
            var id = $(this).data('id');
            var username = $(this).data('username');
            var level = $(this).data('level');
            var is_active = $(this).data('is_active');

            var formEdit = '<form id="formEditUser" data-id="' + id + '">';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="username">Username</label>';
            formEdit += '<input hidden type="text" class="form-control" id="edit_id" value="' + id + '">';
            formEdit += '<input type="text" class="form-control" name="username" id="edit_username" value="' + username + '">';
            formEdit += '</div>';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="level">Level User</label>';
            formEdit += '<select class="form-control" id="edit_level" name="level">';
            formEdit += '<option value="2"' + (level == 2 ? ' selected' : '') + '>User</option>';
            formEdit += '<option value="1"' + (level == 1 ? ' selected' : '') + '>Admin</option>';
            formEdit += '</select>';
            formEdit += '</div>';
            formEdit += '<div class="form-group">';
            formEdit += '<label for="is_active">Status</label>';
            formEdit += '<select class="form-control" id="edit_is_active">';
            formEdit += '<option value="1"' + (is_active == 1 ? ' selected' : '') + '>Aktif</option>';
            formEdit += '<option value="0"' + (is_active == 0 ? ' selected' : '') + '>Tidak Aktif</option>';
            formEdit += '</select>';
            formEdit += '</div>';
            formEdit += '<div class="text-right">';
            formEdit += '<button type="submit" class="btn btn-primary">Simpan</button>';
            formEdit += '<button class="btn btn-danger" data-dismiss="modal">Batal</button>';
            formEdit += '</div>';
            formEdit += '</form>';

            $('#modalEdit .modal-body').html(formEdit);
            $('#modalEdit').modal('show');
        });


        $('#modalEdit').on('submit', '#formEditUser', function(e) {
            e.preventDefault();
            var id = $('#edit_id').val();;
            var username = $('#edit_username').val();;
            var level = $('#edit_level').val();
            var is_active = $('#edit_is_active').val();

            $.ajax({
                type: "POST",
                url: "<?php echo site_url('user/edit_user'); ?>",
                data: {
                    id: id,
                    username: username,
                    level: level,
                    is_active: is_active,
                },
                dataType: "json",
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success('Data berhasil diperbarui!');
                        location.reload(); // Untuk me-refresh halaman setelah berhasil memperbarui data
                    } else {
                        toastr.error('Gagal memperbarui data!');
                    }
                    $('#modalEdit').modal('hide');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    toastr.error('Terjadi kesalahan saat mengirim data!');
                }
            });
        });
    });
</script>


<script>
    $(document).on('click', '.btn-edit_PW', function() {
        var id = $(this).data('id');
        var username = $(this).data('user');

        var formEdit = '<form id="formEditPW" data-id="' + id + '">';
        formEdit += '<div class="form-group">';
        formEdit += '<label for="username">Username</label>';
        formEdit += '<input hidden type="text" class="form-control" id="edit_id" value="' + id + '">';
        formEdit += '<input readonly type="text" class="form-control" name="username" id="edit_username" value="' + username + '">';
        formEdit += '</div>';
        formEdit += '<div class="form-group">';
        formEdit += '<label for="password">Password Baru</label>';
        formEdit += '<div class="input-group">';
        formEdit += '<input required type="password" class="form-control" id="edit_password" value="">';
        formEdit += '<div class="input-group-append">';
        formEdit += '<button class="btn btn-outline-secondary" type="button" id="togglePassword1"><i class="fa fa-eye"></i></button>';
        formEdit += '</div>';
        formEdit += '</div>'; // Close input-group
        formEdit += '</div>';

        formEdit += '<div class="form-group">';
        formEdit += '<label for="confirm_password">Confirm Password</label>';
        formEdit += '<div class="input-group">';
        formEdit += '<input required type="password" class="form-control" id="confirm_password" value="">';
        formEdit += '<div class="input-group-append">';
        formEdit += '<button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword"><i class="fa fa-eye"></i></button>';
        formEdit += '</div>';
        formEdit += '</div>'; // Close input-group
        formEdit += '</div>';

        formEdit += '<div class="text-right">';
        formEdit += '<button type="submit" class="btn btn-primary">Simpan</button>';
        formEdit += '<button class="btn btn-danger" data-dismiss="modal">Batal</button>';
        formEdit += '</div>';
        formEdit += '</form>';

        $('#modalEdit .modal-body').html(formEdit);
        $('#modalEdit').modal('show');

        // Add event listener to toggle password visibility
        $('#togglePassword1').on('click', function() {
            var passwordField = $('#edit_password');
            var passwordFieldType = passwordField.attr('type');
            var icon = $(this).find('i');
            if (passwordFieldType == 'password') {
                passwordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                passwordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Add event listener to toggle confirm password visibility
        $('#toggleConfirmPassword').on('click', function() {
            var confirmPasswordField = $('#confirm_password');
            var confirmPasswordFieldType = confirmPasswordField.attr('type');
            var icon = $(this).find('i');
            if (confirmPasswordFieldType == 'password') {
                confirmPasswordField.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                confirmPasswordField.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        $('#modalEdit').on('submit', '#formEditPW', function(e) {
            e.preventDefault();
            var id = $('#edit_id').val();
            var password = $('#edit_password').val();
            var confirmPassword = $('#confirm_password').val();

            if (password !== confirmPassword) {
                // Submit the form (you can use AJAX or a normal form submission here)
                toastr.warning('Password Tidak Sama!!');
                return;
                // For example, you could use:
                // this.submit();

            } else if (password === confirmPassword) {

                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('user/ganti_password'); ?>",
                    data: {
                        id: id,
                        password: password
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === 'success') {
                            toastr.success('Password berhasil diperbarui!');
                            location.reload(); // Untuk me-refresh halaman setelah berhasil memperbarui data
                        } else {
                            toastr.warning('Gagal mengganti Password!');
                        }
                        $('#modalEdit').modal('hide');
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        toastr.error('Terjadi kesalahan saat mengirim data!');
                    }
                });
            };


        });
    });
</script>

<script>
    // Ambil elemen dropdown
    var dropdown = document.getElementById("kelompok_anggaran");

    // Data t_anggaran dari PHP
    var tbAnggaran = <?php echo json_encode($t_anggaran); ?>;

    // Nilai yang sudah terpilih sebelumnya
    var selectedValue = "<?php echo isset($selectedValue) ? $selectedValue : ''; ?>";

    // Tambahkan opsi dari data t_anggaran
    tbAnggaran.forEach(function(row) {
        var option = document.createElement("option");
        option.text = row.kelompok_anggaran;
        option.value = row.kelompok_anggaran;
        // Periksa apakah opsi saat ini adalah yang dipilih sebelumnya
        if (row.kelompok_anggaran === selectedValue) {
            option.selected = true;
        }
        dropdown.add(option);
    });
</script>

<script>
function cekBAST(no_spk) {
    // Debugging: Menampilkan nomor SPK yang dikirimkan
    console.log("Nomor SPK yang dikirim:", no_spk);

    $.ajax({
        url: '<?php echo base_url("daftarbast/cek_bast"); ?>',
        type: 'POST',
        data: {no_spk: no_spk},
        dataType: 'json',
        success: function(response) {
            // Debugging: Menampilkan response dari server
            console.log("Response dari server:", response);

            if (response.exists) {
                // Jika BAST sudah ada, buka halaman cetak BAST
                console.log("BAST ditemukan, membuka halaman cetak...");
                window.open('<?php echo base_url("daftarbast/cetak_bast/"); ?>' + response.no_bast + '/' + response.tanggal_spk, '_blank');
                
            } else {
                // Jika BAST belum ada, munculkan modal untuk input BAST
                console.log("BAST tidak ditemukan, membuka modal input...");

                // Debugging: Menampilkan data yang akan dimasukkan ke dalam modal
                console.log("Data modal - no_spk:", no_spk);
                console.log("Data modal - Tanggal SPK:", response.tanggal_spk);

                // Munculkan modal
                $('#modalBAST').modal('show');  
                $('#no_spk_modal').val(no_spk);  // Isi nomor SPK di modal
                $('#tanggal_spk_modal').val(response.tanggal_spk);  // Isi nomor SPK di modal

                // Ambil nomor BAST berdasarkan 4 angka depan dari no_spk
                // var nomor_bast = no_spk.substring(0, 4) + "/6109-BAST/PPIS/" + response.bulan + "/" + response.tahun;
                var nomor_bast = no_spk.replace("SPK", "BAST");

                // Debugging: Menampilkan nomor BAST yang akan ditampilkan di modal
                console.log("Nomor BAST yang dihasilkan:", nomor_bast);

                // Isi nomor BAST di modal
                $('#no_bast_modal').val(nomor_bast);
            }
        },
        error: function(xhr, status, error) {
            // Debugging: Menampilkan pesan error jika terjadi kesalahan
            console.error("Error dari server:", xhr.responseText);
            console.error("Status:", status);
            console.error("Error:", error);
        }
    });
}
</script>

<script>

$(document).ready(function() {
    $('#simpanBAST').click(function() {
        // Ambil data dari modal
        var no_spk = $('#no_spk_modal').val();
        var no_bast = $('#no_bast_modal').val();
        var tanggal_bast = $('#tanggal_bast_modal').val();
        var tanggal_spk = $('#tanggal_spk_modal').val();

        // Debugging: Tampilkan data yang akan dikirim
        console.log("Data yang dikirim: ");
        console.log("Nomor SPK:", no_spk);
        console.log("Nomor BAST:", no_bast);
        console.log("Tanggal BAST:", tanggal_bast);
        console.log("Tanggal SPK:", tanggal_spk);

        // Validasi menggunakan SweetAlert2
        if (no_spk === '' || no_bast === '' || tanggal_bast === '') {
            Swal.fire({
                icon: 'warning',
                title: 'Data Tidak Lengkap',
                text: 'Mohon lengkapi semua data sebelum menyimpan.',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        // Function to format the date to YYYY-MM-DD
        function formatDateToYYYYMMDD(dateString) {
            // Assuming the input date format is DD-MM-YYYY
            var parts = dateString.split('-');
            // Check if the date format is correct (DD-MM-YYYY)
            if (parts.length === 3) {
                var day = parts[0].padStart(2, '0');   // Pad with leading zero if necessary
                var month = parts[1].padStart(2, '0'); // Pad with leading zero if necessary
                var year = parts[2];                    // YYYY

                // Return the formatted date
                return year + '-' + month + '-' + day; // YYYY-MM-DD
            }
            return dateString; // If the format is incorrect, return the original string
        }

        // Format tanggal_spk to YYYY-MM-DD
        tanggal_spk = formatDateToYYYYMMDD(tanggal_spk);
  

        // Pastikan tanggal_bast dan tanggal_spk valid
        var dateBast = new Date(tanggal_bast);
        var dateSpk = new Date(tanggal_spk);
        
        // Debugging: Log dateBast dan dateSpk
        console.log("dateBast:", dateBast);
        console.log("dateSpk:", dateSpk);

        // Cek validitas tanggal
        if (isNaN(dateBast.getTime()) || isNaN(dateSpk.getTime())) {
            Swal.fire({
                icon: 'error',
                title: 'Tanggal Tidak Valid',
                text: 'Mohon pastikan tanggal yang dimasukkan valid.',
                confirmButtonText: 'OK'
            });
            return;
        }

        // Bandingkan tanggal
        if (dateBast <= dateSpk) {
            Swal.fire({
                icon: 'warning',
                title: 'Tanggal BAST Tidak Valid',
                text: 'Tanggal BAST harus setelah tanggal SPK.',
                confirmButtonText: 'OK'
            });
            return; // Stop execution if the validation fails
        }

        $.ajax({
            url: '<?php echo base_url("daftarbast/simpan_bast"); ?>',
            type: 'POST',
            data: {
                no_spk: no_spk,
                no_bast: no_bast,
                tanggal_bast: tanggal_bast
            },
            dataType: 'json',
            success: function(response) {
                // Jika berhasil, buka halaman cetak BAST di tab baru
                console.log("Data berhasil disimpan, membuka halaman cetak...");

                // Ambil 4 karakter pertama dari no_bast
                var no_bast_substring = no_bast.substring(0, 4);
                
                // Gabungkan dengan tanggal_bast yang sudah diformat
                window.open('<?php echo base_url("daftarbast/cetak_bast/"); ?>' + no_bast_substring + '/' + tanggal_spk, '_blank');

                // Tutup modal setelah sukses
                $('#modalBAST').modal('hide');
            },
            error: function(xhr, status, error) {
                // Debugging: Menampilkan pesan error jika terjadi kesalahan
                console.error("Error dari server:", xhr.responseText);
                Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    text: 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

</script>

 <!-- Script untuk Hapus BAST -->
    <script>
        $(document).on('click', '.btn-hapusbast', function() {
            // Ambil no_bast dari atribut data
            var no_bast = $(this).data('no-bast');

            // Encode no_bast menggunakan Base64
            var encoded_no_bast = btoa(no_bast); // btoa untuk encoding Base64

            // Tampilkan dialog konfirmasi menggunakan SweetAlert2
            Swal.fire({
                title: 'Konfirmasi Hapus',
                text: "Apakah Anda yakin ingin menghapus BAST " + no_bast + "?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi, lanjutkan dengan penghapusan
                    $.ajax({
                        url: '<?= base_url("daftarbast/hapus_bast") ?>', // Ganti dengan URL yang sesuai
                        type: 'POST',
                        data: { no_bast: encoded_no_bast },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'success') {
                                Swal.fire('Dihapus!', response.message, 'success').then(() => {
                                    location.reload(); // Refresh halaman setelah penghapusan berhasil
                                });
                            } else {
                                Swal.fire('Gagal!', response.message, 'error');
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire('Error!', 'Terjadi kesalahan: ' + error, 'error');
                        }
                    });
                } else {
                    // Jika pengguna membatalkan penghapusan
                    Swal.fire('Dibatalkan', 'Penghapusan dibatalkan.', 'info');
                }
            });
        });
    </script>


</html>