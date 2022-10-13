<form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="number" name="idProfesor"
           placeholder="Ingrese Id Profesor"><br>
    <input type="submit" value="Mostrar">
</form>
<?php
if (!empty($_POST)) {
    $id_profesor = $_POST["idProfesor"];
    include_once "ProfesorControlador.php";
    include_once "ProgramacionControlador.php";

    $profesorControlador = new ProfesorControlador();
    $programacionControlador = new ProgramacionControlador();

    $infoProfesor = $profesorControlador->mostrarProfesor($id_profesor);
?>
    <table border="1">
            <tr>
               <th>Docente</th> 
               <th>Programaciones</th> 
            </tr>
<?php
    foreach ($infoProfesor as $profesor) {
        echo "<tr>
                <td>
                    Profesor: " . $profesor["nombre"] . "<br>
                    Idioma: " . $profesor["idioma"] . "
                </td> 
                <td><ul>";
                    $infoProgramacion = $programacionControlador->mostrarPorProfesor($profesor["id"]);
                    foreach ($infoProgramacion as $programacion) {
                        if($programacionControlador->esProgramacionLibre($programacion["id"])) {
                            echo "<li>Inicio: " . $programacion["inicio"] . "<br>
                                      Tipo: " . $programacion["tipo"] . "</li>";
                        }
                    }
        echo   "</ul></td>
              </tr>";
    }
?>
    </table>
<?php
}
