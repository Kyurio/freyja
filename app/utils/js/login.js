const app = Vue.createApp({
    data() {

        return {

            requestFormLogin: {

                username: '',
                password: ''

            },

            csrfToken: '',
            error: '',

        }

    },

    mounted() {

    },

    methods: {


        Login() {
            try {

                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;
                axios.post('app/controller/Login', this.requestFormLogin)
                    .then(response => {

                        if (response.data) {
                            location.href = 'admin';
                        } else {
                            this.error = 'Usuario o Contraseña incorrectos';
                        }

                    })
                    .catch(error => {
                        console.error('Error al realizar la solicitud:', error);
                    });
            } catch (error) {
                console.error('Error al guardar el producto:', error);
            }
        },

        LogOut() {

            axios
                .get('app/controller/LogOut')
                .then(function (response) {
                })
                .catch(function (error) {
                });

        },


    }

});

app.mount('#app');