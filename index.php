<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>CRUD de usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 650px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Usuarios</h2>
                        <a href="agregar.php" class="btn btn-success pull-right">Agregar nuevo usuario</a>
                    </div>
                    <?php
                    require_once 'UsuarioDAO.php';
                    $dao = new UsuariosDAO();
                    
                    // listar usuarios
                    $usuarios = $dao->listar();
                    if (count($usuarios) > 0) {
                        echo "<table class='table table-bordered table-striped'>";
                        echo "<h2>Listado de usuarios</h2>";
                        echo "<tr><th>ID</th><th>Nombre</th><th>Email</th><th>Contraseña</th><th>Acciones</th></tr>";
                        foreach ($usuarios as $usuario) {
                            echo "<tr>";
                            echo "<td>" . $usuario->getId() . "</td>";
                            echo "<td>" . $usuario->getNombre() . "</td>";
                            echo "<td>" . $usuario->getEmail() . "</td>";
                            echo "<td>" . $usuario->getPassword() . "</td>";
                            echo "<td>";
                            echo "<a href='editar.php?id=". $usuario->getId() ."' title='Actualizar' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                            echo "<a href='eliminar.php?id=". $usuario->getId()  ."' title='Borrar' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                            echo "</td>";
                            echo "</tr>";                         
                        }
                        echo "</table>";
                    } else {
                        echo "<p>No se encontraron usuarios.</p>";
                    }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
