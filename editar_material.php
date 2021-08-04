

  <!--Nuevo-->

  <?php
  $page_title = 'Editar Material';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
$product = find_by_id('products2',(int)$_GET['id']);
$all_categories = find_all('categories2');
/*$all_photo = find_all('media');*/
/*if(!$product){
  $session->msg("d","Missing product id.");
  redirect('lista_material.php');
}*/
?>
<?php
 if(isset($_POST['product'])){
    $req_fields = array('product-title','product-titulo','product-categorie','product-quantity');
    validate_fields($req_fields);

   if(empty($errors)){
       $p_name  = remove_junk($db->escape($_POST['product-title']));
       $p_titulo = remove_junk($db->escape($_POST['product-titulo']));
       $p_cat   = (int)$_POST['product-categorie'];
       $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
       $p_descriptores = remove_junk($db-> escape($_POST['product-descriptores']));
       $p_existencia = remove_junk($db-> escape($_POST['product-existencia']));
       //$p_titulo   = remove_junk($db->escape($_POST['product-titulo']));
       //$p_descriptores = remove_junk($db->escape($_POST['product-descriptores']));
       //,'product-titulo','product-descriptores'
       //descriptores='{$p_descriptores}',titulo='{$p_titulo}'
       
       //

       $query   = "UPDATE products2 SET";
       $query  .=" name ='{$p_name}',titulo='{$p_titulo}',quantity ='{$p_qty}',";
       $query  .=" categorie_id ='{$p_cat}',media_id='{$media_id}',descriptores='{$p_descriptores}',existencia='{$p_existencia}'";
       $query  .=" WHERE id ='{$product['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"MATERIAL ESPECIAL ACTUALIZADO EXITOSAMENTE");
                 redirect('lista_material.php', false);
               } else {
                 $session->msg('d',' Lo siento, actualización falló.');
                 redirect('editar_material.php?id='.$product['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('editar_material.php?id='.$product['id'], false);
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
            <span>Editar Material</span>
         </strong>
        </div>
        <div class="panel-body">
          <div class="form-group">
          <div class="row">
         <div class="col-md-6">
          
           <form method="post" action="editar_material.php?id=<?php echo (int)$product['id'] ?>">

              <ul class="list-group" >
  <li class="list-group-item active" >
  <i class="glyphicon glyphicon-user"></i>
  &nbsp;&nbsp;AUTOR:
  </li>
  <input type="text" class="form-control" name="product-title" value="<?php echo remove_junk($product['name']);?>">
  </ul>
            </div>
            <div class="col-md-6">
              <ul class="list-group">
  <li class="list-group-item active">
  <i class="glyphicon glyphicon-list-alt"></i>
  &nbsp;&nbsp;TÍTULO:
  </li>
  <input type="text" class="form-control" name="product-titulo" value="<?php echo remove_junk($product['titulo']);?>">
  </ul>
            </div>
          </div>
        </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">

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
                 <div class="col-md-6">
                     <ul class="list-group">
  <li class="list-group-item active">
  <i class="glyphicon glyphicon-book"></i>
  &nbsp;&nbsp;INVENTARIO:
  </li>
  <input type="text" class="form-control" name="product-quantity" value="<?php echo remove_junk($product['quantity']);?>">
  </ul>
                    
                  </div>
                 </div>
               </div>
               <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
 <ul class="list-group">
  <li class="list-group-item active">
  <i class="glyphicon glyphicon-object-align-left"></i>
  &nbsp;&nbsp;DESCRIPTORES:
  </li>
  <input type="text" class="form-control" name="product-descriptores" value="<?php echo remove_junk($product['descriptores']);?>">
  </ul>



            
            </div>
            <div class="col-md-6">

 <ul class="list-group">
  <li class="list-group-item active">
  <i class="glyphicon glyphicon-indent-left"></i>
  &nbsp;&nbsp;EXISTENCIA:
  </li>
  <input type="text" class="form-control" name="product-existencia" value="<?php echo remove_junk($product['existencia']);?>">
  </ul>

              
            </div>
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