<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Page title -->
    <title>HOMER | WebApp admin theme</title>

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <!--<link rel="shortcut icon" type="image/ico" href="favicon.ico" />-->

    <!-- Vendor styles -->
    <link rel="stylesheet" href="theme/vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="theme/vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="theme/vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="theme/vendor/bootstrap/dist/css/bootstrap.css" />
    <link rel="stylesheet" href="theme/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="theme/vendor/style.css">

</head>
<body class="fixed-navbar fixed-sidebar ">

<!-- Simple splash screen-->
<div class="splash"> <div class="color-line"></div><div class="splash-title"><h1>Homer - Responsive Admin Theme</h1><p>Special Admin Theme for small and medium webapp with very clean and aesthetic style and feel. </p><div class="spinner"> <div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div> </div> </div> </div>
<!--[if lt IE 7]>
<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Header -->
<div id="header">
    <div class="color-line">
    </div>
    <nav role="navigation">
        <div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
        <div class="small-logo">
            <span class="text-primary">HOMER APP</span>
        </div>

    </nav>
</div>

<!-- Navigation -->
<aside id="menu">
    <div id="navigation">
        <ul class="nav" id="side-menu">
            <li>
                <a href="#"> <span class="nav-label">Admin panel</span></a>
            </li>
            <li>
                <a href="/"> <span class="nav-label">Tasks list</span></a>
            </li>
            <li>
                <a href="?controller=tasks&action=create"> <span class="nav-label">Add task</span></a>
            </li>
        </ul>
    </div>
</aside>

<!-- Main Wrapper -->
<div id="wrapper">
    <div class="content animate-panel">
        <div class="row">
            <div class="col-lg-12">

                <div class="hpanel">

                    <?php require_once('routes.php'); ?>

                    <div class="panel-heading">
                        <!--                        <div class="panel-tools">-->
                        <!--                            <a class="showhide"><i class="fa fa-chevron-up"></i></a>-->
                        <!--                            <a class="closebox"><i class="fa fa-times"></i></a>-->
                        <!--                        </div>-->
                        Tasks table
                    </div>
                    <div class="panel-body">
                        <table id="example2" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Created at</th>
                                <th>End Date</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (!$tasks = $tasks->getTasks()): ?>
                                <p>No results matching your query!</p>
                            <?php else: ?>
                                <?php foreach ($tasks as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $value['title']; ?></td>
                                        <td><?php echo $value['created_at']; ?></td>

                                        <td><?php echo $value['end_date']; ?></td>
                                        <td><?php echo $value['username']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td>
                                            <?php if (($value['status'] == false )): ?>
                                                <?php echo 'Pending' ?>
                                            <?php else: ?>
                                                <?php echo 'Done' ?>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Footer-->
    <footer class="footer">
        <span class="pull-right">
            Example text
        </span>
        Company 2015-2020
    </footer>

</div>



<!-- Vendor scripts -->
<script src="theme/vendor/jquery/dist/jquery.min.js"></script>
<script src="theme/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="theme/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="theme/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="theme/vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="theme/vendor/iCheck/icheck.min.js"></script>
<script src="theme/vendor/sparkline/index.js"></script>
<!-- DataTables -->
<script src="theme/vendor/datatables/media/js/jquery.dataTables.min.js"></script>
<script src="theme/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables buttons scripts -->
<script src="theme/vendor/pdfmake/build/pdfmake.min.js"></script>
<script src="theme/vendor/pdfmake/build/vfs_fonts.js"></script>
<script src="theme/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="theme/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="theme/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="theme/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<!-- App scripts -->
<script src="theme/vendor/scripts/homer.js"></script>


<script>

    $(function () {

        // Initialize Example 2
        $('#example2').dataTable({
            "pageLength": 3,
            "lengthMenu": [[3, 5, 10, 25, 50, -1], [3, 5, 10, 25, 50, "All"]]
        });

    });

</script>

</body>
</html>