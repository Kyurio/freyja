<div class="container py-3">

    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0 fw-bolder">Notify</h4>
        <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasingresocategoria"
            aria-controls="offcanvasExample">
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
                <tr v-for="item in categoria">
                    <td>{{ item.nombre }}</td>
                    <td>

                    <td>
                        <button class="btn btn-sm btn-dark" @click="GetCategoriaEdit(item.id_categoria)"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditarCategoria">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                        <button class="btn btn-sm btn-dark ms-1" @click="DeleteCategoria(item.id_categoria)">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </td>


                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>