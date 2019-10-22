<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Baja de libro - Admin</title>
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-primary bg-dark static-top">
        <a class="navbar-brand mr-1" href="index.html"></a>
        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
    </nav>

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="../views/listaLibros.php">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Libros</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/prestamo.php">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    <span>Prestamo</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/alta.php">
                    <i class="fas fa-fw fa-plus"></i>
                    <span>Alta de libro</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="../views/baja.php">
                    <i class="fas fa-fw fa-minus"></i>
                    <span>Baja de libro</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/new_admin.php">
                    <i class="fas fa-fw fa-user-plus"></i>
                    <span>Nuevo Admin</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../views/informe.php">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Informe</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../controllers/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Cerrar Sesión</span></a>
            </li>
        </ul>
        <!-- end Sidebar -->

        <div id="content-wrapper">
            <div class="container-fluid">
                <!-- Breadcrumbs-->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a>Baja de libros</a>
                    </li>
                </ol>
                <div class="container">
                    <div>
                        <h5>*Escribe los datos del libros en los campos correspondientes para dar de baja</h5>
                    </div>
                    <form class="p-5" method="POST" action="../controllers/book_drop.php">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Id libro</label>
                                <input type="text" class="form-control" name="id_book">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Cantidad</label>
                                <input type="text" class="form-control" name="quantity">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>
                </div>


                <!-- Sticky Footer -->
                <footer class="sticky-footer">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright © Your Website 2019</span>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../vendor/chart.js/Chart.min.js"></script>
        <script src="../vendor/datatables/jquery.dataTables.js"></script>
        <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>
        <script src="../js/sb-admin.min.js"></script>
        <script src="../js/demo/datatables-demo.js"></script>
        <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>