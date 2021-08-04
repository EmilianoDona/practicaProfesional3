<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $categorie = find_by_id('categories3',(int)$_GET['id']);
  if(!$categorie){
    $session->msg("d","ID de la categoría falta.");
    redirect('agregar_salas.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories3',(int)$categorie['id']);
  if($delete_id){
      $session->msg("s","SALA ELIMINADA EXITOSAMENTE");
      redirect('agregar_salas.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('agregar_salas.php');
  }
?>
