<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2>Registro de Cliente</h2>
        </div>
        <form method="post" @submit.prevent="CrearUsuario">
            <!-- Campo: Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>

            <!-- Campo: Apellido -->
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>

            <!-- Campo: Correo Electrónico -->
            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>

            <!-- Campo: Dirección -->
            <div class="mb-3">
                <label for="direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" required>
            </div>

            <!-- Campo: Teléfono -->
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required>
            </div>

            <!-- Campo: Número de Casa -->
            <div class="mb-3">
                <label for="casa" class="form-label">Número de Casa</label>
                <input type="number" class="form-control" id="casa" name="casa" required>
            </div>

            <!-- Botón de Registro -->
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </div>
</div>