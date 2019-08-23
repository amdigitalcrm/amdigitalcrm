
<div class="pos-f-t">    
  <div id="navigation_padre" class="col-12">
    <div class="navigation">
        <img id="nav_home" class="img-fluid" src="<?php echo URL . URLIMG.NOMBRE_LOGO_?>" alt="">
    </div>        
    <div class="navigation">
        <ul>
            <li><a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">Marco Antonio Rodriguez Salinas</a></li>
            <li><a href="#" data-toggle="offcanvas"><i class="fa fa-bars" aria-hidden="true"></i></a></li>   
        </ul>
    </div>
</div>
</div>
<div id="wrapper" class="toggled">
    <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
        <ul class="nav sidebar-nav">
         <li><router-link to="/inicio">Inicio</router-link></li>
         <li class="dropdown">
            <a href="#works" class="dropdown-toggle" data-toggle="dropdown">
                Módulo Clientes
                <span class="caret"></span>
            </a>
            <ul class="dropdown-menu animated fadeInLeft" role="menu">
                <li><router-link to="/clientesgeneral">Clientes General</router-link></li>
                <li><router-link to="/misclientes">Mis Clientes</router-link></li>
              
                
            </ul>
        </li> 
        <li><router-link to="/logout">Cerrar sesión</router-link></li>
    </ul>
</nav>
<div class="container-fluid c-f-corregido">
    <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
            <h4 class="text-white">Collapsed content</h4>
            <span class="text-muted">Toggleable via the navbar brand.</span>
        </div>
    </div>
</div>