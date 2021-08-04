<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $product = find_by_id('products2',(int)$_GET['id']);
  if(!$product){
    $session->msg("d","ID vacío");
    redirect('lista_material.php');
  }
?>
<?php
  $delete_id = delete_by_id('products2',(int)$product['id']);
  if($delete_id){
      $session->msg("s","MATERIAL ESPECIAL ELIMINADO EXITOSAMENTE");
      redirect('lista_material.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('lista_material.php');
  }
?>

