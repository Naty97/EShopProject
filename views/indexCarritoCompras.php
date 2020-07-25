<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <title> E-Shop, Sus mejores compras </title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand">E-Shop</a>
        <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="my-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="carrito.php" tabindex="-1" aria-disabled="true">Carrito(<?php
                                                                                                        echo empty($_SESSION['CARRITO']) ? 0 : count($_SESSION['CARRITO']);
                                                                                                        ?>)</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="cerrar.php" tabindex="-1" aria-disabled="true">Cerrar</a>
                </li>
            </ul>
        </div>
    </nav>
    <br><br>
    <div class="container">
        <br>
        <h3>Lista del Carrito</h3>
        <?php if (!empty($_SESSION)) { ?>
            <table class="table table-dark table-bordered">
                <tbody>
                    <tr>
                        <th with="40%">Descripcion</th>
                        <th with="40%">Cantidad</th>
                        <th with="40%">Precio</th>
                        <th with="40%">Total</th>
                        <th with="5%">--</th>
                    </tr>
                    <?php $total = 0; ?>
                    <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) : ?>
                        <tr>
                            <td with="40%"><?php echo $producto['nombre']; ?></td>
                            <td with="40%"><?php echo $producto['cantidad']; ?></td>
                            <td with="40%"><?php echo $producto['precio']; ?></td>
                            <td with="40%"><?php echo number_format($producto['precio'] * $producto['cantidad'], 0) ?></td>

                            <td with="5%">
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'], COD, KEY); ?>">
                                    <button class="btn btn-danger" type="submit" name="btnEliminar" value="eliminar">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        <?php $total = $total + (number_format($producto['precio'] * $producto['cantidad'])); ?>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="3" align="right">
                            <h3>Total</h3>
                        </td>
                        <td align="right">
                            <h3>$<?php echo number_format($total, 0) ?></h3>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="alert alert-success" role="alert">
                No hay productos en el carrito
            </div>
        <?php } ?>

    </div>
    <div class="col-12 text-center">E-Shop 2020</div>
</body>

</html>