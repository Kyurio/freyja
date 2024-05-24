<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasDetalle" aria-labelledby="offcanvasDetalle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasVendeConostros">Detalle parcela</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <section>
            <div v-for="item in detalleProductos" :style="heroStyle" class="item-presentacion">

                <div class="row">

                    <div class="col-md-6 mb-3">

                        <div class="elemento-section text-center mt-25">
                            <h4 class="title-precio">precios desde:</h4>
                            <div class="precio">
                                ${{formatoMoneda(item.precio)}}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 mb-3">

                        <div class="elemento-section text-center mt-25">
                            <h1 class="title-product">{{ item.nombre }}</h1>
                            <hr class="hr-product">
                            <p class="text-product">{{ item.descripcion }}</p>
                        </div>

                    </div>

                    <div class="col-md-12">

                        <div class="container-sm">
                            <br>
                            <br>
                            <br>
                            <br>
                            <ul class="nav nav-underline">
                                <li class="nav-item text-center" v-for="item in IconosProducto">
                                    <div class="item-descripcion subicon" v-html="item.icono"></div>
                                    <br>
                                    <small class="item-descripcion">{{ item.titulo }}</small>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </section>

        <div class="mt-5 mb-5">
            <br><br><br><br>
        </div>

        <section>
            <div class="pointer">
                <hr class="my-5">
                <div class="row">
                    <div class="col-12">
                        <h2>Nuestra galería de imágenes</h2>
                        <p class="mt-3">Encántate con nuestras parcelas y revisa las fotografías de ellas</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="mt-5 mb-5">
            <br><br><br><br>
        </div>

        <section>
            <?php include 'components/section/galeria.php' ?>
        </section>

        <div class="mt-5 mb-5">
            <br><br><br><br>
        </div>

        <section>
            <div class="pointer">
                <h2 class="">Revisa nuestro contenido dispoble sobre nuestras parcelas</h2>
            </div>
        </section>

        <div class="mt-5 mb-5">
            <br><br><br><br>
        </div>

        <section>
            <div class="container">
                <div class="d-flex justify-content-center align-items-center text-center">
                    <div class="ratio ratio-16x9">

                    <div v-for="item in detalleProductos" v-html="item.item"></div>
                    </div>
                </div>
            </div>
        </section>

        <br><br><br><br>

        <section>
            <div class="container">
                <?php include 'components/form/form_contacto.php' ?>
            </div>
        </section>

    </div>
</div>