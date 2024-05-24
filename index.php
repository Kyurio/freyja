<?php include 'components/inc/header.php' ?>

<body>
    <main>
        <div id="client">

            <!-- prealoder area start -->
            <?php include 'components/section/preloader.php' ?>
            <!-- prealoder area end -->

            <!-- navbar -->
            <?php include 'components/navbar/navbar.php' ?>
            <!-- navbar -->

            <!-- hero -->
            <?php include 'components/section/hero.php' ?>
            <!-- hero -->

            <!-- salto -->
            <div class="mt-5 mb-5">
                <br><br><br><br>
            </div>
            <!-- salto -->

            <!-- productos -->
            <?php include 'components/section/productos.php' ?>
            <!-- productos -->

            <!-- salto -->
            <div class="mt-5 mb-5">
                <br><br><br><br>
            </div>
            <!-- salto -->

            <!-- video -->
            <section>
                <div class="container">
                    <div v-for="item in video">
                        <div v-html="item.url"></div>
                    </div>
                </div>
            </section>
            <!-- video -->


            <!-- salto -->
            <div class="mt-5 mb-5">
                <br><br><br><br>
            </div>
            <!-- salto -->

            <!-- poninter -->
            <?php include 'components/section/promotion.php' ?>
            <!-- poninter -->

            <!-- salto -->
            <div class="mt-5 mb-5">
                <br><br><br><br>
            </div>
            <!-- salto -->

            <!-- equipo -->
            <?php include 'components/section/equipo.php' ?>
            <!-- equipo -->

            <!-- salto -->
            <div class="mt-5 mb-5">
                <br><br><br><br>
            </div>
            <!-- salto -->

            <!-- poninter -->
            <?php require 'components/section/social.php' ?>
            <!-- poninter -->

            <!-- salto -->
            <div class="mt-5 mb-5">
                <br><br><br><br>
            </div>
            <!-- salto -->

            
            <!-- asisten virtual -->
            <section>
                <div class="container">


                    <section>
                        <div class="asistente-virtual">
                            <div class="chat-icon" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                <img src="assets/icons/agente.png" width="35" height="35" alt="uldyr">
                            </div>

                        </div>
                    </section>


                    <div class="offcanvas offcanvasChatBot offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasRightLabel">Hola!, Bienvenido a <?= TITTLE ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-flex flex-column">

                            <div class="flex-grow-1">
                                <div>
                                    <div class="alert alert-primary text-rigth" role="alert" v-if="Respuestas.respuesta">
                                        <span>uldyr:</span>
                                        <p v-html="Respuestas.respuesta"></p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <section v-if="FlagClient == true">
                                    <?php include 'components/form/FormCliente.php' ?>
                                </section>
                                <section v-else>
                                    <?php include 'components/form/formPregunta.php' ?>
                                </section>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <!-- asisten virtual -->



            <!-- contacto -->
            <?php include 'components/section/contacto.php' ?>
            <?php include 'components/section/footer.php' ?>
            <?php include 'components/offcanvas/offcanvas_detalle_producto.php' ?>
            <?php include 'components/offcanvas/offcanvas_vende.php' ?>
            <?php include 'components/offcanvas/offcanvas_ofertas.php' ?>
            <!-- offcanvas -->




        </div>
    </main>
</body>
<?php include 'components/inc/footer.php' ?>

</html>