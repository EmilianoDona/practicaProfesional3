<?php
  $page_title = 'Cambiar contraseña';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(3);
?>
<?php $user = current_user(); ?>
<?php
  if(isset($_POST['update'])){

    $req_fields = array('new-password','old-password','id' );
    validate_fields($req_fields);

    if(empty($errors)){

             if(sha1($_POST['old-password']) !== current_user()['password'] ){
               $session->msg('d', "Tu antigua contraseña no coincide");
               redirect('cambiar_clave.php',false);
             }

            $id = (int)$_POST['id'];
            $new = remove_junk($db->escape(sha1($_POST['new-password'])));
            $sql = "UPDATE users SET password ='{$new}' WHERE id='{$db->escape($id)}'";
            $result = $db->query($sql);
                if($result && $db->affected_rows() === 1):
                  $session->logout();
                  $session->msg('s',"Inicia sesión con tu nueva contraseña.");
                  redirect('index.php', false);
                else:
                  $session->msg('d',' Lo siento, actualización falló.');
                  redirect('cambiar_clave', false);
                endif;
    } else {
      $session->msg("d", $errors);
      redirect('cambiar_clave.php',false);
    }
  }
?>
<?php include_once('layouts/header.php'); ?>

  <div class="col-md-6">
    <div class="panel panel-default">
      <div class="panel-heading">
          <div class="panel-heading clearfix">
            <span class="glyphicon glyphicon-pencil"></span>
            <span><b>Cambiar Contraseña</b></span>
          </div>
        </div>
      <div class="panel-body">
          <form method="post" action="cambiar_clave.php" class="clearfix">
            <div class="form-group">
              <label for="newPassword" class="control-label">Nueva contraseña</label>
              <input type="password" class="form-control" name="new-password" placeholder="Nueva contraseña">
            </div>
            <div class="form-group">
              <label for="oldPassword" class="control-label">Antigua contraseña</label>
              <input type="password" class="form-control" name="old-password" placeholder="Antigua contraseña">
            </div>
            <div class="form-group clearfix">
               <input type="hidden" name="id" value="<?php echo (int)$user['id'];?>">
                <button type="submit" name="update" class="btn btn-info">Cambiar</button>
        </div>
        </form>
      </div>
    </div>
  </div>



<?php include_once('layouts/footer.php'); ?>
