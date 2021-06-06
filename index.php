<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Proyecto CRUD de PHP con MySQ</title>
</head>
<body class="container" 
}

>
<h1>Mi Primer Proyecto CRUD</h1>
    <h2>Mostrar datos de la Base</h2>
    <?php
        //Agregando cadena de conexion a BD
        include 'conexion.php';

        //Extraer Datos de la tabla

        //Query para estraer datos
        $consulta = "Select * from personas";

        //Variable contenedora de datos
        $resultado = mysqli_query($conn, $consulta);

    ?>

    <!--Proceso de extracción de datos-->
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NOMBRE</th>
                <th scope="col">TELEFONO</th>
                <th scope="col">EMAIL</th>
                <th scope="col">EDITAR</th>
                <th scope="col">BORRAR</th>
            </tr>
        </thead>
        <tbody>
        <?php
        //ciclo para extraer el registro del paquete 
            while($dato = mysqli_fetch_assoc($resultado)){
                echo '<td> <th scope="row">'. $dato['ID'].'</td>';
                echo '<td>'.$dato['Nombre'].'</td>';
                echo '<td>'.$dato['Telefono'].'</td>';
                echo '<td>'.$dato['mail'].'</td>';
                echo '<td><a href="actualizar.php?ID='.$dato['ID'].' "class="btn btn-warning">Actualizar</a></td>';
                echo '<td><a href="Eliminar.php?ID='.$dato['ID'].' "class="btn btn-danger">Eliminar</a></td></tr>';
            }
        
            ?>
        </tbody>
    </table>

    <br/>

    <form method="post">
        <h6>Formulario para el Registro de Datos</h6>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombre" placeholder="Escriba su Nombre" name="nombre">          
            <label for="nombre">Escriba su Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="telefono" class="form-control" id="telefono" placeholder="No de Telefono" name="telefono">
            <label for="telefono">No de Telefono</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" placeholder="name@example.com" name="correo">
            <label for="email">name@example.com</label>
        </div>
        <div>
            <input class="btn btn-primary" type="submit" value="Guardar Datos" name="boton"/>
        </div>
    </form>
    
    <?php
        if($_POST){
            $nombre = $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $insertar = "Insert Into personas (nombre, telefono, mail) Values ('$nombre', '$telefono', '$correo')";
            mysqli_query($conn, $insertar);
            mysqli_close($conn);
            
        }
    ?>

</body>
</html>