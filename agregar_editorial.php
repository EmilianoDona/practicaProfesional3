<?php
  $page_title = 'Agregar Libro';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $todas_categories = find_all('categories3');
  //$all_photo = find_all('media');

?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title');
   validate_fields($req_fields);
   if(empty($errors)){
     -$p_name  = remove_junk($db->escape($_POST['product-title']));
     -$p_titulo = remove_junk($db->escape($_POST['product-titulo']));
     -$p_isbn = remove_junk($db->escape($_POST['product-isbn']));
     -$p_tematica = remove_junk($db->escape($_POST['product-tematica']));
     -$p_categorie   = remove_junk($db->escape($_POST['product-categorie']));
     -$p_quantity   = remove_junk($db->escape($_POST['product-quantity']));
     $p_pagina = remove_junk($db-> escape($_POST['product-pagina']));
     $p_editorial = remove_junk($db-> escape($_POST['product-editorial']));
     //if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
       //$media_id = '0';
     //} 
     //else {
       //$media_id = remove_junk($db->escape($_POST['product-photo']));
     //}
     $date    = make_date();
     $query  = "INSERT INTO products3 (";

     $query .="`products3`.`name`, `products3`.`titulo`, `isbn`, `tematica`, `categorie_id`, `quantity`, `pagina`, `editorial`";
     $query .=") VALUES (";
     $query .="'{$p_name}', '{$p_titulo}', '{$p_isbn}', '{$p_tematica}', '{$p_categorie}', '{$p_quantity}', '{$p_pagina}', '{$p_editorial}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE `name`='{$p_name}'";

     if($db->query($query)){
       $session->msg('s',"Producto agregado exitosamente. ");
       redirect('agregar_editorial.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('agregar_editorial.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('agregar_editorial.php',false);
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
  <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="lista_editorial.php" class="btn btn-primary">Listado Libros Editorial</a>
         </div>
        
        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Libros Editorial</span>
         </strong>
        </div>
</div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="agregar_editorial.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                <div class="col-md-4">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-remove"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Marque con una X antes">
               </div>
             </div>
               <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-user"></i>
                  </span>
                  <input type="text" class="form-control" name="product-titulo" placeholder="Autor y Título">
               </div>
             </div>              
           </div>
         </div>
         <!---->
<div class="form-group">
                <div class="row">
                <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-book"></i>
                  </span>
                  <input type="text" class="form-control" name="product-isbn" placeholder="ISBN">
               </div>
             </div>
               <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-text-size"></i>
                  </span>
                  <input type="text" class="form-control" name="product-tematica" placeholder="Temática">
               </div>
             </div>              
           </div>
         </div>
         <!---->
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                      <option value="">Ingrese Categoría Editorial</option>
                    <?php  foreach ($todas_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-md-6">

                    <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-sound-5-1"></i>
                     </span>
                     <input type="number" class="form-control" name="product-quantity"min="001" max="3000" step="1" placeholder="Ingrese Número de Edición">
                  </div>
                  </div>
                </div>
              </div>
     <div class="form-group">
                <div class="row">
                <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-plus"></i>
                  </span>
                  <input type="text" class="form-control" name="product-pagina" placeholder="Cantidad de Páginas">
               </div>
             </div>
             <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-random"></i>
                  </span>
                   <input type="text" class="form-control" name="product-editorial" placeholder="Editorial">
               </div>
             </div>           
           </div>
         </div>
              <button type="submit" name="add_product" class="btn btn-danger">Agregar Libro</button>

          </form>
         </div>
        </div>
      </div>
    </div>
  </div>


  <!--Acá-->
  <!--<div class="row">
  <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-pencil"></span>
            <span>EDITAR - ELIMINAR MATERIAL ESPECIAL</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
      <center><a href="lista_material.php" class="btn btn-danger">Editar - Eliminar</a></center>

         </div>
        </div>
      </div>
    </div>
      <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-pencil"></span>
            <span>EDITAR - ELIMINAR CATEGORÍA</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
      <center><a href="categoria.php" class="btn btn-danger">Editar - Eliminar</a></center>

         </div>
        </div>
      </div>
    </div>
  </div>-->



<?php include_once('layouts/footer.php'); ?>
