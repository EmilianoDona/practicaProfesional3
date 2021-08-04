<?php
  $page_title = 'Home ';
  require_once('includes/load.php');

  // Checkin What level user has permission to view this page
   /**page_require_level(1);
   page_require_level(2);
   page_require_level(3);*/
     if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php
 $c_categorie     = count_by_id('categories3');
 $c_editorial     = count_by_id('products');
 $ventas_editorial= count_by_id('sales');
 $c_user          = count_by_id('users');
 $c_categories2   = count_by_id('categories2');
 $c_material      = count_by_id('products2');
 $c_mobiliario    = count_by_id('products3');
 $categories3     = count_by_id('categories');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5');



?>
<?php include_once('layouts/header.php'); ?>

<style>
#margenArriba{
  margin-top:50px;
}
#margenArriba2{
  margin-top:50px;
}
#usuariosColor{
  background-color: #0074D9; 
  color:white; 
  font-weight: bold; 
  width: 100%
}
#salasBibliotecaColor{
  background-color: #7FDBFF; 
  color:white; 
  font-weight: bold; 
  width: 100%
}
#totalMobiliarioColor{
  background-color: #FF4136; 
  color:white; 
  font-weight: bold; 
  width: 100%
}
#categoriaEditorialColor{
  background-color: #FF851B; 
  color:white; 
  font-weight: bold; 
  width: 100%
}
#ventasEditorialColor{
  background-color: #3D9970; 
  color:white; 
  font-weight: bold; 
  width: 100%
}
#librosEditorialColor{
  background-color: #2ECC40; 
  color:white; 
  font-weight: bold; 
  width: 100%
}
#categoriaMaterialEspecialColor{
background-color: #F012BE; 
color:white; 
font-weight: bold; 
width: 100%
}
#materialEspecialColor{
color:white;
font-weight:bold; 
width: 100%
}

</style>



</div>
<!--Cards-->
  <div class="row">
  <!-- Usuarios Inicio -->
    <div class="col-md-3" id="margenArriba">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color: #0074D9;">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Usuarios</p>
        </div>
       </div>
       <!-- Descripcion Usuarios Inicio -->
       <div>
  <a class="btn" id="usuariosColor" data-toggle="collapse" href="#usuarios" role="button" aria-expanded="false" aria-controls="collapseExample">
   Usuarios</a>
  </div>
<div class="collapse" id="usuarios">
  <div class="card card-body" style="color:#0074D9; font-weight: bold">
    Total de Usuarios que hay en el Sistema Control
  </div>
</div>
       <!-- Descripción Usuarios Fin -->
    </div>
    <!-- Usuarios Fin -->
    <!-- Salas Biblioteca Inicio -->
    <div class="col-md-3" id="margenArriba">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color: #7FDBFF">
          <i class="glyphicon glyphicon-list"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Salas de Biblioteca</p>
        </div>
       </div>
       <!-- Descripción Salas Biblioteca Inicio -->
       <div>
  <a class="btn" id="salasBibliotecaColor" data-toggle="collapse" href="#salas" role="button" aria-expanded="false" aria-controls="collapseExample">
    Salas de Bibliotecas
  </a>
  </div>
<div class="collapse" id="salas">
  <div class="card card-body" style="color: #7FDBFF; font-weight: bold">
    Total de Salas que contiene Biblioteca Central.
  </div>
</div>
       <!-- Descripción Salas Biblioteca Fin -->
    </div>
    <!-- Salas Biblioteca Fin -->
    <!-- Total Mobiliario Inicio -->
    <div class="col-md-3" id="margenArriba">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color:#FF4136">
          <i class="glyphicon glyphicon-briefcase"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_mobiliario['total']; ?> </h2>
          <p class="text-muted">Total Mobiliario</p>
        </div>
       </div>
       <!-- Descripción Total Mobiliario Inicio -->
       <div>
  <a class="btn" id="totalMobiliarioColor" data-toggle="collapse" href="#mobiliario" role="button" aria-expanded="false" aria-controls="collapseExample">
    Total Mobiliario
  </a>
  </div>
<div class="collapse" id="mobiliario">
  <div class="card card-body" style="color:#FF4136 ;font-weight: bold">
    Cantidad Total y Actualizada de Mobiliario Biblioteca UMaza
  </div>
