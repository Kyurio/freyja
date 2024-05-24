<form @submit.prevent="validarFormUsuario" novalidate="true">
    <div class="mb-3">
        <label for="usuario" class="form-label">Usuario</label>
        <input v-model="requestDataUsuario.usuario" type="text" class="form-control" id="usuario" required>
        <span class="text-danger">{{ DataErrorUsuario.usuario }}</span>
    </div>

    <div class="mb-3">
        <label for="correo" class="form-label">Correo</label>
        <input v-model="requestDataUsuario.correo" type="email" class="form-control" id="correo" required>
        <span class="text-danger">{{ DataErrorUsuario.correo }}</span>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input v-model="requestDataUsuario.password" type="password" class="form-control" id="password" required>
        <span class="text-danger">{{ DataErrorUsuario.password }}</span>
    </div>

    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirmar Contraseña</label>
        <input v-model="requestDataUsuario.confirm_password" type="password" class="form-control" id="confirm_password"
            required>
        <span class="text-danger">{{ DataErrorUsuario.confirm_password }}</span>
    </div>

    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>