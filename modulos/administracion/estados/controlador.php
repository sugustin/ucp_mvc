<?php
if (isset($_GET['f'])) 
{
  $function = $_GET['f'];
}
  else 
  {
    $function = "";
  }

session_start();
include("../../../inc/conexion.php");
conectar();

if (function_exists($function)) 
{
  $function($con);
}
else 
{
  echo "La funcion" . $function . "no exite...";
}

function editar($con){
  $id = addslashes($_POST['id']);
  $descripcion = addslashes($_POST['descripcion']);
  $letra = addslashes($_POST['letra']);
  $color = addslashes($_POST['color']);
  $usuario_abm= addslashes($_SESSION['username']); 
  
  if ($id > 0) 
  {
    //update
    $sql = "UPDATE estados SET descripcion = '$descripcion', letra = '$letra', color = '$color', usuario_abm = '$usuario_abm' WHERE id = $id";
    $mesaje="El registro se modificó con éxito";
  }
  else 
  {
    // insert
    $sql = "INSERT INTO estados (descripcion, letra, color, usuario_abm) VALUES ('$descripcion', '$letra', '$color', 'admin');";
    $mesaje="El registro se creó con éxito";
  }

  //ejecuto la consulta
  $sql = mysqli_query($con,$sql);
  if(!mysqli_error($con))  
  {
    echo '
    <div class="alert alert-primary animated--grow-in" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>
    <i class="far fa-check-circle"></i> '.$mesaje.'
    </div>';
    echo "<script>listado();</script>";
    echo "<script>cerrar_formulario();</script>";
  }
    else
    {
      echo '
      <div class="alert alert-danger animated--grow-in" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <i class="fas fa-exclamation-triangle"></i> No se pudo crear el registro
      </div>';
  }
}


function eliminar($con)
{
  $id = addslashes($_POST['id']);
  $sql = "DELETE FROM estados WHERE id = ".$id;
  $res = mysqli_query($con,$sql);
  if ($res === false) 
  {
    echo '
    <div class="alert alert-danger animated--grow-in" role="alert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <i class="fas fa-exclamation-triangle"></i> No se pudo eliminar el registro
    </div>';
  }
    else
    {
      echo '
      <div class="alert alert-primary animated--grow-in" role="alert">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <i class="far fa-check-circle"></i> El registro se eliminó con éxito
      </div>';
    }
}

/**
 * Agentes
 */
function agentes($con)
{
  $sql = "SELECT * FROM personas";
}

/**
 * Articulos
 */
function articulos($con)
{
  $sql = "SELECT * FROM articulos";
  $rs = pg_query($con, $sql);
  $res = pg_fetch_all($rs);

}

/**
 * Estados
 */
function estados($con)
{
  $sql = "SELECT * FROM estados";
  $rs = pg_query($con, $sql);
  $res = pg_fetch_all($rs);
  
  return json_encode(['result' => $res]);
}