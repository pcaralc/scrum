<?php include('cabecera.php'); ?>
<?php include('lib.php'); ?>
<?php
if ($_GET) {

    if ($_GET['accion'] == 'verTruco') {
        pintarTrucosConID(selectTruco(filtrado($_GET['id'])), $_GET['id']);
    }
}
?>

<?php include('pie.php'); ?>