<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Agregar Empleado</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Agregar Usuario</h2>
                    </div>
                    <p>Favor diligenciar el siguiente formulario, para agregar el usuario.</p>
                    <form method="post">
                        <div class="form-group">
                            <label>Id</label>
                            <input type="number" name="id" id="id" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="text" name="password" id="password" class="form-control" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>

                    <?php
                    require_once 'UsuarioDAO.php';
                    $dao = new UsuariosDAO();
                    $Usuario = new Usuario();

                    // Verifica si se han enviado datos del formulario
                    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password'])) {
                        // Recupera los valores enviados
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        // Llama a los métodos de tu clase y realiza las operaciones necesarias
                        $Usuario->setId($id);
                        $Usuario->setNombre($nombre);
                        $Usuario->setEmail($email);
                        $Usuario->setPassword($password);
                        $dao->agregar($Usuario);
                        header("Location: index.php");
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>