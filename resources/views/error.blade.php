<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ URL::to('/') }}/user/images/relation.png">

    <!-- jvectormap -->
    <link href="{{ URL::to('/') }}/user/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/user/plugins/fullcalendar/vanillaCalendar.css" rel="stylesheet" type="text/css"  />
    
    <link href="{{ URL::to('/') }}/user/plugins/morris/morris.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/user/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/') }}/user/css/icons.css" rel="stylesheet" type="text/css">
    <link href="{{ URL::to('/') }}/user/css/style.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            @yield('content')
        </div> <!-- end container -->
    </div>
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

    <!-- Buttons examples -->
    <script src="{{ URL::to('/') }}/user/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/jszip.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ URL::to('/') }}/user/plugins/datatables/buttons.colVis.min.js"></script>

</body>
</html>