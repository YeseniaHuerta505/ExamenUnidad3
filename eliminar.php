<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Proyecto CRUD de PHP con MySQ</title>

</head>
<body class="container">

        <?php
        //bajar el parametro de la url
        $id = $_GET['ID'];

        //Bajar parametro de la URL
        include 'conexion.php';

        //incluyendo codigo de conexion de la base de datos
        $consulta = "Select * from personas where id = ".$id;

        //ejecutar el query
        $resultado = mysqli_query($conn, $consulta);
        
        
       
        ?>

    <h1>Mi Primer Proyecto CRUD</h1>
    <h2>Eliminar Registro de la Base</h2>
    
    <form method="post">
        <h2>Formulario para eliminar registros</h2>
        
        
        <?php
            while($dato = mysqli_fetch_assoc($resultado)){
            echo $dato['Nombre'], $dato['Telefono'], $dato['mail'];
            echo '<div class="form-floating mb-3">';
            echo '<input type="text" class="form-control" ID="nombre" placeholder="Escriba su Nombre" disabled name="nombre" value="'.$dato['Nombre'].'">';
            echo '<label for="nombre">Escriba su Nombre</label></div>';
            
            echo '<div class="form-floating mb-3">';
            echo '<input type="telefono" class="form-control" id="telefono" placeholder="No de Telefono" disabled name="telefono" value="'.$dato['Telefono'].'">';
            echo '<label for="Telefono">No de Telefono</label></div>';
            
            echo '<div class="form-floating mb-3">';
            echo '<input type="email" class="form-control" id="email" placeholder="name@example.com" disabled name="correo"  value="'.$dato['mail'].'">';
            echo '<label for="email">name@example.com</label></div>';
            }
        ?>
        <div>
            <input class="btn btn-primary" type="submit" value="Eliminar" name="boton"/>
        </div>
    </form>

    <?php
        if($_POST){
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $eliminar = "Delete from personas where id = '$id'";
            //DELETE FROM `personas` WHERE `personas`.`id` = 120
            mysqli_query($conn, $eliminar);
            mysqli_close($conn);
        }
    ?>
</body>
</html>