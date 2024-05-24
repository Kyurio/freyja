<form @submit.prevent="SendMailCompras" id="contact-form">
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Nombre <span class="required">*</span></label>
                <input type="text" v-model="requestFormVenta.nombre">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Correo Electrónico <span class="required">*</span></label>
                <input type="email" v-model="requestFormVenta.correo">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Teléfono <span class="required">*</span></label>
                <input type="text" v-model="requestFormVenta.telefono">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6">
            <div class="contact__input">
                <label>Ubicación <span class="required">*</span></label>
                <input type="text" v-model="requestFormVenta.ubicacion">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="contact__input">
                <label>Hectáreas <span class="required">*</span></label>
                <input type="text" v-model="requestFormVenta.hectareas">
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="contact__input">
                <label>Mensaje</label>
                <textarea cols="30" rows="10" v-model="requestFormVenta.mensaje"></textarea>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="contact__submit">
                <button type="submit" class="os-btn os-btn-black">Enviar Mensaje</button>
            </div>
        </div>
    </div>
</form>
