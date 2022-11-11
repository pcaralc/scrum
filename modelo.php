<?php
  /**
     * Crea una conexión nueva a BBDD
     */
    function conexionBD() {
        $dbh = null;

        try {
            //mariadb --> nombre del contenedor donde tengamos mysql
            $dsn = "mysql:host=eu-cdbr-west-03.cleardb.net;dbname=heroku_5cb39df45ff2848";
            $dbh = new PDO($dsn, "b15c539cef2247", "9accbd53");
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        return $dbh;
    }


    function conexionBD2() {
        $dbh = null;

        try {
            //mariadb --> nombre del contenedor donde tengamos mysql
            $dsn = "mysql:host=mysql;dbname=php";
            $dbh = new PDO($dsn, "root", "toor");
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        return $dbh;
    }
 
 
 
 
 function insertarJuego($nombre, $descripcion, $genero, $imagen, $plataforma) {

        
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("INSERT INTO juego (nombre, descripcion, genero, imagen, plataforma) VALUES (?, ?, ?, ?, ?)" );
        $fechaCreacion = date('Y-m-d H:i:s');

        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $genero);
        $stmt->bindValue(4, $imagen);
        $stmt->bindValue(5, $plataforma);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

function borrarJuego($idJuego) {
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("DELETE FROM juego WHERE idJuego = ?");
        $stmt->bindValue(1, $idJuego);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión
}

function insertarTruco($truco, $descripcion, $fecha, $idJuego) {

        
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("INSERT INTO truco (truco, descripcion, fecha, idJuego) VALUES (?, ?, ?, ?)" );
        $fecha = date('Y-m-d H:i:s');

        $stmt->bindValue(1, $truco);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $fecha);
        $stmt->bindValue(4, $idJuego);

        header("Location: controlador.php?accion=acceso");

        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}


function borrarTruco($idTruco) {
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("DELETE FROM truco WHERE idTruco = ?");
        $stmt->bindValue(1, $idTruco);
        $stmt->execute();
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión
}