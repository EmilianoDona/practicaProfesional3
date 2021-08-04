<?php
  $page_title = 'Agregar Mobiliario';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $todas_categories = find_all('categories3');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));

     $date    = make_date();
     $query  = "INSERT INTO products3 (";
     $query .=" name,quantity,categorie_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_qty}', '{$p_cat}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"MOBILIARIO AGREGADO EXITOSAMENTE");
       redirect('agregar_mobiliario.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('agregar_mobiliario.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('agregar_mobiliario.php',false);
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
           <a href="lista_mobiliario.php" class="btn btn-primary">Listado Mobiliario</a>
         </div>
        
        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Mobiliario</span>
         </strong>
        </div>
</div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="agregar_mobiliario.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Descripción">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                      <option value="">Ingrese Sala</option>
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
                     <input type="number" class="form-control" name="product-quantity"min="001" max="99999" step="1" placeholder="Ingrese Número de Inventario">
                  </div>
                  </div>
                </div>
              </div>

     
              <button type="submit" name="add_product" class="btn btn-danger">Agregar Mobiliario</button>
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
            <span>EDITAR - ELIMINAR MOBILIARIO</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
      <center><a href="lista_mobiliario.php" class="btn btn-danger">Editar - Eliminar</a></center>

         </div>
        </div>
      </div>
    </div>
      <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-pencil"></span>
            <span>EDITAR - ELIMINAR SALAS</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
      <center><a href="agregar_salas.php" class="btn btn-danger">Editar - Eliminar</a></center>

         </div>
        </div>
      </div>
    </div>
  </div>-->



<?php include_once('layouts/footer.php'); ?>
