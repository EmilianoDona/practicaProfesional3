<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $categorie2 = find_by_id('categories2',(int)$_GET['id']);
  if(!$categorie2){
    $session->msg("d","ID de la categoría falta.");
    redirect('categoria.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories2',(int)$categorie2['id']);
  if($delete_id){
      $session->msg("s","CATEGORÍA ELIMINADA EXITOSAMENTE");
      redirect('categoria.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('categoria.php');
  }
?>
