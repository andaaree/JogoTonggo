<script type="text/javascript">
    @if (count($errors) > 0)
    $(document).ready(function(e) {
        e.preventDefault;
        $('#modal-add').modal('show');
    });
    @endif
</script>
@if (session('success'))
<script type="text/javascript">
    $(document).ready(function(e) {
        e.preventDefault;
        var data = '<?= session("success") ?>';
        var js = JSON.parse(data);
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: js.message,
            timer: 1700
        });
    });
</script>
@endif
@if (session('error'))
<script type="text/javascript">
    $(document).ready(function(e) {
        e.preventDefault;
        var data = '<?= session("error"); ?>';
        var js = JSON.parse(data);
        console.log(data);
        console.log(js);
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: js.message,
            timer: 3000
        });
    });
</script>
@endif