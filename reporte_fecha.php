<link rel="stylesheet" href="libs/css/jBox.all.css">

<?php
$page_title = 'Reporte Ventas Editorial';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<style>
#rangoFechas{
  font-size:17px;
  text-transform: uppercase;
}
</style>
<?php include_once('layouts/header.php'); ?>


<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="panel">
    <div class="panel-heading clearfix">
        
        <div class="panel-heading">

          <strong>
            <span class="glyphicon glyphicon-th" id="rangoFechas"></span>
            <span id="rangoFechas">Rango de Fechas</span>
         </strong>
        </div>
</div>
      <div class="panel-body">
          <form class="clearfix" method="post" target="_blank" action="reporte.php">
            <div class="form-group">
                <div class="input-group">
                  <input type="text" class="datepicker form-control" name="start-date" placeholder="Desde">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-menu-right"></i></span>
                  <input type="text" class="datepicker form-control" name="end-date" placeholder="Hasta">
                </div>
            </div>
            <div class="form-group">
                 <button type="submit" name="submit" class="btn btn-primary">Generar Reporte</button>
            </div>
          </form>
      </div>

    </div>
  </div>

</div>
<?php include_once('layouts/footer.php'); ?>
