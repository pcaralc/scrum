<?php
include_once('modelo.php');
include_once('lib.php');

//Acciones con GET
if ($_GET) {
    if ($_GET['accion'] == 'borrarJuego') {
        borrarJuego(filtrado($_GET['id']));
        header("Location: index.php");
    }

    if ($_GET['accion'] == 'borrarTruco') {
        borrarTruco(filtrado($_GET['id']));
        header("Location: trucos.php");
    }

    if (isset($_GET['inserJuego'])) {
        $nombre = filtrado($_GET['nombre']);
        $descripcion = filtrado($_GET['descripcion']);
        $prioridad = filtrado($_GET['prioridad']);
        $fechaFin = filtrado($_GET['fechaFin']);
        insertarTarea($nombre,$descripcion,$prioridad,$fechaFin, getUsuario($_SESSION['login']));

        header("Location: controlador.php?accion=crear");
    }

}



//Acciones con POST 
if ($_POST) {

}
?>