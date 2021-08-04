<?php 
  require_once('header.php');
?>
<style>
#imagen{
  height:50px;
  width:50px
}
#perfil{
  color: white;
}
</style>

<div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-brand">
              <a href="http://www.biblioteca.umaza.edu.ar" title="Página Biblioteca" target="_blank">Administrador</a>
  
            </div>
            <div class="sidebar-header">
              <div class="user-pic">
              <a href="" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <img src="uploads/users/<?php echo $user['image'];?>" alt="S/Imágen" id="imagen">
                      
            </a>
              </div>
              <div class="user-info">
                <span class="user-name"><?php echo remove_junk(ucfirst($user['name'])); ?>
                </span>
                <span class="user-role">
                <a href="perfil.php?id=<?php echo (int)$user['id'];?>" title="Ver Perfil" id="perfil">
                      Administrador
                  </a>
                </span>
                <span class="user-status">
                  <i class="fa fa-circle"></i>
                  <span>Online</span>
                </span>
              </div>
            </div>
            <!-- sidebar-header  -->
            <div class="sidebar-search">
              <div>
                <div class="input-group">
                  <div class="input-group-append">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
              <ul>
                <li class="header-menu">
                  <span>Biblioteca</span>
                </li>
                <!-- Home Inicio -->
                <li class="sidebar-dropdown" >
                  <a href="home.php" >
                    <i class="glyphicon glyphicon-home"></i>
                    <span>Home</span>
                  </a>

                </li>
                <!-- home fin -->
                <!-- Usuario Inicio -->
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Usuarios</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="grupos.php">Administrar Grupos</a>
                      </li>
                      <li>
                        <a href="usuarios.php">Administrar Usuarios</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- Usuarios Fin -->

                <!-- Mobiliario Inicio -->
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="glyphicon glyphicon-arrow-right"></i>
                    <span>Mobiliario</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="agregar_salas.php">Agregar Salas</a>
                      </li>
                      <li>
                        <a href="agregar_mobiliario.php">Agregar Mobiliario</a>
                      </li>
                      <li>
                        <a href="lista_mobiliario.php">Listado</a>
                      </li>
             
                    </ul>
                  </div>
                </li>
                <!-- Mobiliario Fin -->
                <!-- Material Especial Inicio -->
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="glyphicon glyphicon-arrow-right"></i>
                    <span>Material Especial</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="categoria.php">Agregar Categoría</a>
                      </li>
                      <li>
                        <a href="agregar_material.php">Agregar Material</a>
                      </li>
                      <li>
                        <a href="lista_material.php">Lista de Material</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <!-- Material Especial Fin -->
                <!-- Editorial Inicio -->
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="glyphicon glyphicon-arrow-right" ></i>
                    <span>Editorial UMaza</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="agregar_listado_editorial.php" >Agregar Categorías</a>
                      </li>
                      <li>
                        <a href="stock.php" >Listado Editorial</a>
                      </li>
                      <li>
                        <a href="agregar_stock.php" >Agregar Libros</a>
                      </li>
                      <li>
                        <a href="listado_ventas.php" >Listado de Ventas</a>
                      </li>
                      <li>
                        <a href="agregar_venta.php" >Agregar Venta</a>
                      </li>
                      <li>
                        <a href="reporte_fecha.php" >Reporte por Fecha</a>
                      </li>
                      <li>
                        <a href="ventas_diarias.php" >Ventas Diarias</a>
                      </li>
                    </ul>
                  </div>
                </li>

                <!-- Editorial Fin -->
                <li class="header-menu">
                  <span>Redes Sociales</span>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="glyphicon glyphicon-thumbs-up" ></i>
                    <span>Visítenos!</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="https://www.facebook.com/bibliotecaumazaoficial/" target="_blank">Facebook</a>
                      </li>
                      <li>
                        <a href="https://api.whatsapp.com/send?phone=5492612531615"target="_blank">WhatsApp</a>
                      </li>
                      <li>
                        <a href="https://www.instagram.com/somosumaza/?hl=es-la"target="_blank">Instagram</a>
                      </li>
                      <li>
                        <a href="https://www.youtube.com/user/UniversidadMaza"target="_blank">YouTube</a>
                      </li>
                      <li>
                        <a href="http://www.radioumaza.com/"target="_blank">Radio</a>
                      </li>
                    </ul>
                  </div>
                </li>
                
               
              </ul>
            </div>
            <!-- sidebar-menu  -->
          </div>
          <!-- sidebar-content  -->
          <div class="sidebar-footer" >

            <a href="agregar_usuario.php" title="Agregar Usuario"  style="margin-top:12px;">

              <i class="glyphicon glyphicon-plus"></i>
            </a>
            <a href="editar_cuenta.php" title="Editar Cuenta" style="margin-top:12px;">
              <i class="glyphicon glyphicon-cog"></i>

            </a>
            <a href="logout.php" title="Salir" style="margin-top:12px;">
              <i class="glyphicon glyphicon-off"></i>
            </a>
          </div>
        </nav>
        <!-- sidebar-wrapper  -->
      </div>
  </li>
</ul>


      <script>
      $(".sidebar-dropdown > a").click(function() {
  $(".sidebar-submenu").slideUp(200);
  if (
    $(this)
      .parent()
      .hasClass("active")
  ) {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .parent()
      .removeClass("active");
  } else {
    $(".sidebar-dropdown").removeClass("active");
    $(this)
      .next(".sidebar-submenu")
      .slideDown(200);
    $(this)
      .parent()
      .addClass("active");
  }
});

$("#close-sidebar").click(function() {
  $(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
  $(".page-wrapper").addClass("toggled");
});


      </script>
