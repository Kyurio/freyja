<br><br><br>
<section class="mt-5">
    <div class="container mt-5 mb-5">

        <div data-aos="fade-right">
            <h2>Nuestras Parcelas en ofertas</h2>
            <hr>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col" v-for="item in ofertas">

                <div data-aos="zoom-in">

                    <div class="col mb-5">
                        <div class="card h-100">
                            <div class="badge bg-success text-white position-absolute"
                                style="top: 0.5rem; right: 0.5rem" v-if="item.estado === 1">
                                Disponible</div>
                            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"
                                v-else>
                                Vendido</div>
                            <!-- Product image-->
                            <img class="card-img-top" :src="'assets/img/'+item.url" :alt="item.producto" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ item.producto }}</h5>
                                    <small>{{item.nombre}}</small>
                                    <br>
                                    <!-- Product price-->
                                    <span>{{ formatoMoneda(item.precio) }}</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"> <a type="button"
                                        @click="GetDetalleProducto(item.id_producto, item.url), GetImagenProducto(item.id_producto), GetIconosProducto(item.id_producto)"
                                        class="os-btn btn-os-dark" data-bs-toggle="offcanvas" href="#offcanvasDetalle"
                                        role="button" aria-controls="offcanvasDetalle">Detalle</a></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</section>