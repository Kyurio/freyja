<div class="container py-3">

    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="mb-0 fw-bolder">Usuario</h4>
        <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasingresocategoria" aria-controls="offcanvasExample">
            <i class="fa-solid fa-plus"></i>
        </button>
    </div>

    <div class="table-responsive" v-for="item in usuarios">
        <table class="table table-borderless align-middle text-center">
            <thead>
                <tr>
                    <th scope="col">Usuario</th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ item.usuario }}</td>
                    <td>

                    <td>
                        <button class="btn btn-sm btn-dark"
                            @click="ActualizarUsuario(item.id_administrador, item.usuario, item.correo)"
                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasEditarUsuario">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </td>


                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>