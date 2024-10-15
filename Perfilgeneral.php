<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bievenido</title>
</head>
<body>
    <!-- puede ser asi o se hace escrito directamente con php revisar...
        sino una tabla y que vaya iterando como, tendria que pasar el arreglo de la informacion desde la base de datos.:
    
        <?php
    // si la lista no esta vacia:
    if (!empty($usuarios)) {
        // por cada contacto dentro de contactos mostrar array asociativo nombre mail - clave valor
        foreach ($usuarios as $usuario => $email) {
            echo "<li>" . htmlspecialchars($usuario) . " <br> " . 
            htmlspecialchars($nombre_usuario) . "<br>" .
            htmlspecialchars($email) . "<br>" .
            htmlspecialchars($rol) .
             "</li>";
        }
    } else {
        // no deberia estar vacia la verdad:
       //  echo "<li>No hay contactos en la agenda, puedes agregar contactos nuevos</li>";
    }

    ?>-->

    <div class="perfil_usuario">
        <h2>Perfil de Usuario</h2>
        <p><span>Nombre: </span>..</p>
        <p><span>Nombre Usuario: </span></p>
        <p><span>Email: </span></p>
        <p><span>Role: </span></p>
    </div>
</body>
</html>