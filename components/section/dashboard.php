    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="p-2 flex-grow-1">
                            <h1 class="fw-bold">Los Valles Inmobiliaria</h1>
                            <p class="text-5text-white-50">Admin</p>
                        </div>
                        <div class="p-2"></div>
                        <div class="p-2">
                            <img src="assets/svg/main.svg" alt="" class="img-fluid" width="190" height="90">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center py-5">

                    <div id="fb-root"></div>
                    <h1 id="likes-counter"></h1>
                    <i class="fa-brands fa-instagram"></i>

                </div>
            </div>
        </div>
        <div class="col-2">
            <div class="card">
                <div class="card-body d-flex flex-column align-items-center py-5">
                    <h1 id="followers-counter"></h1>
                    <i class="fa-brands fa-facebook-f"></i>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-5">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <?php require 'components/tables/table_producto.php'?>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h6>Productos por categorias</h6>
                    <canvas id="ChartTipoProducto"></canvas>

                </div>
            </div>
        </div>
      
    </div>