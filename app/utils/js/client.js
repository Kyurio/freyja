const app = Vue.createApp({
    data() {

        return {

            productos: [],
            micarrito: [],
            categoria: [],
            imgProductos: [],
            detalleProductos: [],
            itemProducto: [],
            IconosProducto: [],
            Respuestas: [],
            ofertas: [],

            ItemCounter: 0,


            formPreguntas: {
                pregunta: null,
            },

            formRequetesProductos: {

                id: null,
                nombre: null,
                descripcion: null,
                precio: 0,
                canitdad: 0,

            },

            requestDataUsuario: {
                Nombre: null,
                Apellido: null,
                Correo: null,
                ConfirmarCorreo: null,
                Direccion: null,
                Telefono: null,
                Ncasa: null,
                Contrasena: null,
                ConfirmarContrasena: null,
            },

            requestDataConectaco: {

                nombre: null,
                correo: null,
                asunto: null,
                mensaje: null,

            },

            requestFormVenta: {
                nombre: null,
                correo: null,
                telefono: null,
                ubicacion: null,
                hectareas: null,
            },

            formClientes: {
                Email: null,
                Nombre: null,
            },

            formData: {
                pregunta: null,
                respuesta: null,
            },

            //variables extras
            imageUrl: 'assets/img/',
            url: null,
            video: null,

            FlagClient: true,

        }
    },

    computed: {


        heroStyle() {
            return {
                backgroundImage: `url(${this.imageUrl + this.url})`,
                backgroundSize: 'cover',
                backgroundPosition: 'center',
                backgroundRepeat: 'no-repeat',
                transition: 'background 0.3s,border 0.3s,border-radius 0.3s,box-shadow 0.3s',

            };
        },

    },


    mounted() {
        const urlParams = new URLSearchParams(window.location.search);
        const idProducto = urlParams.get('producto');
        const url = urlParams.get('url');

        this.GetCategorias();
        this.GetProductosCliente();
        this.GetAllOfertas();
        this.GetVideo();

        // Verifica que ambos idProducto y url no sean null o undefined
        if (idProducto && url) {
            this.AbrirDetalleProducto(idProducto, url);
        }
    },


    methods: {

        /**
         * 
         *  funciones get
         * 
         */

        async GetVideo() {
            const self = this;

            await axios
                .get('app/controller/GetVideo')
                .then(function(response) {
                    console.log(response.data);
                    self.video = response.data; // Usamos self en lugar de this
                })
                .catch(function(error) {

                });
        },

        async GetAllOfertas() {
            const self = this;

            await axios
                .get('app/controller/GetAllOfertas')
                .then(function(response) {
                    console.log(response.data);
                    self.ofertas = response.data; // Usamos self en lugar de this
                })
                .catch(function(error) {

                });
        },

        async GetPreguntas() {
            try {
                const response = await axios.post('app/controller/GetPreguntas', this.formPreguntas);

                this.Respuestas = response.data;
                this.formPreguntas.pregunta = '';
                this.PostCreateData();

            } catch (error) {
                console.error('Error al obtener preguntas:', error);
            }
        },

        async GetCategorias() {

            const self = this;

            await axios
                .get('app/controller/GetCategoria')
                .then(function(response) {

                    self.categoria = response.data; // Usamos self en lugar de this
                })
                .catch(function(error) {
                    // Maneja los errores de la solicitud GET aquÃ­

                });
        },

        async GetProductosCliente() {

            try {

                const self = this;

                await axios
                    .get('app/controller/GetProductoCliente')
                    .then(function(response) {

                        self.productos = response.data;
                    })
                    .catch(function(error) {

                    });

            } catch (error) {

            }
        },

        async GetDetalleProducto(id, url) {
            try {
                const self = this;
                this.url = url;
                this.GetItemsProducto(id);

                await axios.get('app/controller/GetDetalleProducto?id=' + id)
                    .then(function(response) {
                        self.detalleProductos = response.data;

                        // Obtiene los parÃ¡metros actuales de la URL
                        var params = new URLSearchParams(window.location.search);

                        // Agrega o actualiza los parÃ¡metros en la URL
                        params.set('producto', id);
                        params.set('url', url);

                        // Crea una nueva URL con los parÃ¡metros actualizados
                        var nuevaUrl = window.location.origin + window.location.pathname + '?' + params.toString();

                        // Reemplaza la URL sin recargar la pÃ¡gina (utilizando el historial del navegador)
                        window.history.replaceState(null, null, nuevaUrl);
                    })
                    .catch(function(error) {
                        console.error("Error al obtener el detalle del producto", error);
                    });
            } catch (error) {
                console.error("Error en la funciÃ³n GetDetalleProducto", error);
            }
        },

        async GetImagenProducto(id) {

            try {

                const self = this;
                await axios
                    .get('app/controller/GetImages?id=' + id)
                    .then(function(response) {

                        self.imgProductos = response.data;

                    }).catch(function(error) {

                    });
            } catch (error) {

            }
        },

        async GetItemsProducto(id) {

            const self = this;

            await axios
                .get('app/controller/GetItemsProducto?id=' + id)
                .then(function(response) {

                    self.itemProducto = response.data; // Usamos self en lugar de this
                })
                .catch(function(error) {

                });
        },

        async GetIconosProducto(id) {
            try {

                self = this;

                await axios
                    .get('app/controller/GetIconosProducto?id=' + id)
                    .then(function(response) {
                        self.IconosProducto = response.data;

                    })
                    .catch(function(error) {
                        // Maneja los errores de la solicitud GET aquÃ­

                    });
            } catch (error) {

            }
        },
        /**
         * 
         * 
         *  funciones extras
         * 
         */

        formatoMoneda(numero) {

            if (numero === null || numero === undefined) {
                return '';
            }
            return numero.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');

        },

        /**
         * 
         * 
         *  funciones post
         * 
         */


        async PostCliente() {
            try {
                const response = await axios.post('app/controller/PostCreateCliente', this.formClientes);

                console.log(response.data);
                this.formPreguntas.Email = '';
                this.formPreguntas.Nombre = '';
                this.FlagClient = false;

            } catch (error) {
                console.error('Error al obtener preguntas:', error);
            }
        },

        async PostPregunta() {
            try {
                console.log("entro....");
                const response = await axios.post('app/controller/PostCreateQuestion', this.formPreguntas);
                console.log(response.data);
            } catch (error) {
                console.error('Error al obtener preguntas:', error);
            }
        },

        async PostCreateData() {
            try {
                // ValidaciÃ³n de datos en blanco
                if (!this.formData.pregunta || !this.formData.respuesta) {
                    // Muestra una alerta con SweetAlert si algÃºn campo estÃ¡ en blanco
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor, completa todos los campos antes de enviar.',
                    });
                    return; // Detener la ejecuciÃ³n si hay campos en blanco
                }

                const response = await axios.post('app/controller/PostCreateData', this.formData);

                if (response.data == true) {
                    this.formData.pregunta = null;
                    this.formData.respuesta = null;

                    this.Toast.fire({
                        icon: "success",
                        title: "Pregunta respondida con exito"
                    });

                } else {
                    this.Toast.fire({
                        icon: "error",
                        title: "error a responser la pregunta"
                    });
                }

            } catch (error) {
                console.error('Error al obtener preguntas:', error);
            }
        },

        async SendMail() {

            try {

                await axios
                    .post('app/controller/Mailer', this.requestDataConectaco)
                    .then(function(response) {

                        if (response.data) {
                            // Utiliza response.data para verificar si el correo se enviÃ³ correctamente
                            Swal.fire({
                                icon: 'success',
                                title: 'El correo fue enviado con Ã©xito',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al enviar el correo',
                            });
                        }

                    }).catch(function(error) {

                    });

            } catch (error) {

                console

            }


        },

        async SendMailCompras() {


            try {

                await axios
                    .post('app/controller/MailerVentas', this.requestFormVenta)
                    .then(function(response) {

                        if (response.data) {
                            // Utiliza response.data para verificar si el correo se enviÃ³ correctamente
                            Swal.fire({
                                icon: 'success',
                                title: 'El correo fue enviado con Ã©xito',
                                text: 'Correo enviado correctamente.',
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error al enviar el correo',
                                text: 'Hubo un problema al enviar el correo.',
                            });
                        }

                    }).catch(function(error) {});

            } catch (error) {

                console

            }


        },

        /**
         * 
         * 
         *  funciones alternas
         * 
         */


        async AbrirDetalleProducto(idProducto, url) {
            try {

                const self = this;

                // Ejecutar lÃ³gica para obtener detalles del producto (puedes adaptar segÃºn tus necesidades)
                this.GetItemsProducto(idProducto);
                this.GetDetalleProducto(idProducto, url);
                this.GetImagenProducto(idProducto);

                // Puedes usar axios u otra lÃ³gica para obtener detalles del producto
                await axios.get(`app/controller/GetDetalleProducto?id=${idProducto}&url=${url}`)
                    .then(function(response) {
                        self.detalleProductos = response.data;

                        // Abre el offcanvas
                        var offcanvasDetalle = new bootstrap.Offcanvas(document.getElementById('offcanvasDetalle'));
                        offcanvasDetalle.show();

                    }).catch(function(error) {
                        console.error("Error al obtener el detalle del producto", error);
                    });
            } catch (error) {
                console.error("Error en la funciÃ³n AbrirDetalleProducto", error);
            }
        },




    }

});
app.mount('#client');