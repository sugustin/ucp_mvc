<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="inc/img/test.svg" width="30%">
        </div>
        <!--<div class="sidebar-brand-text mx-3"><img src="inc/img/citroen_logo.png" width="50%"></div>-->
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-home"></i>
            <span>Inicio</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            OPCIONES
        </div>
       
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#op_1"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-clock"></i>
                    <span>Administrar</span>
                </a>
                <div id="op_1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                    <div class="bg-light py-2 collapse-inner rounded">                       
                        <h6 class="collapse-header">Artículos</h6>
                            <?php             
                            $cadena_codificada = base64_encode('administracion/articulos');
                            ?>
                            <a class="collapse-item" id="op_2" href="#" onClick="window.location='index.php?pagina=<?php echo $cadena_codificada; ?>&op=1'"><?php echo "Artículos"; ?></a>
                    </div>
                </div>
            </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    </ul>
<!-- End of Sidebar -->