<?php include_once('modelo.php'); ?>
<?php
//Función para limpiar los input de los formularios
function filtrado($datos)
{
    $datos = trim($datos); // Elimina espacios antes y después de los datos
    $datos = stripslashes($datos); // Elimina backslashes \
    $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
    return $datos;
}

function pintarJuegos()
{


    $juegos = selectJuegos();
    echo '<button type="button" class="btn btn-secondary mt-4 me-3" data-bs-toggle="modal" data-bs-target="#nuevoJuego" style="float:right">INSERTAR </button>';
    
    echo ' <div class="row justify-content-center">
    <div class="col-11">
        <div class="row justify-content-around rounded p-3 ">';

    foreach ($juegos as $j) {
        echo '<div class="col-md-3 position-relative mt-5">
       <div class="card" style="width: 18rem;">
           <div class="card-body">
               <h5 class="card-title text-center">' . $j['nombre'] . '</h5>
               <center> <p class="card-text">' . $j['descripcion'] . '</p> </center>
               <p class="card-text text-center">' . $j['genero'] . '</p>
               <p class="card-text text-center">' . $j['plataforma'] . '</p>
               <center>
               <button type="button" class="btn btn-primary">  <a class="link-light" style="text-decoration: none" href="controlador.php?accion=borrarJuego&id=' . $j["idJuego"].'"> BORRAR </a>
               </button> 
               <button type="button" class="btn btn-primary"> VER </button> 
               </center>
               </div>
           </div>
          </div>';
    }

    echo '</div>
          </div>
          </div>';
}

function pintarTrucos()
{
    //id_juego, id, descripcion, fecha
    $trucos = selectTruco();

    echo '<button type="button" class="btn btn-secondary mt-4 me-3" style="float:right" href="controlador.php?accion=insertarTruco"> INSERTAR </button>';

    echo ' <div class="row justify-content-center">
    <div class="col-11">
        <div class="row justify-content-around rounded p-3 ">';

    foreach ($trucos as $t) {
        echo '<div class="col-md-3 position-relative mt-5">
       <div class="card" style="width: 18rem;">
           <div class="card-body">
               <h5 class="card-title text-center">' . $t['nombre'] . '</h5>
               <center> <p class="card-text">' . $t['descripcion'] . '</p> </center>
               <p class="card-text text-center">' . $t['fecha'] . '</p>
               <button type="button" class="btn btn-secondary" href="controlador.php?accion=borrarTruco&id" > BORRAR </button> 
               </div>
           </div>
          </div>';
    }

    echo '</div>
          </div>
          </div>';
}