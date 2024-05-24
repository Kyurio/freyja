<div class="card">
    <div class="card-body">
        <div class="container-sm py-5 mx-5 mt-2">
            <form @submit.prevent="validateFormCategoriaEditar" enctype="multipart/form-data" novalidate>

                <div class="mb-3">
                    <label for="categoria" class="form-label">categoria</label>
                    <input type="text" class="form-control" id="categoria" aria-describedby="categoria"
                        placeholder="Categoria" v-model="requestDataCategoria.categoria">

                    <small>{{DataErrorCategoria.categoria}}</small>
                </div>

                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <button type="submit" class="btn btn-sm btn-dark">Guardar</button>
            </form>
        </div>
    </div>
</div>