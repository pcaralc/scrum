<?php
include_once('modelo.php');
include_once('lib.php');

//Acciones con GET
if ($_GET) {


    if (isset($_GET['insertarJuego'])) {
        $nombre = filtrado($_GET['nombre']);
        $descripcion = filtrado($_GET['descripcion']);
        $genero = filtrado($_GET['genero']);
        $plataforma = filtrado($_GET['plataforma']);    
        insertarJuego($nombre,$descripcion,$genero,$plataforma);

        header("Location: index.php");
    }

    if (isset($_GET['accion'])) {
        if ($_GET['accion'] == 'borrarJuego') {
            borrarJuego($_GET['id']);
            header("Location: index.php");
        }

       
    
        if ($_GET['accion'] == 'borrarTruco') {
            borrarTruco(filtrado($_GET['id']));
            $codJuego = $_GET['idJuego'];
            header("Location: trucos.php?accion=verTruco&id=".$codJuego."");
        }

       
    }

    if (isset($_GET['insertarTruco'])) {
        //$truco, $descripcion, $idJuego
        $nombre = filtrado($_GET['nombre']);
        $descripcion = filtrado($_GET['descripcion']);
        $codJuego = $_GET['idJuego'];
        insertarTruco($nombre,$descripcion, $codJuego);

        header("Location: trucos.php?accion=verTruco&id=".$codJuego."");
    }

   
}



//Acciones con POST 
if ($_POST) {

}
