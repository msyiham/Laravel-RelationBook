<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::to('/') }}/images/logo.png">

    <!-- jvectormap -->
    <link href="{{ URL::to('/') }}/user/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/user/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css"  />
    
    <link href="{{ URL::to('/') }}/user/plugins/morris/morris.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/user/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/') }}/user/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/') }}/user/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="{{ URL::to('/') }}/user/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ URL::to('/') }}/user/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ URL::to('/') }}/user/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    @include('user.layout.header')
    <div class="wrapper mt-2">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="#">@yield('role')</a></li>
                                <li class="breadcrumb-item active">@yield('page title')</li>
                            </ol>
                        </div>
                        <h4 class="page-title">@yield('page title')</h4>
                    </div>
                </div>
            </div>
            @yield('content')
            
        </div> <!-- end container -->
    </div>
    <!-- end wrapper -->
    @include('user.layout.footer')
    <!-- jQuery  -->
    <script src="{{URL::to('/') }}/user/js/jquery.min.js"></script>
    <script src="{{ URL::to('/') }}/user/js/popper.min.js"></script>
    <script src="{{ URL::to('/') }}/user/js/bootstrap.min.js"></script>
    <script src="{{ URL::to('/') }}/user/js/modernizr.min.js"></script>
    <script src="{{ URL::to('/') }}/user/js/waves.js"></script>
    <script src="{{ URL::to('/') }}/user/js/jquery.nicescroll.js"></script>

    <script src="{{ URL::to('/') }}/user/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    
    <script src="{{ URL::to('/') }}/user/plugins/skycons/skycons.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/fullcalendar/vanillaCalendar.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/raphael/raphael-min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/morris/morris.min.js"></script> 
        
    <script src="{{ URL::to('/') }}/user/pages/dashborad.js"></script>
    <!-- App js -->
    <script src="{{ URL::to('/') }}/user/js/app.js"></script>
    <!-- Required datatable js -->
    <script src="{{ URL::to('/') }}/user/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ URL::to('/') }}/user/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/jszip.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ URL::to('/') }}/user/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/responsive.bootstrap4.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script type="text/javascript">
        $('#summernote').summernote({
            height: 200
        });
        $('#summernote2').summernote({
            height: 200
        });
    </script>
    <!-- Datatable init js -->
    <script src="{{ URL::to('/') }}/user/pages/datatables.init.js"></script> 
    
            <script>
                $(document).ready(function() {
                    $('#datatable2').DataTable();  
                } );
            </script>
</body>
</html>