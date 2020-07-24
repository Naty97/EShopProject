<?php

/**
 * Inicia una sesión y si el usuario que la inicia es correcto, lo envía al dashboard y 
 * cierra la conexión a la base de datos.
 */
session_start();
if ($_SESSION && $_SESSION['user']) {
    //user already logged in
    header("Location: ../logic/dashboard.php");
    die();
}

/**
 * Si la solicitud no está vacía y el estado es el logueo, el usuario no existe y si el estado
 * es un error, hay un problema en el proceso de ingreso del usuario.
 */
$message = "";
if (!empty($_REQUEST['status'])) {
    switch ($_REQUEST['status']) {
        case 'login':
            $message = 'User does not exists';
            #echo '<p class="alert alert-success agileits" role="alert">User does not exists!p>';
            break;
        case 'error':
            $message = 'There was a problem inserting the user';
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Natalia Muñoz">
    <meta name="description" content="Proyecto E-Shop, ISW-613">
    <title>E-Shop, Sus mejores compras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles/styleLogin.css">
</head>

<body>
    <!-- Log in Form -->
    <div class="container login-container">
        <div class="alert alert-primary" role="alert">
            <?php echo $message; ?>
        </div>
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Login</h3>
                <form method="POST" name="form-login" action="../logic/login.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="email" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="" name="password" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" />
                    </div>
                </form>
            </div>
            <!-- Registration User Form-->
            <div class="col-md-6 login-form-2">
                <h3>Register Now!</h3>
                <form method="POST" name="form-register" action="../logic/createUser.php">
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="name" placeholder="Your Name *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="lastname" placeholder="Your Lastname *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="phonenumber" placeholder="Your Phone Number *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="email" placeholder="Your Email *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name="address" placeholder="Your Address *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="" name="password" placeholder="Your Password *" value="" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Register" />
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>