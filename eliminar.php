<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Borrar</title>
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
                        <h1>Borrar Registro</h1>
                    </div>
                    <form method="post">
                        <div class="alert alert-danger fade in">
                            <input type="hidden" name="id" id="id" value="<?php echo trim($_GET["id"]); ?>" />
                            <p>Está seguro que deseas borrar el registro</p><br>
                            <p>
                                <input type="submit" value="Si" class="btn btn-danger">
                                <a href="index.php" class="btn btn-default">No</a>
                            </p>
                        </div>
                    </form>
                    <?php
                    require_once 'UsuarioDAO.php';
                    $dao = new UsuariosDAO();
                    if (isset($_POST['id'])) {
                        $id = $_POST['id'];
                        $dao->eliminar($id);
                        header("Location: index.php");
                    }
                    
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>