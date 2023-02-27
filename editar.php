<!DOCTYPE html>
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
    <?php
    require_once 'UsuarioDAO.php';
    // Verifica si se han enviado datos del formulario
    if (isset($_GET['id'])) {
        // Recupera los valores enviados
        $id = $_GET['id'];
        $dao = new UsuariosDAO();
        $usuario = $dao->obtenerPorId($id);
        $nombre = $usuario->getNombre();
        $email = $usuario->getEmail();
        $password = $usuario->getPassword();

        if (!$usuario) {
            echo "No se encontró el usuario.";
            exit();
        }
    } else {
        echo "Falta el ID del usuario.";
        exit();
    }
    ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Editar Usuario</h2>
                    </div>
                    <p>Favor diligenciar el siguiente formulario, para editar el usuario.</p>
                    <form method="post">
                        <input type="hidden" name="id" value="<?php echo  $id; ?>">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $email; ?>">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="text" name="password" id="password" class="form-control" value="<?php echo $password; ?>">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>

                    <?php

                    $usuario = new Usuario();

                    // Verifica si se han enviado datos del formulario
                    if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['password'])) {
                        // Recupera los valores enviados
                        $id = $_POST['id'];
                        $nombre = $_POST['nombre'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        // Llama a los métodos de tu clase y realiza las operaciones necesarias
                        $usuario->setId($id);
                        $usuario->setNombre($nombre);
                        $usuario->setEmail($email);
                        $usuario->setPassword($password);
                        $dao->actualizar($usuario);
                        header("Location: index.php");
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>