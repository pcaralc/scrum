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
  echo '<button type="button" class="btn btn-success mt-4 me-3" data-bs-toggle="modal" data-bs-target="#nuevoJuego" style="float:right">INSERTAR </button>';

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
               <button type="button" class="btn btn-danger">  <a class="link-light" style="text-decoration: none" href="controlador.php?accion=borrarJuego&id=' . $j["idJuego"] . '"> BORRAR </a>
               </button> 
               <button type="button" class="btn btn-dark">  <a class="link-light" style="text-decoration: none" href="trucos.php?accion=verTruco&id=' . $j["idJuego"] . '"> VER </a>
               </center>
               </div>
           </div>
          </div>';
  }

  echo '</div>
          </div>
          </div>';
}

/*
function pintarTrucos()
{
  //id_juego, id, descripcion, fecha
  $trucos = selectTruco($_GET[]);

  echo '<button type="button" class="btn btn-secondary mt-4 me-3" data-bs-toggle="modal" data-bs-target="#nuevoTruco" style="float:right">INSERTAR </button>';

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
}*/

function pintarTrucosConID($trucos, $id)
{
  //id_juego, id, descripcion, fecha

  echo '<button type="button" class="btn btn-success mt-4 me-3" data-bs-toggle="modal" data-bs-target="#nuevoTruco" style="float:right">INSERTAR </button>';

  echo ' <div class="row justify-content-center">
    <div class="col-11">
        <div class="row justify-content-around rounded p-3 ">';

  foreach ($trucos as $t) {
    echo '<div class="col-md-3 position-relative mt-5">
       <div class="card" style="width: 18rem;">
           <div class="card-body">
               <h5 class="card-title text-center">' . $t['nombre'] . '</h5>
               <center> <p class="card-text ">' . $t['descripcion'] . '</p> </center>
               <p class="card-text text-center">' . $t['fecha'] . '</p>
               <center> <button type="button" class="btn btn-danger">  <a class="link-light" style="text-decoration: none" href="controlador.php?accion=borrarTruco&id=' . $t["idTruco"] . '&idJuego='. $id.'"> BORRAR </a> </center>

               </div>
           </div>
          </div>';
  }



  echo '</div>
          </div>
          </div>';

  echo "<!-- MODAL INSERTAR TRUCO -->
          <div class='modal fade' id='nuevoTruco' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
              <div class='modal-content'>
                <div class='modal-header'>
                  <h5 class='modal-title' id='exampleModalLabel'>Nuevo Truco</h5>
                </div>
                <div class='modal-body'>
                  <form id='formInsertarTruco' > 
                        <div class='mb-3'>
                            <label for='nombre' class='form-label'>Nombre</label>
                            <input type='text' name='nombre' class='form-control' >
                        </div>
                        <div class='mb-3'>
                            <label for='descripcion' class='form-label'>Descripción</label>
                            <textarea class='form-control' name='descripcion' id='' cols='30' rows='5'></textarea>
                        </div>
                        <input type='hidden' name='idJuego' value='".$id."' />
                    </form>
                </div>
                <div class='modal-footer'>
                  <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                  <button type='submit' name='insertarTruco' class='btn btn-primary' form='formInsertarTruco' 
                  formaction='controlador.php' formmethod='get'>Añadir</button>
      
                </div>
              </div>
            </div>
          </div>";
}
