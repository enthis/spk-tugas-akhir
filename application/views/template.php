<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SPK Method SAW</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/font-awesome-4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <!--<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/ionicons-2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url() ?>template/dist/css/skins/_all-skins.min.css">

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url() ?>template/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">


        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">

                    <li>
                        <a href="<?php echo base_url() ?>index.php/Hasil">
                            <i class="fa fa-laptop"></i> <span>Hasil</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            ---------------------------------------------
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/Supplier">
                            <i class="fa fa-truck"></i> <span>Daftar Supplier</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/Jenis_barang">
                            <i class="fa fa-gift"></i> <span>Jenis barang</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/Nilai_supplier">
                            <i class="fa fa-gear"></i> <span>Nilai Barang pada supplier</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            ---------------------------------------------
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/Bobot_kriteria">
                            <i class="fa fa-laptop"></i> <span>Bobot kriteria</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/Kriteria">
                            <i class="fa fa-laptop"></i> <span>Kriteria</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/Nilai_kriteria">
                            <i class="fa fa-laptop"></i> <span>Nilai kriteria</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            ---------------------------------------------
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/User">
                            <i class="fa fa-user"></i> <span>User</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>index.php/Auth">
                            <i class="fa fa-user"></i> <span>Log Out</span>
                        </a>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Data tables</li>
                </ol>
            </section>


            <?php
            echo $contents;
            ?>



        </div><!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.0
            </div>
            <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
        </footer>

        <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url() ?>template/bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url() ?>template/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>template/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url() ?>template/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url() ?>template/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>template/dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url() ?>template/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
</body>

</html>