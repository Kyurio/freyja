    <!doctype html>
    <html lang="en" data-bs-theme="auto">
    <?php require 'app/utils/helpers.php' ?>

    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>

    <body class="d-flex align-items-center py-4 bg-body-tertiary">

        <style>
            html,
            body {
                height: 100%;
            }

            .form-signin {
                max-width: 330px;
                padding: 1rem;
            }

            .form-signin .form-floating:focus-within {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }
        </style>

        <main class="form-signin w-100 m-auto">
            <div id="app">


                <div class="container-sm mt-5 py-5 text-center">
                    <form @submit.prevent="Login">
                        <img class="mb-4" src="assets/icons/icon.png" alt="logo" width="200" height="200">
                        <h1 class="h3 mb-3 fw-normal">Ingrese sus datos</h1>
                        <span class="text-danger">{{ error }}</span>
                        <div class="form-floating">
                            <input type="email" class="form-control" id="correo" placeholder="name@example.com"
                                v-model="requestFormLogin.username">
                            <label for="correo">Correo</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="password" placeholder="Password"
                                v-model="requestFormLogin.password">
                            <label for="password">Contraseña</label>
                        </div>
                        <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">

                        <button type="submit" class="btn btn-dark btn-large">Entrar</button>
                    </form>
                </div>


            </div>

        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>

        <!-- vuejs -->
        <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

        <!-- axios -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"
            integrity="sha512-uMtXmF28A2Ab/JJO2t/vYhlaa/3ahUOgj1Zf27M5rOo8/+fcTUVH0/E0ll68njmjrLqOBjXM3V9NiPFL5ywWPQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>

        <!-- login -->
        <script src="<?=APP?>login.js">
        </script>

    </body>

    </html>