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