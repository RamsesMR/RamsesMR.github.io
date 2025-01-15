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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->

                <?php
                //MENU PARA SUPER ADMINISTRADORES Y ADMINISTRADORES 
                if ($_SESSION['tipo_user'] < 3) {
                ?>

                    <li class="nav-item has-treeview menu-close">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Menu 1
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="?m=tipo-nota" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tipos de Nota</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="?m=tipo_documentos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tipos de Documentos</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?m=familias" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Familias Formativas</p>
                                </a>
                            </li>
                            

                            <li class="nav-item">
                                <a href="?m=usuarios" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?m=tipo-usuarios" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tipo Usuarios</p>
                                </a>
                            </li>

                        </ul>

                    </li>




                    <!-- menu 2 -->
                    <li class="nav-item has-treeview menu-close">

                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Menu 2
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">


                            <li class="nav-item">
                                <a href="?m=tipo-nota" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tipos de Nota</p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a href="?m=tipo_documentos" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tipos de Documentos</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?m=familias" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Familias Formativas</p>
                                </a>
                            </li>
                            

                            <li class="nav-item">
                                <a href="?m=usuarios" class="nav-link">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="?m=tipo-usuarios" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tipo Usuarios</p>
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