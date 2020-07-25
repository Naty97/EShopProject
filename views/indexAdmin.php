<?php
session_start();
$user = $_SESSION['user'];

if (!$user) {
    header("Location: ../views/index.php");
}
#if ($_SESSION && $_SESSION['user']) {
//user already logged in
#header("Location: ../logic/dashboard.php");
#    header('Location: ' . '../logic/dashboard.php');
#    die();
#}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Natalia Muñoz">
    <meta name="description" content="Proyecto E-Shop, ISW-613">

    <title>E-Shop, Sus mejores compras</title>

    <!-- Bootstrap Css -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Muli:400,700&display=swap" rel="stylesheet">

    <!-- Fontawesome icons -->
    <script src="https://kit.fontawesome.com/c5f8a6a2df.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="d-flex" id="content-wrapper">
        <!-- Sidebar -->
        <div id="sidebar-container" class="bg-light border-right">
            <div class="logo">
                <h4 class="font-weight-bold mb-0">E-Shop</h4> <br>
            </div>

            <div class="menu list-group-flush">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="fas fa-chart-line fa-lg"></i>
                    &nbsp;&nbsp; Estadísticas</a>
                <ul class="collapse lisst-unstyled" id="homeSubmenu">
                    <a href="../views/indexQuantityClients.php" class="list-group-item list-group-item-action text-muted bg-light p-1 border-0"><i class="fas fa-users"></i>&nbsp;&nbsp;Cantidad clientes</a>
                    <a href="#" class="list-group-item list-group-item-action text-muted bg-light p-1 border-0"><i class="fas fa-dolly"></i>&nbsp;&nbsp;Cantidad productos vendidos</a>
                    <a href="#" class="list-group-item list-group-item-action text-muted bg-light p-1 border-0"><i class="fas fa-search-dollar"></i>&nbsp;&nbsp;Monto total de
                        ventas</a>
                </ul>
                <a href="#homeSubmenuCategories" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="fas fa-sitemap fa-lg"></i>
                    &nbsp;&nbsp; Administrar Categorías y Sub-Categorías</a>
                <ul class="collapse lisst-unstyled" id="homeSubmenuCategories">
                    <a href="../views/indexCategory.php" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="fas fa-sitemap"></i>&nbsp;&nbsp;&nbsp; Categorías</a>
                    <a href="../views/indexSubCategory.php" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="fas fa-sitemap"></i>&nbsp;&nbsp;&nbsp; Sub-Categorías</a>
                </ul>
                <a href="../views/indexProduct.php" class="list-group-item list-group-item-action text-muted bg-light p-3 border-0"><i class="fas fa-person-booth"></i>&nbsp;&nbsp;&nbsp; Administrar Productos</a>
            </div>
        </div>
        <!-- Fin sidebar -->

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100 bg-light-blue">

            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
                    <button class="btn btn-primary text-primary" id="menu-toggle"><i class="fas fa-bars"></i></button>

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <a class="nav-link text-dark" href="#"> Inicio </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link text-dark dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $user['name'];
                                    echo " ";
                                    echo $user['lastname'] ?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Mi perfil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="../logic/logout.php">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </div>

    </div>

    <!-- Fin Page Content -->
    <!-- Fin wrapper -->

    <!-- Bootstrap y JQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Abrir / cerrar menu -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#content-wrapper").toggleClass("toggled");
        });
    </script>

</body>

</html>