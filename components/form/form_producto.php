<div class="container py-5 mx-5 mt-2">

    <div class="card">
        <div class="card-body">

            <form @submit.prevent="validateForm" enctype="multipart/form-data" novalidate="true" v-if="FlagProducto == false">


                <div class="form-floating">
                    <select class="form-select" v-model="requestDataProducto.oferta">
                        <option value="1">si</option>
                        <option value="0">No</option>
                    </select>
                    <label for="floatingSelect">¿Es oferta?</label>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="categoria" class="form-label">Categoría</label>
                            <select class="form-select" v-model="requestDataProducto.categoria">
                                <option selected disabled value="">Selecciona una categoría</option>
                                <option v-for="item in categoria" :value="item.id_categoria">{{ item.nombre }}</option>
                            </select>
                            <small class="text-danger">{{DataErrorPorducto.categoria}}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="producto" class="form-label">Producto</label>
                            <input type="text" class="form-control" id="producto" placeholder="Nombre Producto" v-model="requestDataProducto.producto">
                            <small class="text-danger">{{DataErrorPorducto.producto}}</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="descripcion" v-model="requestDataProducto.descripcion"></textarea>
                    </div>
                    <small class="text-danger">{{DataErrorPorducto.descripcion}}</small>
                </div>

                <div class="mb-3">
                    <label for="item" class="form-label">Items extras</label>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="item" v-model="requestDataProducto.item"></textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio</label>
                            <input type="number" min="1" class="form-control" id="precio" placeholder="Precio" v-model="requestDataProducto.precio">
                            <small class="text-danger">{{DataErrorPorducto.precio}}</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="number" min="1" class="form-control" id="stock" placeholder="Stock" v-model="requestDataProducto.stock">
                            <small class="text-danger">{{DataErrorPorducto.stock}}</small>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="imagenes" class="form-label">Imágenes del Producto</label>
                    <input type="file" multiple class="form-control" id="imagenes" name="imagenes[]" accept="image/*" ref="imagenesInput" v-model="requestDataProducto.url">

                    <small class="text-danger">{{DataErrorPorducto.url}}</small>
                </div>

                <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

                <div class="mt-5 mb-5">
                    <h6>Items extras</h6>
                    <div v-for="(item, index) in iconos">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" :value="item.id_icono" :id="'icon-' + item.id_icono" v-model="elementosSeleccionados">
                            <label class="form-check-label" :for="'icon-' + item.id_icono">
                                {{ item.titulo }}
                            </label>
                        </div>
                    </div>
                </div>




                <button type="submit" class="btn btn-dark">Guardar</button>
            </form>

            <div class="progress" role="progressbar" aria-label="Carga de imágenes" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" v-else>
                <h2 class="text-center">cargando...</h2>
                <div class="progress-bar progress-bar-striped" :style="'width: ' + uploadProgress + '%'"></div>
            </div>

        </div>
    </div>
</div>