<!--Nuevo-->
<?php
  $page_title = 'Editar Libros Editorial';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$product = find_by_id('products',(int)$_GET['id']);
$all_categories = find_all('categories');

?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-categorie','product-quantity');
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_titulo = remove_junk($db->escape($_POST['product-titulo']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
       $p_descriptores = remove_junk($db-> escape($_POST['product-descriptores']));
       $p_existencia = remove_junk($db-> escape($_POST['product-existencia']));
       $p_editorial = remove_junk($db-> escape($_POST['product-editorial']));
       $p_buy   = remove_junk($db->escape($_POST['buying-price']));
       $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
       $query   = "UPDATE products SET";
       $query  .=" name ='{$p_name}',titulo='{$p_titulo}',quantity ='{$p_qty}',";
       $query  .=" buy_price ='{$p_buy}', sale_price ='{$p_sale}',categorie_id ='{$p_cat}',media_id='{$media_id}',descriptores='$p_descriptores',existencia='$p_existencia',editorial='$p_editorial'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"LIBRO ACTUALIZADO EXITOSAMENTE");
                 redirect('stock.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('stock.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('stock.php?id='.$product['id'], false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Editar Libros Editorial</span>
         </strong>
        </div>
        <div class="panel-body">
          <div class="form-group">
          <div class="row">
          <!-- Autor - Título -->
         <div class="col-md-4">
          <form method="post" action="editar_stock.php?id=<?php echo (int)$product['id'] ?>">
          <ul class="list-group" >
          <li class="list-group-item active" >
          <i class="glyphicon glyphicon-user"></i>
          &nbsp;&nbsp; AUTOR - TÍTULO - AÑO:
          </li>
          <input type="text" class="form-control" name="product-title" value="<?php echo remove_junk($product['name']);?>">
          </ul>
          </div>
          <!-- Autor - Título -->
          <!-- Año Edición -->
          <div class="col-md-4">
          <ul class="list-group" >
          <li class="list-group-item active" >
          <i class="glyphicon glyphicon-list-alt"></i>
          &nbsp;&nbsp;PROCEDENCIA:
          </li>
          <input type="text" class="form-control" name="product-titulo" value="<?php echo remove_junk($product['titulo']);?>">
          </ul>         
          </div>
          <!-- Año Edición -->
          <!-- Categoría -->
          <div class="col-md-4">
          <ul class="list-group">
          <li class="list-group-item active">
          <i class="glyphicon glyphicon-th-large"></i>
          &nbsp;&nbsp;SELECCIONE CATEGORÍA:
          </li>
          <select class="form-control" name="product-categorie">
          <option value="">Selecciona Categoría:</option>
          <?php  foreach ($all_categories as $cat): ?>
          <option value="<?php echo (int)$cat['id']; ?>" <?php if($product['categorie_id'] === $cat['id']): echo "selected"; endif; ?> >
          <?php echo remove_junk($cat['name']); ?></option>
          <?php endforeach; ?>
          </select>
          </ul>
          </div>
          <!-- Categoría -->
          </div>
          </div>



        <div class="form-group">
        <div class="row">
        <!-- ISBN -->
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <i class="glyphicon glyphicon-book"></i>
        &nbsp;&nbsp;STOCK:
        </li>
        <input type="text" class="form-control" name="product-quantity" value="<?php echo remove_junk($product['quantity']);?>">
        </ul>      
        </div>
        <!-- ISBN -->
        <!-- Temática -->
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <i class="glyphicon glyphicon-text-width"></i>
        &nbsp;&nbsp; TEMÁTICA:
        </li>
        <input type="text" class="form-control" name="product-descriptores" value="<?php echo remove_junk($product['descriptores']);?>">
        </ul>
        </div>
        <!-- Temática -->
        <!-- Páginas -->
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <i class="glyphicon glyphicon-forward"></i>
        &nbsp;&nbsp;PÁGINAS:
        </li>
        <input type="text" class="form-control" name="product-existencia" value="<?php echo remove_junk($product['existencia']);?>">
        </ul>
        </div>
        <!-- Páginas -->
        </div>
        </div>



        <div class="form-group" style="margin-top:30px;">
        <div class="row">
        <!-- Editorial -->
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <i class="glyphicon glyphicon-equalizer"></i>
        &nbsp;&nbsp;EDITORIAL:
        </li>
        <input type="text" class="form-control" name="product-editorial" value="<?php echo remove_junk($product['editorial']);?>">
        </ul>
        </div>
        <!-- Editorial -->
        <!-- Precio de Compra -->
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <i class="glyphicon glyphicon-usd"></i>
        &nbsp;&nbsp;PRECIO DE COMPRA:
        </li>
        <input type="text" class="form-control" name="buying-price" value="<?php echo remove_junk($product['buy_price']);?>">
        </ul>
        </div>
        <!-- Precio de Compra -->
        <!-- Precio de Venta -->
        <div class="col-md-4">
        <ul class="list-group" >
        <li class="list-group-item active" >
        <i class="glyphicon glyphicon-usd"></i>
        &nbsp;&nbsp;PRECIO DE VENTA:
        </li>
        <input type="text" class="form-control" name="saleing-price" value="<?php echo remove_junk($product['sale_price']);?>">
        </ul>
        </div>
        <!-- Precio de Venta -->
        </div>
        </div>
        <button type="submit" name="product" class="btn btn-danger">Actualizar</button>
             </form>
          </div>
        </form>
      </div>
    </div>



<?php include_once('layouts/footer.php'); ?>


  <!--/Nuevo-->