<div class="container py-3">

  <div class="d-flex justify-content-between align-items-center mb-2">
    <h4 class="mb-0 fw-bolder text-dark">Iconos</h4>
    <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasIconos"
      aria-controls="offcanvasExample">
      <i class="fa-solid fa-plus"></i>
    </button>
  </div>

  <p class="text-dark mt-2 mb-2 py-2">Consigue los iconos <a href="https://fontawesome.com/icons" target="_blank">Aqui <i class="fa-solid fa-font-awesome"></i></a></p>

  <div class="table-responsive">
    <table class="table table-borderless align-middle text-center">
      <thead>
        <tr>
          <th scope="col">Icono</th>
          <th scope="col">Descripcion</th>
        </tr>
      </thead>
      <tbody>

        <tr v-for="(item, index) in iconos"
          v-show="(pag_productos - 1) * num_result_iconos <= index  && pag_productos * num_result_iconos > index">

          <td>{{ item.titulo }}</td>
          <td v-html="item.icono"></td>

          <td>
            <button class="btn btn-sm btn-dark" @click="ActualizarIcono(item.id_icono, item.titulo, item.icono);"
              data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditarIcono">
              <i class="fa-solid fa-pen"></i>
            </button>
            <button class="btn btn-sm btn-dark ms-1" @click="DeleteIcono(item.id_icono)">
              <i class="fa-solid fa-trash"></i>
            </button>
          </td>

        </tr>
      </tbody>
    </table>
  </div>

  <div>
    <small class="text-muted">Página {{ pag_productos }} de {{ num_result_iconos }} ({{ productos.length }} elementos
      en
      total)</small>
    <div class="d-flex bd-highlight mb-3">
      <div class="ms-auto bd-highlight">
        <button class="btn btn-outline-dark btn-sm me-1" @click.prevent="gotoPage(pag_productos - 1)"
          :disabled="pag_productos === 1">
          Anterior
        </button>
        <button class="btn btn-outline-dark btn-sm" @click.prevent="gotoPage(pag_productos + 1)"
          :disabled="pag_productos === num_result_iconos">
          Siguiente
        </button>
      </div>
    </div>
  </div>

</div>