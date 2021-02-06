$.widget.bridge('uibutton', $.ui.button);

$(document).ready(function() {
    bsCustomFileInput.init();
    //Variable Declarations
    var pr = location.protocol;
    var lc = location.hostname;
    var dir = "/tugas/kki1/uas/"
    var link = pr + "//" + lc + dir;

    //Quests Modals
    $('#edit-quest').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#eq_id').attr("value", div.data('eq_id'));
        modal.find('#eq_full').attr("value", div.data('eq_full'));
        modal.find('#eq_type').html(div.data('eq_type'));
        modal.find('#eq_cat').attr("value", div.data('eq_cat'));
    });
    //Delete Quests Modals
    $('.flush').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "quests/delete/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Hapus?',
            text: 'Data akan hilang',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#FFC107',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Hapus data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });
    });
    //Activation Quests Modal
    $('.qnon').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "quests/non/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Nonaktifkan?',
            text: 'Data akan hilang di hasil survey',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#FFC107',
            confirmButtonText: 'Nonaktifkan'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Aktivasi data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });

    });
    $('.qact').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "quests/aktif/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Aktifkan?',
            text: 'Data akan muncul di hasil survey',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: 'green',
            confirmButtonText: 'Aktifkan'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Aktivasi data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });

    });
    //Activation Users Modal
    $('.unon').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "users/non/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Nonaktifkan?',
            text: 'Data akan hilang di hasil survey',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#FFC107',
            confirmButtonText: 'Nonaktifkan'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Aktivasi data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });

    });
    $('.uact').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "users/aktif/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Aktifkan?',
            text: 'Data akan muncul di hasil survey',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: 'green',
            confirmButtonText: 'Aktifkan'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Aktivasi data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });

    });
    //Delete Quests Modals
    $('.flush').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "quests/delete/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Hapus?',
            text: 'Data akan hilang',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#FFC107',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Hapus data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });
    });
    // Dynamic Option
    $('#kec').hide();
    $('#lbkec').hide();
    $('#kel').hide();
    $('#lbkel').hide();
    $('#kab').change(function() {
        $('#kec').show();
        $('#lbkec').show();
        var kab_id = $('#kab').val();
        $.ajax({
            type: "POST",
            url: link + "users/fetch_kec/" + kab_id,
            data: {
                kab_id: kab_id
            },
            success: function(response) {
                $('#kec').html(response);
                $('#users_name').val(kab_id);
            }
        });
    });

    $('#kec').change(function() {
        $('#kel').show();
        $('#lbkel').show();
        var kec_id = $('#kec').val();
        $.ajax({
            type: "POST",
            url: link + "users/fetch_kel/" + kec_id,
            data: {
                kec_id: kec_id
            },
            success: function(data) {
                $('#kel').html(data);
                var getlast = $('#users_name').val();
                $('#users_name').val(getlast + kec_id);
            }
        });
    });
    //Users Modals
    $('#edit-users').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#eu_id').attr("value", div.data('eu_id'));
        modal.find('#eu_uname').attr("value", div.data('eu_uname')); // Nama User
        modal.find('#eu_name').attr("value", div.data('eu_name')); // Nama User// Username Login
        modal.find('#eu_pass').attr("value", div.data('eu_pass'));
        modal.find('#eu_role').attr("value", div.data('eu_role'));
        modal.find('#eu_phone').attr("value", div.data('eu_phone'));
        modal.find('#eurw').attr("value", div.data('eurw'));
    });
    $('#edit-user').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget)
        var modal = $(this)
        modal.find('#eu_id').attr("value", div.data('eu_id'));
        modal.find('#eu_uname').attr("value", div.data('eu_uname')); // Nama User
        modal.find('#eu_pass').attr("value", div.data('eu_pass'));
        modal.find('#eu_phone').attr("value", div.data('eu_phone'));
    });
    $('#edit-users').on('hidden.bs.modal', function(e) {
        e.preventDefault();
        $('#edit-users').hide();
        $('#eukec').hide();
        $('#lbeukec').hide();
        $('#eukel').hide();
        $('#lbeukel').hide();
        $('#eurw').hide();
        $('#lbeurw').hide();
    });
    //Delete Users Modals
    $('.delUser').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "users/delU/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Hapus?',
            text: 'Data akan hilang',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#FFC107',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Hapus data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });
    });
    // Dynamic Option
    $('#eukec').hide();
    $('#lbeukec').hide();
    $('#eukel').hide();
    $('#lbeukel').hide();
    $('#eurw').hide();
    $('#lbeurw').hide();
    $('#eukab').change(function() {
        $('#eukec').show();
        $('#lbeukec').show();
        var kab_id = $('#eukab').val();
        $.ajax({
            type: "POST",
            url: link + "users/fetch_kec/" + kab_id,
            data: {
                kab_id: kab_id
            },
            success: function(response) {
                $('#eukec').html(response);
                $('#eu_name').val(kab_id);
            }
        });
    });

    $('#eukec').change(function() {
        $('#eukel').show();
        $('#lbeukel').show();
        var kec_id = $('#eukec').val();
        $.ajax({
            type: "POST",
            url: link + "users/fetch_kel/" + kec_id,
            data: {
                kec_id: kec_id
            },
            success: function(data) {
                $('#eukel').html(data);
                var getlast = $('#eu_name').val();
                $('#eu_name').val(getlast + kec_id);
            }
        });
    });
    $('#eukel').change(function() {
        $('#eurw').show();
        $('#lbeurw').show();
    });
    // Tombol Verifikasi
    $('#btnVerif').click(function(e) {
        e.preventDefault();
        const page = window.location.href;
        var id = page.substr(page.lastIndexOf('/') + 1);
        const url = link + "answers/verif/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Verif?',
            text: 'Data akan diverifikasi',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#FFC107',
            confirmButtonText: 'Verif'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Verif data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });
    });
    //Tombol Hapus Jawaban
    $('.delAns').click(function(e) {
        e.preventDefault();
        const id = $(this).parents("tr").attr("id");
        const url = link + "answers/delete/" + id;
        Swal.fire({
            type: 'warning',
            title: 'Yakin Hapus?',
            text: 'Data akan hilang',
            showCancelButton: true,
            showConfirmButton: true,
            cancelButtonText: 'Batal',
            confirmButtonColor: '#FFC107',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = url;
            } else {
                Swal.fire({
                    type: 'error',
                    title: 'Batal',
                    text: 'Hapus data dibatalkan',
                    showConfirmButton: false,
                    timer: 1000
                })
            }
        });
    });
});

// Data Tables
$(function() {
    $('#example1').DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": false,
        "autoWidth": false,
    });
});