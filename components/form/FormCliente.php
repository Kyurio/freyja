<form @submit.prevent="PostCliente" method="post">
    <div class="mb-3">
        <label for="Email" class="form-label">Email</label>
        <input type="email" class="form-control" id="Email" aria-describedby="Email" v-model="formClientes.Email" require>
    </div>
    <div class="mb-3">
        <label for="Nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="Nombre" aria-describedby="Nombre" v-model="formClientes.Nombre" require>
    </div>
    <button type="submit" class="btn btn-primary mt-2">Enviar</button>
</form>