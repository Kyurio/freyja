<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMiCarrito" aria-labelledby="offcanvasMiCarrito">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasMiCarrito">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">


        <div class="container-sm mx-5 py-5">

            <div class="alert alert-secondary alert-dismissible fade show" role="alert" v-for="item in micarrito">
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <img :src="'assets/img/'+item.url" width="100" height="100" alt="item.nombre">
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h2>{{ item.nombre }}</h2>
                        <p>{{ item.descripcion }}</p>
                        <h6><span>Total a pagar: </span>${{ formatoMoneda(item.precio) }}</h6>
                    </div>
                </div>
                <button type="button" class="btn-close" @click="RemoveItem(item.id)"></button>
            </div>


            <button type="" class="btn btn-success" @click="Comprar">Comprar</button>
            <div id="wallet_container"></div>


        </div>


    </div>
</div>