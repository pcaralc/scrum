<?php

echo '<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>';

    echo "<!-- MODAL INSERTAR TAREA -->
    <div class='modal fade' id='nuevoJuego' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
      <div class='modal-dialog'>
        <div class='modal-content'>
          <div class='modal-header'>
            <h5 class='modal-title' id='exampleModalLabel'>Nuevo Juego</h5>
          </div>
          <div class='modal-body'>
            <form id='formInsertarJuego' > 
                  <div class='mb-3'>
                      <label for='nombre' class='form-label'>Nombre</label>
                      <input type='text' name='nombre' class='form-control' >
                  </div>
                  <div class='mb-3'>
                      <label for='descripcion' class='form-label'>Descripción</label>
                      <textarea class='form-control' name='descripcion' id='' cols='30' rows='5'></textarea>
                  </div>
                  <div class='mb-3'>
                      <label for='genero' class='form-label'>Género</label>
                      <input type='text' name='genero' class='form-control' >
                  </div>
                  <div class='mb-3'>
                  <label for='plataforma' class='form-label'>Plataforma</label>
                  <input type='text' name='plataforma' class='form-control' >
              </div>
              </form>
          </div>
          <div class='modal-footer'>
            <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
            <button type='submit' name='insertarJuego' class='btn btn-primary' form='formInsertarJuego' 
            formaction='controlador.php' formmethod='get'>Añadir</button>

          </div>
        </div>
      </div>
    </div>";
echo '</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="./js/scripts.js"></script>
</body>
</html>';


?>