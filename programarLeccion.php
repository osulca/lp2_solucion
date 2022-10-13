<?php
    include_once "ProgramacionControlador.php";
    $programacionControlador = new ProgramacionControlador();
    $programaciones = $programacionControlador->mostrar();
?>
<table border="1">
    <tr>
        <th>id</th>
        <th>inicio</th>
        <th>tipo</th>
        <th>&nbsp;</th>
    </tr>
    <?php
    foreach ($programaciones as $programacion)
    {
    echo "<tr>
            <td>".$programacion["id"]."</td>
            <td>".$programacion["inicio"]."</td>
            <td>".$programacion["tipo"]."</td>
            <td>
                <a href='".$_SERVER["PHP_SELF"]."?id=".$programacion["id"]."'>Programar Leccion</a>
            </td>
         </tr>";
    }
    ?>
</table><br>
<?php
if(!empty($_GET)){
    $id_programación = $_GET["id"];
    include_once "LeccionControlador.php";
    $leccionControlador = new LeccionControlador();
    echo $leccionControlador->programar($id_programación);
}
