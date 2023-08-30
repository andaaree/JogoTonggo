<!DOCTYPE html>
@extends('/admin/body')
@section('title', 'Admin - Menu')
@section('ext-css')
<!-- Select2 -->
<link rel="stylesheet" href="/assets/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/assets/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endsection
@section('container')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Review</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-6">
                <a href="/admin/buku" class="small-box bg-gradient-navy">
                    <div class="inner">
                        <h3>@empty($book) {{ 0 }} @else {{$book}}@endempty</h3>
                        <p>Buku</p>
                    </div>
                    <div class="icon"><i class="fas fa-book"></i></div>
                </a>
            </div>
            <div class="col-lg-2 col-6">
                <a href="/admin/video" class="small-box bg-gradient-lightblue">
                <div class="inner">
                    <h3>@empty($vid) {{ 0 }} @else {{$vid}}@endempty</h3>
                    <p>Video</p>
                </div>
                <div class="icon"><i class="fas fa-film"></i></div>
                </a>
            </div>
            @if(Auth::user()->role < 2)
            <div class="col-lg-2 col-6">
                <a href="/admin/user" class="small-box bg-gradient-secondary">
                    <div class="inner">
                        <h3>@forelse($user as $b){{$b->totidu}}@empty {0}  @endforelse</h3>
                        <p>User</p>
                    </div>
                    <div class="icon"><i class="fas fa-user"></i></div>
                </a>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                      Last Update Sync Import File
                    </div>
                    <div class="card-body" style="padding-top: 0">
                        <div class="row">
                            <div class="col-6">
                                <blockquote class="blockquote mb-0">
                                    <p>Buku</p>
                                    <footer class="blockquote-footer">@empty($sb) {{ "not imported yet" }} @else {{$sb->updated_at}}@endempty</footer>
                                  </blockquote>
                            </div>
                            <div class="col-6">
                                <blockquote class="blockquote mb-0">
                                    <p>Video</p>
                                    <footer class="blockquote-footer">@empty($sv) {{ "not imported yet" }} @else {{$sv->updated_at}}@endempty</footer>
                                  </blockquote>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('ext-script')
<!-- bs-custom-file-input -->
<script src="/assets/adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="/assets/adminlte/plugins/select2/js/select2.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
        bsCustomFileInput.init();
    });

</script>
@include('admin.validator')
@endsection
