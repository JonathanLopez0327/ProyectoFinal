<!DOCTYPE html>
<html>
<head>
  <link href="Modules/css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="Modules/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="app.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <title>Pagina Principal</title>
</head>
<body>
  <div id="app">
    <v-app>

      <div class="contenedor active" id="contenedor">

        <!-- Header -->
        <header class="header">
          <div class="contenedor-logo">
            <v-btn class="mx-2 bt-menu elevation-5" fab small color="#064a76" id="boton-menu">
              <v-icon small class="" color="" dark>fas fa-bars</v-icon>
             </v-btn>
          </div>

          <div class="barra-busqueda">
            <input type="text" name="" id="" placeholder="Buscar">
            <button  type="submit"><i class="fas fa-search"></i></button>
          </div>

          <div class="botones-header">
            <v-btn class="mx-2 bt elevation-5" fab x-small color="#064a76" id="boton-menu">
              <v-icon small class="" color="" dark>fas fa-user</v-icon>
            </v-btn>

            <v-btn class="mx-2 bt elevation-5" fab x-small color="#064a76" id="boton-menu">
              <v-icon small class="" color="" dark>fas fa-cog</v-icon>
            </v-btn>

            <!-- <a href="" class="avatar"><img src="" alt=""></a> -->

            <v-btn class="mx-2 bt elevation-5" fab x-small color="#064a76" id="boton-menu">
              <v-icon small class="" color="" dark>fas fa-power-off</v-icon>
            </v-btn>
          </div>
        </header>

        <!-- Menu -->
        <nav class="menu-lateral">
          <div class="conten-logo my-2">
            <div class="logo-c">
                <img src="assets/images/logo2.png" alt="">
            </div>

            <span class="mt-11 ml-2">Fast-Flexible Inventory</span>
          </div>

          <hr class="div">

          <!-- Link of menu -->
          <div class="contenedor-menu">
            <div class="my-2">
                <v-btn  color="#fff" width="250" class="px-auto btn">
                    <v-icon small class="ml-8 mx-auto" color="#064a76">fas fa-home</v-icon>
                    <span class="text-capitalize text">Inicio</span>
                </v-btn>
            </div>

            <v-expansion-panels class="mb-4">

              <v-expansion-panel>
                <v-expansion-panel-header>
                  <v-icon small class="ml-auto" color="#064a76">fas fa-cog</v-icon>
                  <span class="mr-auto text">Opciones</span>

                  <template v-slot:actions small>
                    <v-icon color="#064a76">$expand</v-icon>
                  </template>
                </v-expansion-panel-header>

                <v-expansion-panel-content>

                  <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="150" x-small dark href="Components/Entry/">
                    <v-icon x-small class="ml-0" color="">fas fa-user</v-icon>

                    <span class="ml-auto mr-auto">Sesiones</span>
                  </v-btn>

                    </v-expansion-panel-content>
                </v-expansion-panel>

            </v-expansion-panels>

            <!-- Fin del Primer panel -->

            <v-expansion-panels>
                <v-expansion-panel>
                    <v-expansion-panel-header>
                      <v-icon small class="ml-auto" color="#064a76">fas fa-file</v-icon>
                      <span class="mr-auto text">Reportes</span>

                    <template v-slot:actions small>
                        <v-icon color="#064a76">$expand</v-icon>
                    </template>
                    </v-expansion-panel-header>

                    <v-expansion-panel-content>

                    <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="150" x-small dark href="Components/Entry/">
                      <v-icon x-small class="ml-0" color="">fas fa-door-open</v-icon>

                      <span class="ml-auto mr-auto">Entrada</span>
                    </v-btn>

                    <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="150" x-small dark href="Components/Exit/">
                      <v-icon x-small class="ml-0" color="">fas fa-door-closed</v-icon>

                      <span class="ml-auto mr-auto">Salida</span>
                    </v-btn>

                    </v-expansion-panel-content>
                </v-expansion-panel>

                <!-- *********************************************************** -->

                <v-expansion-panel>
                    <v-expansion-panel-header>
                      <v-icon small class="ml-auto" color="#064a76">fas fa-boxes</v-icon>
                      <span class="mr-auto text">Inventario</span>

                      <template v-slot:actions small>
                          <v-icon color="#064a76">$expand</v-icon>
                      </template>
                    </v-expansion-panel-header>

                    <v-expansion-panel-content>

                      <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="175" x-small dark href="Components/Inventory/">
                        <v-icon x-small class="ml-0" color="">fas fa-box</v-icon>

                        <span class="ml-auto mr-auto">Inventario General</span>
                      </v-btn>
                    </v-expansion-panel-content>
                </v-expansion-panel>

                <!-- *********************************************************** -->

                <v-expansion-panel>
                    <v-expansion-panel-header>
                      <v-icon small class="ml-auto" color="#064a76">fas fa-user-cog</v-icon>
                      <span class="mr-auto text">Administracion</span>

                      <template v-slot:actions small>
                          <v-icon color="#064a76">$expand</v-icon>
                      </template>
                    </v-expansion-panel-header>

                    <v-expansion-panel-content>

                      <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="150" x-small dark href="Components/SignUp/">
                        <v-icon x-small class="ml-0" color="">fas fa-user</v-icon>

                        <span class="ml-auto mr-auto">Usuarios</span>

                      </v-btn>

                    </v-expansion-panel-content>
                </v-expansion-panel>

              </div>
        </nav>

        <!-- Main -->
        <main class="main" id="main">
          <!-- Cards Count -->
                <div class="card-count">

                    <div class="cards">
                        <v-card
                            class="mx-auto elevation-5"
                            max-width="344"
                            outlined
                        >
                            <v-list-item three-line>
                            <v-list-item-content>
                                <div class="overline mb-4">Categoria 1</div>
                                <v-list-item-title class="headline mb-1">Conteo</v-list-item-title>
                                <v-list-item-subtitle>Total de productos en la primera categoria</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-avatar
                                tile
                                size="90"
                                color="#f8a01c"
                                class="card-avatar elevation-15"
                            >
                                <v-icon large class="" color="#fff">fas fa-box-open</v-icon>
                            </v-list-item-avatar>
                            </v-list-item>

                            <v-card-actions>
                                <v-btn
                                    class="text-capitalize caption"
                                    color="#f8a01c"
                                    width="150"
                                    x-small
                                    dark
                                    >
                                    <v-icon x-small class="ml-0" color="">fas fa-eye</v-icon>

                                    <span class="ml-auto mr-auto">Inspeccionar</span>

                                </v-btn>

                            </v-card-actions>
                        </v-card>

                        <!-- -------- -->

                        <v-card
                            class="mx-auto elevation-5"
                            max-width="344"
                            outlined
                        >
                            <v-list-item three-line>
                            <v-list-item-content>
                                <div class="overline mb-4">Categoria 2</div>
                                <v-list-item-title class="headline mb-1">Conteo</v-list-item-title>
                                <v-list-item-subtitle>Total de productos en la segunda categoria</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-avatar
                                tile
                                size="90"
                                color="#064a76"
                                class="card-avatar elevation-15"
                            >
                                <v-icon large class="" color="#fff">fas fa-box-open</v-icon>
                            </v-list-item-avatar>
                            </v-list-item>

                            <v-card-actions>
                                <v-btn
                                    class="text-capitalize caption"
                                    color="#064a76"
                                    width="150"
                                    x-small
                                    dark
                                    >
                                    <v-icon x-small class="ml-0" color="">fas fa-eye</v-icon>

                                    <span class="ml-auto mr-auto">Inspeccionar</span>

                                </v-btn>

                            </v-card-actions>
                        </v-card>

                        <!-- --------- -->

                        <v-card
                            class="mx-auto elevation-5"
                            max-width="344"
                            outlined
                        >
                            <v-list-item three-line>
                            <v-list-item-content>
                                <div class="overline mb-4">Categoria 3</div>
                                <v-list-item-title class="headline mb-1">Conteo</v-list-item-title>
                                <v-list-item-subtitle>Total de productos en la tercera categoria</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-avatar
                                tile
                                size="90"
                                color="#e5520f"
                                class="card-avatar elevation-15"
                            >
                                <v-icon large class="" color="#fff">fas fa-box-open</v-icon>
                            </v-list-item-avatar>
                            </v-list-item>

                            <v-card-actions>
                                <v-btn
                                    class="text-capitalize caption"
                                    color="#e5520f"
                                    width="150"
                                    x-small
                                    dark
                                    >
                                    <v-icon x-small class="ml-0" color="">fas fa-eye</v-icon>

                                    <span class="ml-auto mr-auto">Inspeccionar</span>

                                </v-btn>

                            </v-card-actions>
                        </v-card>
                    </div>

                </div>

                <!-- Cards statistics -->
                <div class="card-statistics">

                    <div class="cards mt-9">
                        <v-card
                            class="mx-auto elevation-5"
                            max-width="344"
                            height="260"
                            outlined
                        >
                            <v-list-item three-line>
                            <v-list-item-content>
                                <div class="overline mb-2 c-c">Estadisticas</div>
                                <v-list-item-title class="headline mb-1">Conteo</v-list-item-title>
                                <v-list-item-subtitle>Total de entradas en la ultima semana</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-avatar
                                tile
                                width="250"
                                height="150"
                                class="c-avatar elevation-15"
                                color="#f8a01c"
                            >
                            <v-icon large class="display-4" color="#fff">mdi-finance</v-icon>
                          </v-list-item-avatar>
                            </v-list-item>

                            <v-card-actions>
                                <v-btn
                                        class="mt-5 text-capitalize caption"
                                        color="#f8a01c"
                                        width="150"
                                        x-small
                                        dark
                                        >
                                        <v-icon x-small class="ml-0" color="">fas fa-eye</v-icon>

                                        <span class="ml-auto mr-auto">Inspeccionar</span>

                                </v-btn>
                            </v-card-actions>
                        </v-card>

                        <!-- ----------- -->

                        <v-card
                            class="mx-auto elevation-5"
                            max-width="344"
                            height="260"
                            outlined
                        >
                            <v-list-item three-line>
                            <v-list-item-content>
                                <div class="overline mb-2 c-c">Estadisticas</div>
                                <v-list-item-title class="headline mb-1">Conteo</v-list-item-title>
                                <v-list-item-subtitle>Total de salidas en la ultima semana</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-avatar
                                tile
                                width="250"
                                height="150"
                                class="c-avatar elevation-15"
                                color="#064a76"
                            >
                            <v-icon large class="display-4" color="#fff">mdi-chart-timeline-variant</v-icon>
                            </v-list-item-avatar>
                            </v-list-item>

                            <v-card-actions>
                                <v-btn
                                        class="mt-5 text-capitalize caption"
                                        color="#064a76"
                                        width="150"
                                        x-small
                                        dark
                                        >
                                        <v-icon x-small class="ml-0" color="">fas fa-eye</v-icon>

                                        <span class="ml-auto mr-auto">Inspeccionar</span>

                                </v-btn>
                            </v-card-actions>
                        </v-card>

                        <!-- ------------- -->

                        <v-card
                            class="mx-auto elevation-5"
                            max-width="344"
                            height="260"
                            outlined
                        >
                            <v-list-item three-line>
                            <v-list-item-content>
                                <div class="overline mb-2 c-c">Estadisticas</div>
                                <v-list-item-title class="headline mb-1">Conteo</v-list-item-title>
                                <v-list-item-subtitle>Total de productos en el inventario</v-list-item-subtitle>
                            </v-list-item-content>

                            <v-list-item-avatar
                                tile
                                width="250"
                                height="150"
                                class="c-avatar elevation-15"
                                color="#e5520f"
                            >
                            <v-icon large class="display-4" color="#fff">mdi-poll</v-icon>
                            </v-list-item-avatar>
                            </v-list-item>

                            <v-card-actions>
                                <v-btn
                                        class="mt-5 text-capitalize caption"
                                        color="#e5520f"
                                        width="150"
                                        x-small
                                        dark
                                        >
                                        <v-icon x-small class="ml-0" color="">fas fa-eye</v-icon>

                                        <span class="ml-auto mr-auto">Inspeccionar</span>

                                </v-btn>
                            </v-card-actions>
                        </v-card>
                    </div>

                </div>

        </main>

      </div>

    </v-app>
  </div>

  <script src="Modules/vue.js"></script>
  <script src="Modules/vuetify.js"></script>
  <script src="Modules/axios.min.js"></script>
  <script src="Modules/99eb8c8193.js" crossorigin="anonymous"></script>
  <script src="Modules/jquery.js" charset="utf-8"></script>
  <script src="Modules/jquery.includeHTML.min.js" charset="utf-8"></script>
  <script src="app.js" charset="utf-8"></script>
</body>
</html>
