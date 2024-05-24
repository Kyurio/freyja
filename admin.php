<?php
require_once 'app/utils/helpers.php';
require_once 'app/utils/validator.php';

validator::validateSession();
?>

<!DOCTYPE html>
<html class="no-js" lang="es">

<!-- normalize -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- boostrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<!-- animate -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- font awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- stylee -->
<link rel="stylesheet" href="assets/css/admin.css">

</head>

<body id="body-pd">

    <!-- preloader -->
    <?php require 'components/section/preloader.php' ?>
    <!-- preloader -->

    <main>
        <div id="app">

            <header class="header" id="header">
                <div class="header_toggle"> <i class="fa-solid fa-bars"></i> </div>
                <p class="ms-auto mx-5 mt-3"><?= $_SESSION['username'] ?> </p>
                <div class="header_img"><img src="assets/svg/avatar.svg" alt=""> </div>
            </header>

            <!-- separator -->
            <div class="mt-3">
            </div>
            <!-- separator -->

            <div class="row mt-5">

                <div class="col-lg-1 col-md-2 col-12">
                    <?php require 'components/navbar/sidebar.php' ?>
                </div>

                <div class="col-lg-10 col-md-10 col-12">
                    <div class="tab-content" id="myTabContent">

                        <!-- dashboard -->
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <?php require 'components/section/dashboard.php' ?>
                        </div>

                        <!-- productos -->
                        <div class="tab-pane fade show" id="products-tab-pane" role="tabpanel" aria-labelledby="products-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <?php require 'components/tables/table_producto.php' ?>
                                </div>
                            </div>
                        </div>

                        <!-- perfil -->
                        <div class="tab-pane fade show" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <?php require 'components/tables/table_usuario.php' ?>
                                </div>
                            </div>
                        </div>

                        <!-- notify -->
                        <div class="tab-pane fade show" id="notify-tab-pane" role="tabpanel" aria-labelledby="notify-tab" tabindex="0">
                            <div class="card mt-5">
                                <div class="card-body">
                                    <?php //include 'components/tables/table_preguntas.php' ?>
                                    <h3>Entrena tu robot</h3>
                                    <?php include 'components/form/FormQuestions.php' ?>
                                </div>
                            </div>
                        </div>

                        <!-- youtube video -->
                        <div class="tab-pane fade show" id="youtube-tab-pane" role="tabpanel" aria-labelledby="youtube-tab" tabindex="0">
                            <div class="card mt-5">
                                <div class="card-body">

                                        <?php include 'components/form/form_video.php' ?>
                   
                                </div>
                            </div>
                        </div>

                        <!-- historial -->
                        <div class="tab-pane fade show" id="history-tab-pane" role="tabpanel" aria-labelledby="hisrory-tab" tabindex="0">
                            <div class="card">
                                <div class="card-body">
                                    <?php require 'components/tables/table_historial.php' ?>
                                </div>
                            </div>
                        </div>

                        <!-- configuracion -->
                        <div class="tab-pane fade show" id="configuration-tab-pane" role="tabpanel" aria-labelledby="config-tab" tabindex="0">

                            <div class="card">
                                <div class="card-body">
                                    <?php require 'components/tables/table_categorias.php' ?>
                                </div>
                            </div>

                            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                <div class="container-fluid">
                                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                        <ul class="navbar-nav" id="myTab" role="tablist">

                                            <button class="btn btn-outline-secondary active" id="categoria-tab" data-bs-toggle="tab" href="#categoria-tab-pane" role="tab" aria-controls="categoria-tab-pane" aria-selected="true">
                                                Categorías
                                            </button>

                                            <button class="btn btn-outline-secondary ms-1" id="iconos-tab" data-bs-toggle="tab" href="#iconos-tab-pane" role="tab" aria-controls="iconos-tab-pane" aria-selected="false">
                                                Iconos
                                            </button>

                                        </ul>
                                    </div>
                                </div>
                            </nav>


                        </div>

                    </div>
                </div>

                <div class="col-lg-1 col-md-2 col-12">
                </div>

            </div>

            <?php require 'components/offcanvas/offcanvas_editar_icono.php' ?>
            <?php require 'components/offcanvas/offcanvas_editar_categoria.php' ?>
            <?php require 'components/offcanvas/offcanvas_edit_usuario.php' ?>
            <?php require 'components/offcanvas/offcanvas_editar_productos.php' ?>


            <?php require 'components/offcanvas/offcanvas_ingreso_iconos.php' ?>
            <?php require 'components/offcanvas/offcanvas_ingreso_productos.php' ?>
            <?php require 'components/offcanvas/offcanvas_ingreso_categoria.php' ?>

        </div>
    </main>

    <!-- axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js" integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ==" crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <!-- vuejs -->
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- chartjs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- main -->
    <script src="<?= APP ?>main.js">
    </script>

    <!-- js -->
    <script src="<?= JS ?>admin.js">
    </script>



</body>

</html>