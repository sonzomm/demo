@extends('index')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Laravel</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("plugins/fontawesome-free/css/all.min.css")}}">
    <!-- Ionicons -->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset("plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset("plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset("plugins/jqvmap/jqvmap.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset("plugins/overlayScrollbars/css/OverlayScrollbars.min.css")}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset("plugins/daterangepicker/daterangepicker.css")}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset("plugins/summernote/summernote-bs4.min.css")}}">
    <!-- Table -->
    <link rel="stylesheet" href="{{asset(" plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/datatables-buttons/css/buttons.bootstrap4.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("dist/css/adminlte.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2/css/select2.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css")}}">
    <link rel="stylesheet" href="{{asset("plugins/bs-stepper/css/bs-stepper.min.css")}}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{asset("plugins/dropzone/min/dropzone.min.css")}}">
</head>
<body>
<div class="row">
        @foreach($rooms as $rooms)
            <div class="col-lg-2 col-6">
                <div class="small-box bg-">
                    <div class="inner"><a href="#">
                        <h3>{{$rooms->room_name}}</h3>
                        <p>{{$rooms->name}}</p>
                        <p> @if($rooms->status == 0)
                                    {{'Book Room'}}
                                @elseif($rooms->status == 1)
                                    {{'Booked'}}
                                @else
                                    {{'khac'}}
                                @endif</p></a>
                    </div>
                </div>
            </div>
        @endforeach

</div>
</body>
</html>
@endsection
