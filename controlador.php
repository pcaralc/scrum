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
        $genero = filtrado($_GET['genero']);
        $plataforma = filtrado($_GET['plataforma']);    
        insertarJuego($nombre,$descripcion,$genero,$plataforma);

        header("Location: controlador.php?accion=crear");
    }

}



//Acciones con POST 
if ($_POST) {

}
?>