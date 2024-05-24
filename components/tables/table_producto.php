<div class="container py-3">

  <div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="mb-0 fw-bolder">Parcelas</h4>
    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasProducto"
      aria-controls="offcanvasExample">
      <i class="fa-solid fa-plus"></i>
    </button>
  </div>

  <div class="table-responsive">
    <table class="table table-borderless align-middle text-center">
      <thead>
        <tr>
          <th scope="col">Parcela</th>
          <th scope="col">precio</th>
          <th scope="col">stock</th>
          <th scope="col">estado</th>
        </tr>
      </thead>
      <tbody>

        <tr v-for="(item, index) in productos"
          v-show="(pag_productos - 1) * num_result_productos <= index  && pag_productos * num_result_productos > index">

          <td>{{ item.producto }}</td>

          <td>{{ formatoMoneda(item.precio) }}</td>

          <td
            v-bind:class="{'text-danger': item.stock <= 10, 'text-warning': item.stock <= 20 && item.stock > 10, '': item.stock > 20}">
            {{ formatoMoneda(item.stock) }}
          </td>

          <td class="text-center">
            <div class="d-flex justify-content-center">
              <div v-if="item.estado === 0">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                  @click="CambiarEstadoProducto(item.id_producto, 1)">
              </div>
              <div v-else>
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked
                  @click="CambiarEstadoProducto(item.id_producto, 0)">
              </div>
            </div>
          </td>

          <td>
            <button class="btn btn-sm btn-dark"
              @click="ActualizarProducto(item.id_producto, item.id_categoria, item.producto, item.precio, item.descripcion, item.stock, item.item)"
              data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditarProducto">
              <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-sm btn-dark ms-1" @click="DeleteProducto(item.id_producto)">
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>

        </tr>
      </tbody>
    </table>
  </div>

  <div>
    <small class="text-muted">Página {{ pag_productos }} de {{ num_result_productos }} ({{ productos.length }} elementos
      en
      total)</small>
    <div class="d-flex bd-highlight mb-3">
      <div class="ms-auto bd-highlight">
        <button class="btn btn-outline-dark btn-sm me-1" @click.prevent="gotoPage(pag_productos - 1)"
          :disabled="pag_productos === 1">
          Anterior
        </button>
        <button class="btn btn-outline-dark btn-sm" @click.prevent="gotoPage(pag_productos + 1)"
          :disabled="pag_productos === num_result_productos">
          Siguiente
        </button>
      </div>
    </div>
  </div>

</div>