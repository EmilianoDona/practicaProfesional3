<?php
  $page_title = 'Editar categoría';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $categorie2 = find_by_id('categories2',(int)$_GET['id']);
  if(!$categorie2){
    $session->msg("d","Missing categorie2 id.");
    redirect('categoria.php');
  }
?>

<?php
if(isset($_POST['edit_cat'])){
  $req_field = array('categorie2-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['categorie2-name']));
  if(empty($errors)){
        $sql = "UPDATE categories2 SET name='{$cat_name}'";
       $sql .= " WHERE id='{$categorie2['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "CATEGORÍA ACTUALIZADA EXITOSAMENTE");
       redirect('categoria.php',false);
     } else {
       $session->msg("d", "Lo siento, actualización falló.");
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
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editando <?php echo remove_junk(ucfirst($categorie2['name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="editar_categoria.php?id=<?php echo (int)$categorie2['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="categorie2-name" value="<?php echo remove_junk(ucfirst($categorie2['name']));?>">
           </div>
           <button type="submit" name="edit_cat" class="btn btn-primary">Actualizar</button>
       </form>
       </div>
     </div>
   </div>
</div>




<?php include_once('layouts/footer.php'); ?>
