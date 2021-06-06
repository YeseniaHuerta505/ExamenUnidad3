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
    <h2>Editar datos de la Base</h2>
    
    <form method="post">
        <h2>Formulario para la Edición de Datos</h2>
        
        
        <?php
            while($dato = mysqli_fetch_assoc($resultado)){
            echo $dato['Nombre'], $dato['Telefono'], $dato['mail'];
            echo '<div class="form-floating mb-3">';
            echo '<input type="text" class="form-control" ID="nombre" placeholder="Escriba su Nombre" name="nombre" value="'.$dato['Nombre'].'">';
            echo '<label for="nombre">Escriba su Nombre</label></div>';
            
            echo '<div class="form-floating mb-3">';
            echo '<input type="telefono" class="form-control" id="telefono" placeholder="No de Telefono" name="telefono" value="'.$dato['Telefono'].'">';
            echo '<label for="Telefono">No de Telefono</label></div>';
            
            echo '<div class="form-floating mb-3">';
            echo '<input type="email" class="form-control" id="email" placeholder="name@example.com" name="correo" value="'.$dato['mail'].'">';
            echo '<label for="email">name@example.com</label></div>';
            }
        ?>
        <div>
            <input class="btn btn-primary" type="submit" value="Actualizar" name="boton"/>
        </div>
    </form>

    <?php
        
        if($_POST){
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $actualizar = "Update personas set nombre = '$nombre', telefono = '$telefono', mail = '$correo' where id = '$id'";
            //UPDATE `personas` SET `nombre` = 'Ricardo Alvarez' WHERE `personas`.`id` = 116;
            mysqli_query($conn, $actualizar);
            mysqli_close($conn);
        }
    
    ?>
</body>
</html>