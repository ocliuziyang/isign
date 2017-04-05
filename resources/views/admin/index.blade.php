<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('backend.title') }} | 管理</title>

    <!-- Bootstrap -->
    <link href="/assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/assets/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="/assets/gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="/assets/gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="/assets/gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="/assets/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="/assets/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="/assets/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="/assets/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="/assets/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="/assets/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!--  PNotify -->
    <link href="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.css" rel="stylesheet">
    <!-- Sweetalert2-->
    <link href="//cdn.bootcss.com/limonte-sweetalert2/6.4.4/sweetalert2.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/gentelella/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">

    <div id="app"></div>

    <!-- jQuery -->
    <script src="/assets/gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/assets/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="/assets/gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/assets/gentelella/vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="/assets/gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="/assets/gentelella/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="/assets/gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="/assets/gentelella/vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="/assets/gentelella/vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="/assets/gentelella/vendors/Flot/jquery.flot.js"></script>
    <script src="/assets/gentelella/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="/assets/gentelella/vendors/Flot/jquery.flot.time.js"></script>
    <script src="/assets/gentelella/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="/assets/gentelella/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="/assets/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="/assets/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="/assets/gentelella/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="/assets/gentelella/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="/assets/gentelella/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="/assets/gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="/assets/gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="/assets/gentelella/vendors/moment/min/moment.min.js"></script>
    <script src="/assets/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- PNotify -->
    <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.min.js"></script>
    <script src="//cdn.bootcss.com/pnotify/3.0.0/pnotify.buttons.min.js"></script>

    <!-- Datatables -->
    <script src="/assets/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/assets/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/assets/gentelella/vendors/jszip/dist/jszip.min.js"></script>
    <script src="/assets/gentelella/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/assets/gentelella/vendors/pdfmake/build/vfs_fonts.js"></script>

    <script src="{{ asset('js/common.js') }}"></script>

    <!-- 导入 vue.js 编译组件 -->
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Custom Theme Scripts -->
    <script src="/assets/gentelella/build/js/custom.min.js"></script>


</body>
</html>
