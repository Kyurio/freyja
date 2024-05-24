<div class="card">
    <div class="card-body">
        <div class="container-sm py-5 mx-5 mt-2">
            <form @submit.prevent="ValidateFormIconoEditar" enctype="multipart/form-data" novalidate>

                <div class="mb-3">
                    <label for="icono" class="form-label">icono</label>
                    <input type="text" class="form-control" id="icono" aria-describedby="icono"
                        placeholder="icono" v-model="requestDataicono.icono">

                    <small>{{dataErrorIcono.icono}}</small>
                </div>

                <div class="mb-3">
                    <label for="titulo" class="form-label">titulo</label>
                    <input type="text" class="form-control" id="titulo" aria-describedby="titulo"
                        placeholder="titulo" v-model="requestDataicono.titulo">

                    <small>{{dataErrorIcono.titulo}}</small>
                </div>

                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <button type="submit" class="btn btn-sm btn-dark">Guardar</button>
            </form>
        </div>
    </div>
</div>