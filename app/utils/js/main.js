const app = Vue.createApp({
    data() {

        return {

            requestDataUsuario: {
                id_administrador: null,
                usuario: null,
                password: null,
                correo: null,
                confirm_password: null,
            },

            requestDataicono: {
                id_icono: null,
                icono: null,
                titulo: null,
            },

            dataErrorIcono: {
                icono: null,
                titulo: null,
            },

            formPreguntas: {
                pregunta: null,
            },

            formClientes: {
                Email: null,
                Nombre: null,
            },

            formData: {
                pregunta: null,
                respuesta: null,
            },

            formDataQuestion: {

                pregunta: null,
                respuesta: null,

            },

            requestDataProducto: {

                id_producto: null,
                categoria: null,
                producto: null,
                descripcion: null,
                item: null,
                oferta: null,
                precio: 0,
                stock: 0,
                estado: 0,
                url: [],
                oferta: 0,


            },

            DataErrorPorducto: {

                categoria: null,
                producto: null,
                descripcion: null,
                precio: null,
                stock: null,
                estado: null,
                url: '',

            },

            DataErrorCategoria: {
                categoria: null
            },

            DataErrorUsuario: {
                usuario: '',
                correo: '',
                password: '',
                confirm_password: ''
            },

            requestDataImagen: {
                url: null,
            },

            requestDataCategoria: {

                id_categoria: null,
                categoria: null
            },

            requestDataItemProducto: {
                titulo: null,
                descripcion: null,
            },

            requestDataFormVideo: {
                url: null,
            },

            categoria: [],
            productos: [],
            ProductosClientes: [],
            micarrito: [],
            usuarios: [],
            iconos: [],
            elementosSeleccionados: [],

            Respuestas: [],
            Preguntas: [],

            productoEdit: [],

            Toast: Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            }),

            //paginador productos: 
            pag_productos: 1,
            num_result_productos: 5,
            num_result_iconos: 5,

            //otras v ariables
            ItemCounter: 0,
            uploadProgress: 0,

            // flags
            FlagProducto: false,


            formPreguntas: {
                pregunta: null,
            },

            formClientes: {
                Email: null,
                Nombre: null,
            },

            formData: {
                pregunta: null,
                respuesta: null,
            },


            FlagClient: true,

            //paginador
            currentPage: 1,
            itemsPerPage: 5,


        }

    },

    computed: {

        totalPages() {
            return Math.ceil(this.Preguntas.length / this.itemsPerPage);
        },

        paginatedPreguntas() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.Preguntas.slice(start, end);
        },

    },

    mounted() {

        this.GetCategorias();
        this.GetProductos();
        this.chartCantidadProductos();
        this.GetProductosCliente();
        this.GetUsuario();
        this.GetIconos();
        this.GetAllPreguntas();


    },

    methods: {





        /**
         * 
         *  funciones get
         * 
         */

        async GetAllPreguntas() {
            try {

                const response = await axios.get('app/controller/GetAllPreguntas');

                console.log(response.data);
                this.Preguntas = response.data;

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

                });
        },

        async GetProductos() {
            const self = this;

            await axios
                .get('app/controller/GetProductos')
                .then(function(response) {
                    self.productos = response.data;
                })
                .catch(function(error) {});
        },

        async GetProductosCliente() {
            try {
                const self = this;
                await axios
                    .get('app/controller/GetProductosCliente')
                    .then(function(response) {
                        self.ProductosClientes = response.data;
                    })
                    .catch(function(error) {

                    });
            } catch (error) {}
        },

        async GetHistorial() {
            try {

                await axios
                    .get('https://api.mercadopago.com/v1/payments/search?sort=date_created&criteria=desc&external_reference=ID_REF&range=date_created&begin_date=NOW-30DAYS&end_date=NOW&store_id=47792478&pos_id=58930090Authorization:TEST-6882899692176487-101110-a0be41f1c025585729d24013f908a54c-362254467')
                    .then(function(response) {})
                    .catch(function(error) {

                    });
            } catch (error) {}
        },

        async GetUsuario() {
            try {

                self = this;

                await axios
                    .get('app/controller/GetUsuario')
                    .then(function(response) {

                        self.usuarios = response.data;

                    })
                    .catch(function(error) {
                        // Maneja los errores de la solicitud GET aquí

                    });
            } catch (error) {

            }
        },

        async GetIconos() {
            try {

                self = this;

                await axios
                    .get('app/controller/GetIconos')
                    .then(function(response) {

                        self.iconos = response.data;

                    })
                    .catch(function(error) {
                        // Maneja los errores de la solicitud GET aquí

                    });
            } catch (error) {

            }
        },

        /**
         * 
         * 
         *  funciones post
         * 
         */

        async CreateVideo() {
            // Enviar los valores al servidor usando Axios (ajusta la URL y los datos según tus necesidades)
            this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
            axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;
            await axios.post('app/controller/PostCreateVideo', this.requestDataFormVideo)
                .then(response => {

                    console.log(response.data);
                    if (response.data == true) {

                        this.Toast.fire({
                            icon: 'success',
                            title: 'Registro Exitoso'
                        })

                    } else {

                        this.Toast.fire({
                            icon: 'error',
                            title: 'error'
                        })
                    }

                })
                .catch(error => {
                    console.error('Error al realizar la solicitud:', error);
                });
        },

        async CreateProducto() {
            self = this;
            try {
                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;

                // Continuar con la creación del producto solo si la validación de imágenes es exitosa
                const response = await axios.post('app/controller/PostCreateProductos', this.requestDataProducto);

                if (response.data) {
                    this.Toast.fire({
                        icon: 'success',
                        title: 'Registro Exitoso'
                    });

                    this.uploadImages();
                    this.CreateItemProducto();
                } else {
                    this.Toast.fire({
                        icon: 'error',
                        title: 'Error en la creación del producto'
                    });
                }

            } catch (error) {
                console.error('Error al guardar el producto:', error);

            }
        },


        async CreateItemProducto() {

            // Enviar los valores al servidor usando Axios (ajusta la URL y los datos según tus necesidades)
            await axios.post('app/controller/PostCreateItemProducto', this.elementosSeleccionados)
                .then(response => {

                    if (response.data == true) {

                        this.Toast.fire({
                            icon: 'success',
                            title: 'Registro Exitoso'
                        })

                    } else {

                        this.Toast.fire({
                            icon: 'error',
                            title: 'error'
                        })
                    }

                })
                .catch(error => {
                    console.error('Error al realizar la solicitud:', error);
                });


        },

        async PostCreateData() {
            try {
                // Validación de datos en blanco
                if (!this.formDataQuestion.pregunta || !this.formDataQuestion.respuesta) {
                    // Muestra una alerta con SweetAlert si algún campo está en blanco
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor, completa todos los campos antes de enviar.',
                    });
                    return; // Detener la ejecución si hay campos en blanco
                }

                const response = await axios.post('app/controller/PostCreateData', this.formDataQuestion);

                console.log(response.data);
                if (response.data == true) {
                    this.formDataQuestion.pregunta = null;
                    this.formDataQuestion.respuesta = null;

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




        //valida que las imagenes no sean mayor al peso predefinido
        async handleFormSubmit() {
            const imagenesInput = document.getElementById('imagenes');
            const maxFileSize = 5242880; // Tamaño máximo permitido en bytes (en este caso, 5 MB)

            // Iterar sobre los archivos seleccionados
            for (let i = 0; i < imagenesInput.files.length; i++) {
                const file = imagenesInput.files[i];

                // Verificar el tamaño del archivo
                if (file.size > maxFileSize) {
                    // Mostrar un mensaje de error si el tamaño del archivo excede el máximo permitido
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: `La imagen ${i + 1} excede el tamaño máximo permitido.`,
                    });
                    return false; // Detener el proceso si se encuentra una imagen con tamaño excesivo
                }
            }

            // Si todos los archivos son válidos, continuar con el envío del formulario
            return true
        },

        async uploadImages() {
            try {
                this.FlagProducto = true;

                const imagenesInput = this.$refs.imagenesInput;
                const formData = new FormData();

                // Agregar las imágenes seleccionadas
                for (let i = 0; i < imagenesInput.files.length; i++) {
                    formData.append('imagenes[]', imagenesInput.files[i]);
                }

                const url = 'app/controller/UploadImagen';
                const config = {
                    onUploadProgress: (progressEvent) => {
                        this.uploadProgress = Math.round((progressEvent.loaded / progressEvent.total) * 100);
                    },
                };

                const response = await axios.post(url, formData, config);
                console.log(response.data);
                if (response.data == true) {
                    this.FlagProducto = false;
                    this.LimpiarFormProducto();
                    this.cerrarOffcanvas();
                    this.GetProductos();
                } else {
                    // Utiliza SweetAlert para mostrar un mensaje de error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error en la carga de imágenes. Por favor, verifica las imágenes seleccionadas.',
                    });

                }
            } catch (error) {
                // Utiliza SweetAlert para mostrar un mensaje de error
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error en la solicitud. Por favor, intenta nuevamente.',
                });
                console.error('Error en la solicitud:', error);
            }
        },

        async CreateCategoria() {
            try {
                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;

                const response = await axios.post('app/controller/PostCreateCategorias', this.requestDataCategoria);
                if (response.data) {
                    this.Toast.fire({
                        icon: 'success',
                        title: 'Registro Exitoso'
                    });
                    this.GetCategorias();
                    this.cerrarOffcanvas();
                    this.LimpiarFormCategoria();
                } else {
                    this.Toast.fire({
                        icon: 'error',
                        title: 'Error'
                    });
                }
            } catch (error) {
                console.error('Error al guardar el producto:', error);
            }
        },

        async CreateIcono() {

            try {
                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;
                await axios.post('app/controller/PostCreateIcon', this.requestDataicono)
                    .then(response => {

                        console.log(response.data);

                        if (response.data) {

                            this.Toast.fire({
                                icon: 'success',
                                title: 'Registro Exitoso'
                            })

                            this.GetIconos();

                        } else {
                            this.Toast.fire({
                                icon: 'error',
                                title: 'error'
                            })
                        }


                    })
                    .catch(error => {
                        console.error('Error al realizar la solicitud:', error);
                    });



            } catch (error) {
                // Maneja los errores, como mostrar un mensaje de error
                console.error('Error al guardar el producto:', error);
            }
        },
        /**
         * 
         * 
         *  funciones deleted
         * 
         */
        DeleteProducto(id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-dark ms-2', // Agrega la clase "me-2" para separar los botones
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Eliminar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    try {
                        axios.delete(`app/controller/DeleteProducto?id=` + id)
                            .then(response => {
                                if (response.data) {

                                    this.Toast.fire({
                                        icon: 'success',
                                        title: 'Producto eliminado con éxito'
                                    });
                                    this.GetProductos();
                                } else {
                                    this.Toast.fire({
                                        icon: 'error',
                                        title: 'Error al eliminar el producto'
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error al realizar la solicitud:', error);
                            });
                    } catch (error) {
                        console.error('Error al eliminar el producto:', error);
                    }
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    this.Toast.fire({
                        icon: 'warning',
                        title: 'Operación cancelada'
                    });
                }
            });
        },

        DeleteCategoria(id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-dark ms-2', // Agrega la clase "me-2" para separar los botones
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    try {
                        axios.delete(`app/controller/DeleteCategoria?id=` + id)
                            .then(response => {
                                if (response.data) {
                                    this.Toast.fire({
                                        icon: 'success',
                                        title: 'Categoria eliminado con éxito'
                                    });
                                    this.GetCategorias();
                                } else {
                                    this.Toast.fire({
                                        icon: 'error',
                                        title: 'Error al eliminar el Categoria'
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error al realizar la solicitud:', error);
                            });
                    } catch (error) {
                        console.error('Error al eliminar el producto:', error);
                    }
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    this.Toast.fire({
                        icon: 'warning',
                        title: 'Operación cancelada'
                    });
                }
            });
        },

        DeleteIcono(id) {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-dark ms-2', // Agrega la clase "me-2" para separar los botones
                    cancelButton: 'btn btn-secondary'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro?',
                text: '¡No podrás revertir esto!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    try {
                        axios.delete(`app/controller/DeleteIcono?id=` + id)
                            .then(response => {
                                if (response.data) {

                                    this.Toast.fire({
                                        icon: 'success',
                                        title: 'Producto eliminado con éxito'
                                    });
                                    this.GetIconos();
                                } else {
                                    this.Toast.fire({
                                        icon: 'error',
                                        title: 'Error al eliminar el producto'
                                    });
                                }
                            })
                            .catch(error => {
                                console.error('Error al realizar la solicitud:', error);
                            });
                    } catch (error) {
                        console.error('Error al eliminar el producto:', error);
                    }
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    this.Toast.fire({
                        icon: 'warning',
                        title: 'Operación cancelada'
                    });
                }
            });
            PageTransitionEvent

        },

        DeleteItemPorProducto(id) {

            try {
                axios.delete(`app/controller/DeleteIconoProProductos?id=` + id)
                    .then(response => {
                        if (response.data) {

                            this.Toast.fire({
                                icon: 'success',
                                title: 'iconos eliminado con éxito'
                            });
                            this.GetIconos();
                        } else {
                            this.Toast.fire({
                                icon: 'error',
                                title: 'Error al eliminar el producto'
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Error al realizar la solicitud:', error);
                    });
            } catch (error) {
                console.error('Error al eliminar el producto:', error);
            }

        },

        async DeletePregunta(idPregunta) {

            try {

                const confirmacion = await Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede revertir.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar'
                });

                if (confirmacion.isConfirmed) {
                    const response = await axios.delete(`app/controller/DeleteQuestion?idPregunta=${idPregunta}`);

                    console.log(response.data);

                    if (response.data == true) {
                        // Pregunta eliminada con Ã©xito
                        this.Toast.fire({
                            icon: 'success',
                            title: 'Pregunta eliminada con éxito'
                        });

                        // Puedes realizar alguna acciÃ³n adicional si es necesario, como recargar la lista de preguntas
                        this.GetAllPreguntas();

                    } else {
                        // Error al intentar eliminar la pregunta
                        this.Toast.fire({
                            icon: 'error',
                            title: 'Error al intentar eliminar la pregunta'
                        });
                    }
                }
            } catch (error) {
                console.error('Error al eliminar pregunta:', error);
            }
        },
        /**
         * 
         * 
         *  funciones put
         * 
         */
        async UpdateProducto() {
            try {
                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;
                await axios.post('app/controller/putUpdateProductos', this.requestDataProducto)
                    .then(response => {;

                        if (response.data) {

                            this.Toast.fire({
                                icon: 'success',
                                title: 'Registro Exitoso'
                            })


                            this.LimpiarFormProducto();
                            this.uploadImages();
                            this.cerrarOffcanvas();
                            this.GetProductos();
                            this.DeleteItemPorProducto(this.requestDataProducto.id_producto);
                            this.CreateItemProducto();

                        } else {
                            this.Toast.fire({
                                icon: 'error',
                                title: 'error'
                            })
                        }


                    })
                    .catch(error => {
                        console.error('Error al realizar la solicitud:', error);
                    });



            } catch (error) {
                // Maneja los errores, como mostrar un mensaje de error
                console.error('Error al guardar el producto:', error);
            }
        },

        async UpdateUsuario() {

            try {
                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;
                await axios.put('app/controller/PutUpdateUsuario', this.requestDataUsuario)
                    .then(response => {

                        if (response.data) {

                            this.Toast.fire({
                                icon: 'success',
                                title: 'Registro Exitoso'
                            })

                            this.cerrarOffcanvas();
                            this.GetUsuario();

                        } else {
                            this.Toast.fire({
                                icon: 'error',
                                title: 'error'
                            })
                        }


                    })
                    .catch(error => {
                        console.error('Error al realizar la solicitud:', error);
                    });



            } catch (error) {
                // Maneja los errores, como mostrar un mensaje de error
                console.error('Error al guardar el producto:', error);
            }

        },

        async updateCategoria() {

            try {
                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;
                await axios.put('app/controller/PutUpdateCategoria', this.requestDataCategoria)
                    .then(response => {

                        if (response.data) {

                            this.Toast.fire({
                                icon: 'success',
                                title: 'Actualizacion exitosa'
                            })

                            this.cerrarOffcanvas();
                            this.GetUsuario();

                        } else {
                            this.Toast.fire({
                                icon: 'error',
                                title: 'error'
                            })
                        }


                    })
                    .catch(error => {
                        console.error('Error al realizar la solicitud:', error);
                    });



            } catch (error) {
                // Maneja los errores, como mostrar un mensaje de error
                console.error('Error al guardar el producto:', error);
            }

        },

        async updateIcono() {

            try {
                this.csrfToken = document.querySelector('input[name="csrf_token"]').value;
                axios.defaults.headers.common['X-CSRF-TOKEN'] = this.csrfToken;
                await axios.put('app/controller/PutUpdateIcono', this.requestDataicono)
                    .then(response => {

                        if (response.data) {

                            this.Toast.fire({
                                icon: 'success',
                                title: 'Actualizacion exitosa'
                            })

                            this.cerrarOffcanvas();
                            this.GetIconos();

                        } else {
                            this.Toast.fire({
                                icon: 'error',
                                title: 'error'
                            })
                        }


                    })
                    .catch(error => {
                        console.error('Error al realizar la solicitud:', error);
                    });



            } catch (error) {
                // Maneja los errores, como mostrar un mensaje de error
                console.error('Error al guardar el producto:', error);
            }

        },


        /**
         * 
         * 
         *  funciones clear
         * 
         */

        LimpiarFormProducto() {

            this.requestDataProducto.categoria = null;
            this.requestDataProducto.producto = null;
            this.requestDataProducto.descripcion = null;
            this.requestDataProducto.precio = 0;
            this.requestDataProducto.stock = 0;
            this.requestDataProducto.oferta = null;

        },

        LimpiarFormCategoria() {
            this.requestDataCategoria.categoria = null;
        },

        /**
         * 
         * 
         *  funciones update
         * 
         */
        async CambiarEstadoProducto(idProducto, nuevoEstado) {

            try {
                const data = {
                    id_producto: idProducto,
                    estado: nuevoEstado
                };

                const response = await axios.put('app/controller/PutUpdateEstado', data);

                if (response.data) {
                    this.Toast.fire({
                        icon: 'success',
                        title: 'el estado cambio éxito'
                    });
                }

                this.GetProductos();
            } catch (error) {
                console.error('Error al actualizar el estado:', error);
            }

        },

        ActualizarUsuario(id, usuario, correo) {

            this.requestDataUsuario.id_administrador = id;
            this.requestDataUsuario.usuario = usuario;
            this.requestDataUsuario.correo = correo;

        },

        ActualizarProducto(id, categoria, producto, precio, descripcion, stock, item) {

            this.requestDataProducto.id_producto = id;
            this.requestDataProducto.categoria = categoria;
            this.requestDataProducto.descripcion = descripcion;
            this.requestDataProducto.item = item;
            this.requestDataProducto.stock = stock;
            this.requestDataProducto.producto = producto;
            this.requestDataProducto.precio = precio;

        },

        ActualizarCategoria(id, categoria) {

            this.requestDataCategoria.id_categoria = id;
            this.requestDataCategoria.categoria = categoria;

        },

        ActualizarIcono(id, titulo, icono) {

            this.requestDataicono.id_icono = id;
            this.requestDataicono.icono = icono;
            this.requestDataicono.titulo = titulo;

        },

        /**
         * 
         * 
         *  funciones validadores
         * 
         */
        validateForm() {

            let isValid = true; // Variable para rastrear si todos los campos son válidos

            // Verificar que la categoría no esté vacía
            if (!this.requestDataProducto.categoria) {
                this.DataErrorPorducto.categoria = 'Categoría no seleccionada';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.categoria = '';
            }

            // Verificar que el producto no esté vacío
            if (!this.requestDataProducto.producto) {
                this.DataErrorPorducto.producto = 'Nombre de producto requerido';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.producto = '';
            }

            // Verificar que el precio sea un número válido
            const precio = parseFloat(this.requestDataProducto.precio);
            if (isNaN(precio) || precio <= 0) {
                this.DataErrorPorducto.precio = 'Precio no válido';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.precio = '';
            }

            // Verificar que el stock sea un número válido
            const stock = parseFloat(this.requestDataProducto.stock);
            if (isNaN(stock) || stock <= 0) {
                this.DataErrorPorducto.stock = 'Stock no válido';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.stock = '';
            }

            // Verificar que al menos una imagen se haya seleccionado
            // const fileInput = document.getElementById("imagenes");
            // console.log(fileInput.files.length == 0);
            // if (fileInput.files.length == 0) {
            //     this.DataErrorPorducto.url = 'Necesitas al menos una foto';
            //     isValid = false; // Marcar como no válido
            // } else {
            //     this.DataErrorPorducto.url = '';
            // }


            // Si todos los campos son válidos, isValid será true
            if (isValid) {
                this.CreateProducto();
            }
        },

        validateFormEdit() {
            let isValid = true; // Variable para rastrear si todos los campos son válidos

            // Verificar que la categoría no esté vacía
            if (!this.requestDataProducto.categoria) {
                this.DataErrorPorducto.categoria = 'Categoría no seleccionada';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.categoria = '';
            }

            // Verificar que el producto no esté vacío
            if (!this.requestDataProducto.producto) {
                this.DataErrorPorducto.producto = 'Nombre de producto requerido';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.producto = '';
            }

            // Verificar que el precio sea un número válido
            const precio = parseFloat(this.requestDataProducto.precio);
            if (isNaN(precio) || precio <= 0) {
                this.DataErrorPorducto.precio = 'Precio no válido';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.precio = '';
            }

            // Verificar que el stock sea un número válido
            const stock = parseFloat(this.requestDataProducto.stock);
            if (isNaN(stock) || stock <= 0) {
                this.DataErrorPorducto.stock = 'Stock no válido';
                isValid = false; // Marcar como no válido
            } else {
                this.DataErrorPorducto.stock = '';
            }

            // Si todos los campos son válidos, isValid será true
            if (isValid) {
                this.UpdateProducto();
            }
        },

        validateFormCategoria() {

            if (!this.requestDataCategoria.categoria) {
                this.DataErrorCategoria.categoria = 'Categoría no seleccionada';
            } else {
                this.DataErrorCategoria.categoria = '';
                this.CreateCategoria();

            }
        },

        validarFormUsuario() {

            let isValid = true;

            if (!this.requestDataUsuario.usuario) {
                this.DataErrorUsuario.usuario = 'Usuario requerido';
                isValid = false;
            } else {
                this.DataErrorUsuario.usuario = '';
            }

            if (!this.requestDataUsuario.correo) {
                this.DataErrorUsuario.correo = 'Correo requerido';
                isValid = false;
            } else {
                this.DataErrorUsuario.correo = '';
            }

            if (!this.requestDataUsuario.password) {
                this.DataErrorUsuario.password = 'Contraseña requerida';
                isValid = false;
            } else {
                this.DataErrorUsuario.password = '';
            }

            if (this.requestDataUsuario.password !== this.requestDataUsuario.confirm_password) {
                this.DataErrorUsuario.confirm_password = 'Las contraseñas no coinciden';
                isValid = false;
            } else {
                this.DataErrorUsuario.confirm_password = '';
            }

            if (isValid) {
                this.UpdateUsuario();
            }
        },

        validateFormCategoriaEditar() {

            if (!this.requestDataCategoria.categoria) {
                this.DataErrorCategoria.categoria = 'Categoría no seleccionada';
            } else {
                this.DataErrorCategoria.categoria = '';
                this.updateCategoria();
            }

        },

        ValidateFormIcono() {

            let isValid = true; // Variable para rastrear si todos los campos son válidos

            // Verificar que el campo "icono" no esté vacío
            if (!this.requestDataicono.icono) {
                this.dataErrorIcono.icono = 'Icono requerido';
                isValid = false; // Marcar como no válido
            } else {
                this.dataErrorIcono.icono = '';
            }

            // Verificar que el campo "titulo" no esté vacío
            if (!this.requestDataicono.titulo) {
                this.dataErrorIcono.titulo = 'Título requerido';
                isValid = false; // Marcar como no válido
            } else {
                this.dataErrorIcono.titulo = '';
            }

            // Si todos los campos son válidos, isValid será true
            if (isValid) {
                // Realiza alguna acción, como enviar el formulario
                // Si deseas enviar el formulario, puedes hacerlo aquí
                this.CreateIcono();
            }

        },

        ValidateFormIconoEditar() {

            let isValid = true; // Variable para rastrear si todos los campos son válidos

            // Verificar que el campo "icono" no esté vacío
            if (!this.requestDataicono.icono) {
                this.dataErrorIcono.icono = 'Icono requerido';
                isValid = false; // Marcar como no válido
            } else {
                this.dataErrorIcono.icono = '';
            }

            // Verificar que el campo "titulo" no esté vacío
            if (!this.requestDataicono.titulo) {
                this.dataErrorIcono.titulo = 'Título requerido';
                isValid = false; // Marcar como no válido
            } else {
                this.dataErrorIcono.titulo = '';
            }

            // Si todos los campos son válidos, isValid será true
            if (isValid) {
                // Realiza alguna acción, como enviar el formulario
                // Si deseas enviar el formulario, puedes hacerlo aquí
                this.updateIcono();
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

        cerrarOffcanvas() {

            $('#offcanvasProducto').offcanvas('hide');
            $('#offcanvasingresocategoria').offcanvas('hide');


        },

        gotoPage(page) {
            if (page >= 1 && page <= Math.ceil(this.productos.length / this.num_result_productos)) {
                this.pag_productos = page;
            }
        },

        /**
         * 
         * 
         * 
         * funciones charts
         * 
         */
        chartCantidadProductos() {
            axios.get('app/controller/GetChartCategorias')
                .then(function(response) {
                    const data = response.data; // Los datos de la consulta
                    const labels = data.map(item => item.nombre); // Extrae los nombres para las etiquetas del eje X
                    const dataValues = data.map(item => item.cantidad_producto); // Extrae las cantidades para el eje Y
                    const ctx = document.getElementById('ChartTipoProducto');

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels, // Usamos los nombres como etiquetas del eje X
                            datasets: [{
                                label: '  ',
                                data: dataValues, // Usamos las cantidades como valores en el eje Y
                                borderWidth: 0,
                                backgroundColor: 'rgba(0, 0, 0, 0.2)', // Establece el fondo de las barras como transparente
                                borderColor: 'rgba(0, 0, 0, 0.2)', // Establece el color del borde de las barras como transparente
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    display: true, // Mostrar el eje X
                                },
                                y: {
                                    display: true, // Mostrar el eje Y
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true, // Mostrar la leyenda
                                },
                                tooltip: {
                                    enabled: true, // Habilita las sugerencias emergentes
                                }
                            }
                        }
                    });
                })
                .catch(function(error) {});
        },

        SeleccionarPregunta(question) {
            this.formDataQuestion.pregunta = question;
        },


        totalPages() {
            return Math.ceil(this.Preguntas.length / this.itemsPerPage);
        },

        paginatedPreguntas() {
            const start = (this.currentPage - 1) * this.itemsPerPage;
            const end = start + this.itemsPerPage;
            return this.Preguntas.slice(start, end);
        },

    }

});
app.mount('#app');