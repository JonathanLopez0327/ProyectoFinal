<!DOCTYPE html>
<html>
<head>
  <link href="../../Modules/css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="../../Modules/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <title>Inicio</title>
</head>
<body>

  <div id="app">
    <v-app>

      <div class="Contenedor">

        <span class="one"></span>
        <span class="two"></span>
        <span class="three"></span>
        <span class="four"></span>
        <span class="five"></span>

        <div class="Login-container">
          <v-card class="elevation-10 card" max-width="500" height="500" outlined color="#fff">

            <div class="header">
              <center>
                <img src="../../Images/logo2.png" alt="" class="logo">
              </center>
            </div>

            <div class="form">
              <div class="title">
                <p>Inicio Sesion</p>
                <hr>
              </div>

                <div class="frm">
                  <v-form ref="form" color="#064a76" v-model="valid" :lazy-validation="lazy">
                    <v-text-field width="150" v-model="name" dark :counter="25" :rules="nameRules" label="Nombre de Usuario" prepend-inner-icon="mdi-account" background-color="" requir >
                    </v-text-field>

                    <v-text-field v-model="password" dark :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[rules.required, rules.min]" :type="show1 ? 'text' : 'password'" name="input-10-1" label="Contraseña" hint="" counter background-color="" prepend-inner-icon="mdi-lock" @click:append="show1 = !show1"
                    ></v-text-field>

                    <v-btn :disabled="!valid" color="success" class="mr-4 mt-4" @click="validate">
                      Iniciar
                    </v-btn>

                    <v-btn color="error" class="mr-4 mt-4" @click="reset">
                      Cancelar
                    </v-btn>

                    <v-btn color="warning mt-4" @click="resetValidation">
                      Reiniciar
                    </v-btn>
                  </v-form>
                </div>

            </div>

          </v-card>
        </div>

        <img src="../../Images/undraw_deliveries_131a.svg" alt="" class="img">

        <div class="container">

        </div>

      </div>

    </v-app>
  </div>

  <script src="../../Modules/vue.js"></script>
  <script src="../../Modules/vuetify.js"></script>
  <script src="../../Modules/axios.min.js"></script>
  <script src="../../Modules/99eb8c8193.js"></script>
  <script src="main.js"></script>
</body>
</html>
