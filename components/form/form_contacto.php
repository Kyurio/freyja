<form @submit.prevent="SendMail" id="contact-form">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Nombre <span class="required">*</span></label>
                <input type="text" v-model="requestDataConectaco.nombre">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Correo Electrónico <span class="required">*</span></label>
                <input type="email" v-model="requestDataConectaco.correo">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact__input">
                <label>Fono <span class="required">*</span></label>
                <input type="text" v-model="requestDataConectaco.asunto">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact__input">
                <label>Mensaje</label>
                <textarea cols="30" rows="10" v-model="requestDataConectaco.mensaje"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact__submit">
                <button type="submit" class="os-btn os-btn-black">Enviar
                    Mensaje</button>
            </div>
        </div>
    </div>
</form>