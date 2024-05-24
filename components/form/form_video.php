
<div class="container mt-5">
    <form id="contact-form"  @submit.prevent="CreateVideo">
        <div class="mb-3">
            <label for="iframeVideo" class="form-label">Iframe del video</label>
            <input type="text" class="form-control" id="iframeVideo" v-model="requestDataFormVideo.url">
            <div id="emailHelp" class="form-text">Pon aqui el iframe del video.</div>
        </div>
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        
        <button class="btn btn-sm btn-dark">Grabar</button>
    </form>
</div>
