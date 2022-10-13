<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="number" name="id_programacion" placeholder="Ingrese el id">
    <input type="submit" value="Eliminar">
</form>

<?php
    if(!empty($_POST)){
        $id_programacion = $_POST["id_programacion"];

        include_once "ProgramacionControlador.php";
        $programacionControlador = new ProgramacionControlador();
        echo $programacionControlador->eliminar($id_programacion);
    }
