<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
  $page_title = 'Listado de Material';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
    $products = join_product2_table();
?>


<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-heading clearfix">
         <div class="pull-right">
              <a href="imprimirMaterial.php" class="btn btn-danger" style="text-transform: uppercase;" target="_blank">Imprimir pdf</a>
               &nbsp;
           <a href="agregar_material.php" class="btn btn-primary">Agregar Material Especial</a>
         </div>
        
        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Listado Material Especial</span>
         </strong>
        </div>
</div>

        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>

                <th class="text-center" style="width: 7%;background-color:#E5FEC4"> Inventario </th>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Autor </th>
                <th class="text-center" style="width: 20%;background-color:#E5FEC4"> Título </th>
                <th class="text-center" style="width: 10%;background-color:#E5FEC4"> Soporte </th>
                <th class="text-center" style="width: 10%;background-color:#E5FEC4"> Descriptores </th>
                <th class="text-center" style="width: 5%;background-color:#E5FEC4"> Existencia </th>
                <!-- <th class="text-center" style="width: 15%;background-color:#E5FEC4"> Última Modificación </th> -->
                <th class="text-center" style="width: 11%;background-color:#E5FEC4"> Editar-Eliminar </th>

              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                
                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['name']); ?></td>
                


                <td class="text-center"> <?php echo remove_junk($product['titulo']); ?></td>
                

                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>

               
                <td class="text-center"> <?php echo remove_junk($product['descriptores']); ?></td>
                <td class="text-center" style="text-transform: uppercase;"> <?php echo remove_junk($product['existencia']); ?></td>

                
                <!-- <td class="text-center"> <?php echo read_date($product['date']); ?></td> -->
                <td class="text-center">
                  <div class="btn-group">
                    <a href="editar_material.php?id=<?php echo (int)$product['id'];?>" class="btn btn-warning btn-xl"  title="Editar" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                     

<a class="btn btn-xl btn-danger" data-toggle="tooltip" title="Eliminar" data-confirm onclick="new jBox('Notice', {content: 'Eliminado', color: 'red', attributes: {y: 'bottom'}, onCreated: function () {
                          location.href = 'eliminar_material.php?id=<?php echo (int)$product['id'];?>'
                        }})">
  <span class="glyphicon glyphicon-trash"></span>

</a>

                    
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>



  <?php include_once('layouts/footer.php'); ?>


<!--Confirm-->

<script src="libs/js/jBox.all.js"></script>
<script src="libs/js/demo.js"></script>

<!--/Confirm-->
