<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <select name="criterio">
        <option value="0">Profesor</option>
        <option value="1">Estudiante</option>
        <option value="2">Status</option>
    </select>
    <input type="text" name="busqueda">
    <input type="submit" value="Buscar">
</form>
<?php
if (!empty($_POST)) {
    $criterio = $_POST["criterio"];
    $busqueda = $_POST["busqueda"];

    include_once "LeccionControlador.php";
    $leccionControlador = new LeccionControlador();
    $resultado = $leccionControlador->buscar($criterio, $busqueda);
    ?>
    <table border="1">
        <tr>
            <th>Leccion</th>
            <th>Programacion</th>
            <th>Estudiante</th>
            <th>Profesor</th>
        </tr>
    <?php
    foreach ($resultado as $item) {
        echo "<tr>
                <td>
                    status:" . $item["status"] . "<br>
                    comentario estudiante: " . $item["comentario_estudiante"] . "<br> 
                    comentario profesor: " . $item["comentario_profesor"] . "<br>   
                </td>
                <td>
                    inicio: " . $item["inicio"] . "<br>
                    tipo: " . $item["tipo"] . "<br>
                </td>
                <td>
                    nombre: " . $item["estudiante"] . "<br>
                    email: " . $item["email"] . "<br>
                </td>
                <td>
                    nombre: " . $item["nombre"] . "<br>
                    idioma: " . $item["idioma"] . "<br>
                </td>    
              </tr>";
    }
}
