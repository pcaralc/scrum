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


    /*function conexionBD() {
        $dbh = null;

        try {
            //mariadb --> nombre del contenedor donde tengamos mysql
            $dsn = "mysql:host=mariaDB2;dbname=juegos";
            $dbh = new PDO($dsn, "root", "toor");
        } catch (PDOException $e){
            echo $e->getMessage();
        }

        return $dbh;
    }
 */
 
 
 
 function insertarJuego($nombre, $descripcion, $genero, $plataforma) {

        
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("INSERT INTO juego (nombre, descripcion, genero, plataforma) VALUES (?, ?, ?, ?)" );
        $fechaCreacion = date('Y-m-d H:i:s');

        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $genero);
        $stmt->bindValue(4, $plataforma);
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

function insertarTruco($nombre, $descripcion, $codJuego) {

        
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("INSERT INTO truco (nombre, descripcion, codJuego) VALUES (?, ?, ?)" );

        $stmt->bindValue(1, $nombre);
        $stmt->bindValue(2, $descripcion);
        $stmt->bindValue(3, $codJuego);

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

function selectJuegos() {
    $conexion = conexionBD();
    $juegos = null;
    try {
        $stmt = $conexion->prepare("SELECT * FROM juego");
        $stmt->execute();
        $juegos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }   
    $conexion = null; //Cerrar la conexión

    return $juegos;
}


function selectTruco($idJuego) {
    $conexion = conexionBD();
    $truco = null;
    try {
        $stmt = $conexion->prepare("SELECT * FROM truco WHERE codJuego = ?");
        $stmt->bindValue(1, $idJuego);
        $stmt->execute();
        $truco = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }   
    $conexion = null; //Cerrar la conexión

    return $truco;
}

function getJuego($id) {
    $conexion = conexionBD();

    try {
        $stmt = $conexion->prepare("SELECT * FROM juego WHERE idJuego = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $juego = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $juego['idJuego'];
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
    $conexion = null; //Cerrar la conexión
    return $id;
}