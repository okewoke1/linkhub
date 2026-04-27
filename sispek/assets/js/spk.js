// function updateMateraiUI(el, status) {

//     el.removeClass('bg-danger bg-warning bg-success btn-materai');
//     el.css({ cursor: 'pointer', opacity: 1 });

//     if (status === 0) {
//         el.addClass('bg-danger btn-materai')
//           .text('Belum Bermaterai');
//     } 
//     else if (status == 1) {
//         el.addClass('bg-warning')
//           .text('Bermaterai (Menunggu Admin)')
//           .css({ cursor: 'not-allowed', opacity: 0.7 });
//     } 
//     else {
//         el.addClass('bg-success btn-materai')
//           .text('Terkonfirmasi');
//     }

//     el.data('status', status);
// }


// $(document).on('click', '.btn-materai', function () {

//     let el     = $(this);
//     let no_spk = el.data('no_spk');
//     let status = el.data('status');
//     let level  = el.data('level');

//     // ======================
//     // USER (LEVEL 2)
//     // ======================
//     if (level == 2) {

//         if (status == 2) {
//             Swal.fire('Info', 'Materai sudah dikonfirmasi admin', 'info');
//             return;
//         }

//         Swal.fire({
//             title: 'Sudah bermaterai?',
//             text: 'Update Status Materai',
//             icon: 'question',
//             showCancelButton: true,
//             confirmButtonText: 'Ya',
//             cancelButtonText: 'Tidak'
//         }).then((result) => {
//             if (result.isConfirmed) {
//                 $.ajax({
//                     url: BASE_URL + 'daftarspk/update_materai',
//                     type: 'POST',
//                     data: {
//                         no_spk: no_spk,
//                         materai: 1
//                     },
//                     dataType: 'json',
//                     success: function (res) {
//                         if (res.status) {
//                             Swal.fire('Berhasil', res.message, 'success');
//                             updateMateraiUI(el, 1);
//                         } else {
//                             Swal.fire('Gagal', res.message, 'error');
//                         }
//                     }
//                 });
//             }
//         });

//         return;
//     }

//     // ======================
//     // ADMIN (LEVEL 1)
//     // ======================
//     let options = {
//         0: 'Tanpa Materai',
//         1: 'Menunggu Konfirmasi',
//         2: 'Terkonfirmasi'
//     };

//     Swal.fire({
//         title: 'Ubah Status Materai',
//         input: 'select',
//         inputOptions: options,
//         inputValue: status,
//         showCancelButton: true,
//         confirmButtonText: 'Simpan',
//         cancelButtonText: 'Batal'
//     }).then((result) => {
//         if (result.isConfirmed) {
//             $.ajax({
//                 url: BASE_URL + 'daftarspk/update_materai',
//                 type: 'POST',
//                 data: {
//                     no_spk: no_spk,
//                     materai: result.value
//                 },
//                 dataType: 'json',
//                 success: function (res) {
//                     if (res.status) {
//                         Swal.fire('Berhasil', res.message, 'success');
//                         updateMateraiUI(el, result.value);
//                     } else {
//                         Swal.fire('Gagal', res.message, 'error');
//                     }
//                 }
//             });
//         }
//     });

// });
