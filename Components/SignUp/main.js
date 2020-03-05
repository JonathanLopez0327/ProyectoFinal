$(document).ready(function () {
  console.log("Jquery esta en funcion");

  var url = "../../Backend/SignUp/SignUp.php";

  // Vuetify
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),

    data: () => ({
      search: '',
      panel: [2],
      snackbar: false,
      textSnack: 'texto snackbar',
      dialog: false,
      headers: [
        {
          text: 'ID',
          align: 'left',
          sortable: false,
          value: 'ID_USER',
        },
        { text: 'Nombre', value:'NAME_USER'},
        { text: 'Apellido', value:'LASTNAME_USER'},
        { text: 'Tipo', value: 'TYPE_USER'},
        { text: 'Usuario', value: 'USER_NAME'},
        { text: 'Opciones', value: 'accion', sortable: false },
      ],

        usuarios: [],
        editedIndex: -1,
        editado: {
          ID_USER: '',
          NAME_USER: '',
          LASTNAME_USER: '',
          TYPE_USER: '',
          USER_NAME: '',
          PASS_USER: '',
        },
        defaultItem: {
          ID_USER: '',
          NAME_USER: '',
          LASTNAME_USER: '',
          TYPE_USER: '',
          USER_NAME: '',
          PASS_USER: '',
        },
    }),

    computed: {
       //Dependiendo si es Alta o Edición cambia el título del modal
       formTitle () {
         //operadores condicionales "condición ? expr1 : expr2"
         // si <condicion> es true, devuelve <expr1>, de lo contrario devuelve <expr2>
         return this.editedIndex === -1 ? 'Agregar Nuevo Usuario' : 'Modificar Informacion'
       },
    },

    watch: {
      dialog (val) {
        val || this.cancelar()
      },
    },

    created () {
        this.listarMoviles()
        this.rtdb()
    },

    // Metodos

    methods: {
      //PROCEDIMIENTOS para el CRUD

      //Procedimiento Listar moviles
      listarMoviles:function (){
          axios.post(url, {opcion:4}).then(response =>{
            this.usuarios = response.data;
          });
      },
      //Procedimiento Alta de moviles.
      altaMovil:function(){
          axios.post(url, {opcion:1, NAME_USER: this.NAME_USER, LASTNAME_USER: this.LASTNAME_USER, TYPE_USER: this.TYPE_USER, USER_NAME: this.USER_NAME, PASS_USER: this.PASS_USER }).then(response =>{
              this.listarMoviles();
          });
           this.NAME_USER = "",
           this.LASTNAME_USER = "",
           this.TYPE_USER = "",
           this.USER_NAME = "",
           this.PASS_USER = ""
      },
      //Procedimiento EDITAR.
      editarMovil:function(ID_USER, NAME_USER, LASTNAME_USER, TYPE_USER, USER_NAME, PASS_USER){
        axios.post(url, {opcion:2, ID_USER: ID_USER, NAME_USER: NAME_USER, LASTNAME_USER: LASTNAME_USER, TYPE_USER: TYPE_USER, USER_NAME: USER_NAME, PASS_USER: PASS_USER }).then(response =>{
          this.listarMoviles();
        });
      },
      //Procedimiento BORRAR.
      borrarMovil:function(ID_USER){
        axios.post(url, {opcion:3, ID_USER: ID_USER}).then(response =>{
          this.listarMoviles();
        });
      },
      editar (item) {
        this.editedIndex = this.usuarios.indexOf(item)
        this.editado = Object.assign({}, item)
        this.dialog = true
      },
      borrar (item) {
        const index = this.usuarios.indexOf(item)

        console.log(this.usuarios[index].ID_USER) //capturo el id de la fila seleccionada
          var r = confirm("¿Está seguro de borrar el registro?");
          if (r == true) {
            this.borrarMovil(this.usuarios[index].ID_USER)
            this.snackbar = true
            this.textSnack = 'Se eliminó el registro.'
          } else {
            this.snackbar = true
            this.textSnack = 'Operación cancelada.'
          }
      },

      rtdb() {
        setInterval(this.listarMoviles, 1000)
      },

      cancelar () {
        this.dialog = false
        this.editado = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      },

      guardar () {
        if (this.editedIndex > -1) {
          //Guarda en caso de Edición
          this.ID_USER = this.editado.ID_USER
          this.NAME_USER = this.editado.NAME_USER
          this.LASTNAME_USER = this.editado.LASTNAME_USER
          this.TYPE_USER = this.editado.TYPE_USER
          this.USER_NAME = this.editado.USER_NAME
          this.PASS_USER = this.editado.PASS_USER

          this.snackbar = true
          this.textSnack = '¡Actualización Exitosa!'
          this.editarMovil(this.ID_USER, this.NAME_USER, this.LASTNAME_USER, this.TYPE_USER, this.USER_NAME, this.PASS_USER)
        } else {
          //Guarda el registro en caso de Alta
          if(this.editado.NAME_USER == "" || this.editado.LASTNAME_USER == "" || this.editado.TYPE_USER == "" || this.editado.USER_NAME == "" || this.editado.USER_NAME == ""){
            this.snackbar = true
            this.textSnack = 'Datos incompletos.'
          }else{

            this.ID_USER = this.editado.ID_USER
            this.NAME_USER = this.editado.NAME_USER
            this.LASTNAME_USER = this.editado.LASTNAME_USER
            this.TYPE_USER = this.editado.TYPE_USER
            this.USER_NAME = this.editado.USER_NAME
            this.PASS_USER = this.editado.PASS_USER

            this.snackbar = true
            this.textSnack = '¡Alta exitosa!'
            this.altaMovil()
          }
        }
        this.cancelar()
      },
      // fin
  },


    // Fin Vue
  });

    const contenedor = document.querySelector('#contenedor');

    document.querySelector('#boton-menu').addEventListener('click', () =>{
    contenedor.classList.toggle('active');
  });
});
