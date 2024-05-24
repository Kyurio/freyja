<section>
    <div class="container">
        <div class="row text-center text-lg-start">
            <div class="col-lg-3 col-md-4 col-6" v-for="(item, index) in imgProductos">
                <a href="#" class="d-block mb-4 h-100" data-bs-toggle="modal" data-bs-target="#lightbox" data-slide-to="{{ index }}">
                    <img class="img-fluid img-thumbnail" :src="'assets/img/' + item.url" :alt="item.url">
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Modal para mostrar las imágenes en grande -->
<div class="modal fade" id="lightbox" tabindex="-1" role="dialog" aria-labelledby="lightbox" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div id="indicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div v-for="(item, index) in imgProductos" :class="['carousel-item', index === 0 ? 'active' : '']">
                            <img class="d-block w-100" :src="'assets/img/' + item.url" :alt="item.url">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#indicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#indicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
