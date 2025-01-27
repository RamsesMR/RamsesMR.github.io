<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="recursos/adminlte/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Portal de empleo</span> 1.0
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/user.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['nom_user'] ? "si existe" : "Usuario" ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            

       

            <?php

       //menu para demandantes de empleo   

            if (isset($_GET['m']) && $_GET['m'] == "busqueda") {
            ?>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item has-treeview menu-close">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                               Empleo
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">



                            <li class="nav-item">
                                <a href="inicio.php?m=busqueda&op=ver" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ver ofertas</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="inicio.php?m=busqueda&op=cv" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mi currículum</p>
                                </a>
                            </li>

                        </ul>

                        <!-- menu 2 -->

                    <li class="nav-item has-treeview menu-close">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Preguntas frecuentes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>como creo un cv</p>
                                </a>
                            </li>

                        </ul>

                    </li>
                <?php
            }
                ?>
                </ul>



                <!-- este es para los que entren en OFERTAS empleo -->

                <?php

                if (isset($_GET['m']) && $_GET['m'] == "oferta") {
                ?>

                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item has-treeview menu-close">

                            <a href="inicio.php?m=oferta&op=listar" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                Gestión de empleado
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">



                                <li class="nav-item">
                                    <a href="inicio.php?m=oferta&op=listar" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Buscar candidatos</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="inicio.php?m=oferta&op=crear" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Publicar oferta</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="inicio.php?m=oferta&op=gestion" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Gestionar mis ofertas</p>
                                    </a>
                                </li>

                            </ul>


                            <!-- menu 2 -->

                        <li class="nav-item has-treeview menu-close">

                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-tie"></i>
                                <p>
                                     Preguntas frecuentes
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>

                            <ul class="nav nav-treeview">


                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>¿Cómo creo una oferta?</p>
                                    </a>
                                </li>




                            </ul>

                        </li>
                    <?php
                }
                    ?>
                    </ul>




        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>