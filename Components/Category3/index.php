<!DOCTYPE html>
<html>
<head>
  <link href="../../Modules/css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="../../Modules/vuetify.min.css" rel="stylesheet">
  <link rel="stylesheet" href="main.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <title>Inventario</title>
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
            <div class="logo-c elevation-5">
                <img src="../../Images/logo2.png" alt="">
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

                  <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="150" x-small dark href="../Entry/">
                    <v-icon x-small class="ml-0" color="">fas fa-user</v-icon>

                    <span class="ml-auto mr-auto">Sesiones</span>
                  </v-btn>

                    </v-expansion-panel-content>
                </v-expansion-panel>

            </v-expansion-panels>

            <!-- Fin del Primer panel -->

            <v-expansion-panels v-model="panel" multiple :accordion="accordion">
                <v-expansion-panel>
                    <v-expansion-panel-header>
                      <v-icon small class="ml-auto" color="#064a76">fas fa-file</v-icon>
                      <span class="mr-auto text">Reportes</span>

                    <template v-slot:actions small>
                        <v-icon color="#064a76">$expand</v-icon>
                    </template>
                    </v-expansion-panel-header>

                    <v-expansion-panel-content>

                    <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="175" x-small dark href="../Entry/">
                      <v-icon small class="ml-0" color="">mdi-package-variant</v-icon>

                      <span class="ml-auto mr-auto">Entrada</span>
                    </v-btn>

                    <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="175" x-small dark href="../Exit/">
                      <v-icon small class="ml-0" color="">mdi-package-variant-closed</v-icon>

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

                      <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="175" x-small dark href="../Category1/">
                        <v-icon small class="ml-0" color="">mdi-package-variant</v-icon>

                        <span class="ml-auto mr-auto">Categoria 1</span>
                      </v-btn>

                      <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="175" x-small dark href="../Category2/">
                        <v-icon small class="ml-0" color="">mdi-package-variant</v-icon>

                        <span class="ml-auto mr-auto">Categoria 2</span>
                      </v-btn>

                      <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="175" x-small dark href="../Category3/">
                        <v-icon small class="ml-0" color="">mdi-package-variant</v-icon>

                        <span class="ml-auto mr-auto">Categoria 3</span>
                      </v-btn>

                      <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="175" x-small dark href="../Inventory/">
                        <v-icon x-small class="ml-0" color="">fas fa-boxes</v-icon>

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

                      <v-btn class="ml-5 text-capitalize caption" color="#f8a01c" width="150" x-small dark href="../SignUp/">
                        <v-icon x-small class="ml-0" color="">fas fa-user</v-icon>

                        <span class="ml-auto mr-auto">Usuarios</span>

                      </v-btn>

                    </v-expansion-panel-content>
                </v-expansion-panel>

              </div>
        </nav>

        <!-- Main -->
        <main class="main" id="main">
          <div class="table">

                <v-card height="580" class="crd-t">

                  <v-card-title>
                    <!-- <v-icon class="mr-2" color="error">mdi-package-variant-closed</v-icon>
                    <span class="text">Administracion del Inventario</span> -->
                    <v-toolbar dark color="#064a76" width="500" style="border-radius: 4px;">
                      <v-icon>mdi-package-variant-closed</v-icon>
                      <v-toolbar-title class="ml-5">Categoria 3</v-toolbar-title>
                    </v-toolbar>

                    <v-spacer></v-spacer>
                    <v-text-field v-model="search" color="#064a76" append-icon="mdi-magnify" label="Search" single-line hide-details></v-text-field>
                  </v-card-title>

                  <v-data-table dense height="300" :headers="headers" :items="productos" :search="search" :items-per-page="10" class="mt-6 dtables">
                    <template v-slot:top>
                      <!--  Modal del diálogo para Alta y Edicion    -->
                      <v-dialog v-model="dialog" max-width="1000px">
                        <template v-slot:activator="{ on }"></template>
                        <v-card>
                            <v-toolbar dark color="#e5520f">
                                <v-icon>mdi-package-variant-closed</v-icon>
                              <v-toolbar-title class="ml-5">{{ formTitle }}</v-toolbar-title>
                            </v-toolbar>

                          <!-- </v-card-title> -->

                          <v-card-text>
                            <v-container>
                              <v-row>
                                <v-col cols="12" sm="6" md="4">
                                  <v-text-field v-model="editado.CODE_PRODUCT" label="Codigo del Producto" color="#e5520f" clearable prepend-icon="mdi-package-variant"></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="6" md="4">
                                  <v-text-field v-model="editado.NAME_PRODUCT" label="Nombre del Producto" color="#e5520f" clearable prepend-icon="mdi-package-variant"></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="6" md="4">
                                  <v-text-field v-model="editado.UNIT_PRODUCT" label="Unidad del Producto" color="#e5520f" clearable prepend-icon="mdi-package-variant"></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="6" md="4">
                                  <v-text-field v-model="editado.STOCK" label="Cantidad a Agregar" color="#e5520f" clearable prepend-icon="mdi-package-variant"></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="6" md="4">
                                  <v-text-field v-model="editado.DATE_INITIAL" label="Fecha Inicial" color="#e5520f" clearable prepend-icon="mdi-package-variant"></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="6" md="4">
                                  <v-text-field v-model="editado.CATEGORY" label="Categoria" color="#e5520f" clearable prepend-icon="mdi-package-variant"></v-text-field>
                                </v-col>

                                <v-col cols="12" sm="6" md="4">
                                  <v-text-field v-model="editado.UNITARY_PRICE" label="Precio Unitario" color="#e5520f" clearable prepend-icon="mdi-package-variant"></v-text-field>
                                </v-col>
                             </v-row>
                            </v-container>
                          </v-card-text>

                          <v-card-actions>
                            <v-spacer></v-spacer>
                              <v-btn color="error" fab small class="ma-2 white--text elevation-10" @click="cancelar">
                                <v-icon dark>mdi-cancel</v-icon>
                              </v-btn>
                              <v-btn color="#064a76" fab small class="ma-2 white--text elevation-10"  @click="guardar">
                                <v-icon dark>mdi-content-save</v-icon>
                              </v-btn>
                          </v-card-actions>

                        </v-card>
                      </v-dialog>
                    </template>

                    <template v-slot:item.accion="{ item }">
                        <v-icon dark color="#064a76" @click="editar(item)">mdi-pencil</v-icon>

                        <v-icon dark color="error" @click="borrar(item)">mdi-delete</v-icon>

                        <v-icon dark color="#f8a01c" @click="">mdi-package-variant-closed</v-icon>
                    </template>

                  </v-data-table>

                  <!-- Buttons -->
                  <div class="ml-1 mt-8">
                      <v-btn class="ma-2 elevation-20" fab dark small color="#064a76">
                          <v-icon dark>mdi-printer</v-icon>
                      </v-btn>

                      <v-btn class="ma-2 elevation-20" fab dark small color="#064a76" @click="dialog = !dialog">
                          <v-icon dark>mdi-plus</v-icon>
                      </v-btn>

                      <v-btn class="ma-2 elevation-20" fab dark small color="#064a76" @click="dialog = !dialog">
                          <v-icon dark>mdi-file-pdf-outline</v-icon>
                      </v-btn>

                      <v-btn class="ma-2 elevation-20" fab dark small color="#064a76" @click="dialog = !dialog">
                          <v-icon dark>mdi-file-word-outline</v-icon>
                      </v-btn>

                      <v-btn class="ma-2 elevation-20" fab dark small color="#064a76" @click="dialog = !dialog">
                          <v-icon dark>mdi-file-excel-outline</v-icon>
                      </v-btn>
                  </div>

                  <!-- template para el snackbar-->
                  <template>
                      <div class="text-center ma-2">
                      <v-snackbar v-model="snackbar">
                        {{ textSnack }}
                        <v-btn color="info" text @click="snackbar = false">Cerrar</v-btn>
                      </v-snackbar>
                      </div>
                  </template>

                </v-card>

        </div>
        </main>

      </div>

    </v-app>
  </div>

  <script src="../../Modules/vue.js"></script>
  <script src="../../Modules/vuetify.js"></script>
  <script src="../../Modules/axios.min.js"></script>
  <script src="../../Modules/99eb8c8193.js" crossorigin="anonymous"></script>
  <script src="../../Modules/jquery.js" charset="utf-8"></script>

  <script src="main.js" charset="utf-8"></script>
</body>
</html>
