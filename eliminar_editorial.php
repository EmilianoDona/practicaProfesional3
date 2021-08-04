<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php
  $product = find_by_id('products3',(int)$_GET['id']);
  if(!$product){
    $session->msg("d","ID vacío");
    redirect('lista_editorial.php');
  }
?>
<?php
  $delete_id = delete_by_id('products3',(int)$product['id']);
  if($delete_id){
      $session->msg("s","Producto eliminado");
      redirect('lista_editorial.php');
  } else {
      $session->msg("d","Eliminación falló");
      redirect('lista_editorial.php');
  }
?>

