<?php
    include_once "ProfesorControlador.php";
    $profesorControlador = new ProfesorControlador();
    $profesores = $profesorControlador->mostrar();
?>
<table border="1">
    <tr>
        <th>id</th>
        <th>nombres</th>
        <th>idioma</th>
        <th></th>
        <th></th>
    </tr>
    <?php
    foreach ($profesores as $profesor){
        echo "<tr>
            <td>".$profesor["id"]."</td>
            <td>".$profesor["nombre"]."</td>
            <td>".$profesor["idioma"]."</td>
            <td><a href='eliminarProgramacion.php?id=".$profesor["id"]."'>Actualizar</a></td>
            <td><a href='eliminarProgramacion.php?id=".$profesor["id"]."'>Eliminar</a></td>
        </tr>";
    }
    ?>
</table>