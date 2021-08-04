
<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
  $page_title = 'Listado de Material Especial';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);

  
  $all_categories2 = find_all('categories2')
?>

<?php
 if(isset($_POST['add_cat'])){
   $req_field = array('categorie2-name');
   validate_fields($req_field);
   $cat_name = remove_junk($db->escape($_POST['categorie2-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO categories2 (name)";
      $sql .= " VALUES ('{$cat_name}')";
      if($db->query($sql)){
        $session->msg("s", "CATEGORÍA AGREGADA EXITOSAMENTE");
        redirect('categoria.php',false);
      } else {
        $session->msg("d", "Lo siento, registro falló");
        redirect('categoria.php',false);
      }
   } else {
     $session->msg("d", $errors);
     redirect('categoria.php',false);
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
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Agregar Categoría Material Especial</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="categoria.php">
            <div class="form-group">
                <input type="text" class="form-control" name="categorie2-name" placeholder="Nombre de la categoría" required>
            </div>
            <button type="submit" name="add_cat" class="btn btn-primary">Agregar</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Listado de Categorías - Material Especial</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Material Especial</th>
                    <th class="text-center" style="width: 100px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_categories2 as $cat):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cat['name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="editar_categoria.php?id=<?php echo (int)$cat['id'];?>"  class="btn btn-xl btn-warning" data-toggle="tooltip" title="Editar">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a class="btn btn-xl btn-danger" data-toggle="tooltip" title="Eliminar" data-confirm onclick="new jBox('Notice', {content: 'Eliminado', color: 'red', attributes: {y: 'bottom'}, onCreated: function () {
                          location.href = 'eliminar_categoria.php?id=<?php echo (int)$cat['id'];?>'
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
  </div>



<!--Confirm-->

<script src="libs/js/jBox.all.js"></script>
<script src="libs/js/demo.js"></script>

<!--/Confirm-->


  <?php include_once('layouts/footer.php'); ?>