<form @submit.prevent="GetPreguntas" method="post">
    <div class="form-floating">
        <textarea class="form-control" id="floatingTextarea" v-model="formPreguntas.pregunta"></textarea>
        <label for="floatingTextarea" require>¿Cómo te puedo ayudar?</label>
    </div>
    <button type="submit" class="btn btn-primary mt-2"> Enviar</button>
</form>