<?php
  $page_title = 'Agregar Material';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $todas_categories = find_all('categories2');
  //$all_photo = find_all('media');

?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_titulo = remove_junk($db->escape($_POST['product-titulo']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_descriptores = remove_junk($db-> escape($_POST['product-descriptores']));
     $p_existencia = remove_junk($db-> escape($_POST['product-existencia']));

     $date    = make_date();
     $query  = "INSERT INTO products2 (";

     $query .="`products2`.`name`,`titulo`, `quantity`, `categorie_id`,`descriptores`,`date`,`existencia`";
     $query .=") VALUES (";
     $query .="'{$p_name}', '{$p_titulo}', '{$p_qty}', '{$p_cat}', '{$p_descriptores}','{$date}', '{$p_existencia}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";

     if($db->query($query)){
       $session->msg('s',"MATERIAL ESPECIAL AGREGADO EXITOSAMENTE");
       redirect('agregar_material.php', false);
     } else {
       $session->msg('d',' Lo siento, registro falló.');
       redirect('agregar_material.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('agregar_material.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<style>
#cuadrado {
  width:50px;
  margin-left:-27px; 
  margin-top:-150px;
  height:0;
  padding-top:25%;
  position:relative;
  background:#F1F2F7;
}
#cuadrado2 {
  width:50px;
  margin-left:38px; 
  margin-top:-250px;
  height:0;
  padding-top:25%;
  position:relative;
  background:#F1F2F7;
}
#siNo{
  margin-top:50px;
  font-weight: bold;
  font-size: 20px;
  margin-left:-400px;
}
#conExistencia{
margin-top:-83px;
margin-left: 30px;
font-weight:bold;
font-size: 20px;
}
#sinExistencia{
margin-top: -28px;
margin-left: 30px;
font-weight: bold;
font-size: 20px;
} 
</style>
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
           <a href="lista_material.php" class="btn btn-primary">Listado Material Especial</a>
         </div>
        
        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Material Especial</span>
         </strong>
        </div>
</div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="agregar_material.php" class="clearfix">
              <div class="form-group">
                <div class="row">
                <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-user"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Autor">
               </div>
             </div>
               <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-list-alt"></i>
                  </span>
                  <input type="text" class="form-control" name="product-titulo" placeholder="Título">
               </div>
             </div>              
           </div>
         </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="product-categorie">
                      <option value="">Ingrese Categoría Material Especial</option>
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
     <div class="form-group">
                <div class="row">
                <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-tag"></i>
                  </span>
                  <input type="text" class="form-control" name="product-descriptores" placeholder="Descriptores">
               </div>
             </div>
             <div class="col-md-6">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-resize-full"></i>
                  </span>
                   <input type="text" class="form-control" name="product-existencia" placeholder="¿Está en Existencia? SI-NO">
               </div>
             </div>           
           </div>
         </div>
              <button type="submit" name="add_product" class="btn btn-danger">Agregar Material Especial</button>

          </form>

          
         </div>


        </div>
     
    </div>
    <div id="siNo">

<?php

function existencia_no(){
  // global $db;
 $sql = "SELECT COUNT(id) FROM products2 WHERE existencia LIKE '%no%';";
 return find_by_sql($sql);
}


function existencia_si(){
  // global $db;
 $sql = "SELECT COUNT(id) FROM products2 WHERE existencia LIKE '%si%';";
 return find_by_sql($sql);
}

  $productsSi = existencia_si();
  $productsNo = existencia_no();
  print_r($productsSi);
  ?>
  <br><br>
  <?php
  print_r($productsNo);

  
?>

        
      </div>

      <div class="container" >
        <div class="row">
          <div class="col-md-5">
          <div id="conExistencia">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MATERIAL CON EXISTENCIA
      </div>
          </div>
        </div>
      </div>
    
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div id="sinExistencia">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MATERIAL SIN EXISTENCIA
          </div>
          </div>
        </div>
      </div>
      <br> <br> <br> <br> 
<div id="cuadrado" >
</div>
<div id="cuadrado2">
</div>
</div>

<?php include_once('layouts/footer.php'); ?>
