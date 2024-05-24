<div class="tab-content" id="myTabContent">

    <div class="tab-pane fade show active" id="categoria-tab-pane" role="tabpanel" aria-labelledby="categoria-tab"
        tabindex="0">
        <div class="container py-3 mt-3">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4 class="mb-0 fw-bolder text-dark">Categorias</h4>
                <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasingresocategoria" aria-controls="offcanvasExample">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-borderless align-middle text-center">
                    <thead>
                        <tr>
                            <th scope="col">Categoria</th>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Aquí puedes iterar sobre las categorías -->
                        <tr v-for="item in categoria">
                            <td>{{ item.nombre }}</td>
                            <td>
                                <!-- Botones para editar o eliminar categorías -->
                                <button class="btn btn-sm btn-dark"
                                    @click="ActualizarCategoria(item.id_categoria, item.nombre)"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditarCategoria">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button class="btn btn-sm btn-dark ms-1" @click="DeleteCategoria(item.id_categoria)">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="tab-pane fade" id="iconos-tab-pane" role="tabpanel" aria-labelledby="iconos-tab" tabindex="0">
       <?php include 'components/tables/table_iconos.php' ?>
    </div>

</div>