</div>
       <!-- Descripción Total Mobiliario Fin -->
    </div>
    <!-- Total Mobiliario Fin -->
    <!-- Categoría Editorial Inicio -->
    <div class="col-md-3" id="margenArriba">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color:#FF851B">
          <i class="glyphicon glyphicon-usd"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $categories3['total']; ?></h2>
          <p class="text-muted">Categorías Editorial</p>
        </div>
       </div>
       <!-- Descripción Categoría Editorial Inicio -->
       <div>
  <a class="btn" id="categoriaEditorialColor" data-toggle="collapse" href="#editorial" role="button" aria-expanded="false" aria-controls="collapseExample">
    Categorías Editorial
  </a>
  </div>
<div class="collapse" id="editorial">
  <div class="card card-body" style="color:#FF851B ;font-weight: bold">
    Tipo de material que edita Editorial. Ejemplo: Libros, revistas.
  </div>
</div>
       <!-- Descripción Categoría Editorial Fin -->
    </div>
    <!-- Categoría Editorial Fin -->
</div>
<!--/Cards-->




<!--Cards-->
<div class="row">
<!-- Ventas Editorial Inicio -->
    <div class="col-md-3" id="margenArriba2"> 
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color: #3D9970;">
          <i class="glyphicon glyphicon-indent-left"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $ventas_editorial['total']; ?></h2>
          <p class="text-muted">Ventas Editorial</p>
        </div>
       </div>
       <!-- Descripción Ventas Editorial Inicio -->
       <div>
  <a class="btn" id="ventasEditorialColor" data-toggle="collapse" href="#stock" role="button" aria-expanded="false" aria-controls="collapseExample">
   Ventas Editorial
  </a>
  </div>
<div class="collapse" id="stock">
  <div class="card card-body" style="color:#3D9970; font-weight: bold">
    Cantidad de Libros Vendidos Editorial UMaza hasta la fecha
  </div>
</div>
       <!-- Descripción Ventas Editorial Fin -->
    </div>
    <!-- Ventas Editorial Fin -->
<!-- Libros Editorial Inicio -->
    <div class="col-md-3" id="margenArriba2">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color: #2ECC40">
          <i class="glyphicon glyphicon-book"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_editorial['total']; ?> </h2>
          <p class="text-muted">Libros Editorial</p>
        </div>
       </div>
       <!-- Descripción Libros Editorial Inicio -->
       <div>
  <a class="btn" id="librosEditorialColor" data-toggle="collapse" href="#libroseditorial" role="button" aria-expanded="false" aria-controls="collapseExample">
   Total Libros Editorial
  </a>
  </div>
<div class="collapse" id="libroseditorial">
  <div class="card card-body" style="color: #2ECC40; font-weight: bold">
    Cantidad de Libros que Editorial ha Lanzado hasta el momento
  </div>
</div>
       <!-- Descripción Libros Editorial Fin -->
    </div>
    <!-- Libros Editorial Fin -->
    <!-- Categoría Material Especial Inicio -->
    <div class="col-md-3" id="margenArriba2">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left" style="background-color:#F012BE">
          <i class="glyphicon glyphicon-file"></i>

        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categories2['total']; ?> </h2>
          <p class="text-muted">Categoría: M.Especial</p>
        </div>
       </div>
       <!-- Descripción Categoría Material Especial Inicio -->
       <div>
  <a class="btn bg-blue" id="categoriaMaterialEspecialColor" data-toggle="collapse" href="#categoriamaterial" role="button" aria-expanded="false" aria-controls="collapseExample">
    Categoría: Material Especial
  </a>
  </div>
<div class="collapse" id="categoriamaterial">
  <div class="card card-body" style="color:#F012BE ;font-weight: bold">
    Categoría total de material especial cargada hasta el momento
  </div>
</div>
       <!-- Descripción Categoría Material Especial Fin  -->
    </div>
    <!-- Categoría Material Especial Fin -->
    <!-- Material Especial Inicio -->
    <div class="col-md-3" id="margenArriba2">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-yellow">
          <i class="glyphicon glyphicon-film"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_material['total']; ?></h2>
          <p class="text-muted">Material Especial</p>
        </div>
       </div>
       <!-- Descripción Material Especial Inicio -->
       <div>
  <a class="btn bg-yellow" id="materialEspecialColor" data-toggle="collapse" href="#ventaseditorial" role="button" aria-expanded="false" aria-controls="collapseExample">
    Listado: Material Especial
  </a>
  </div>
<div class="collapse" id="ventaseditorial">
  <div class="card card-body" style="color:#FDD761 ;font-weight: bold">
    Total de Material Especial cargado hasta el momento
  </div>
</div>
       <!-- Descripción Material Especial Fin -->
    </div>
    <!-- Material Especial Fin -->
</div>
<!--/Cards-->







<?php include_once('layouts/footer.php'); ?>
