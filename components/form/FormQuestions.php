<form @submit.prevent="PostCreateData" method="post" enctype="multipart/form-data" >
    <div class="mb-2">
        <label class="form-label">Preguntas</label>
        <input type="text" class="form-control" 
            v-model="formDataQuestion.pregunta" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Respuesta:</label>
        <textarea class="form-control" 
            v-model="formDataQuestion.respuesta" required></textarea>
    </div>

    <button type="submit" class="btn btn-dark btn-sm">Guardar</button>
</form>