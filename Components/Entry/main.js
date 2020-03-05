$(document).ready(function () {
  console.log("Jquery esta en funcion");

  var url = "../../Backend/Entry/Entry.php";

  // Vuetify
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),

    data: () => ({
      search: '',
      panel: [0],
      accordion: true,
      snackbar: false,
      textSnack: 'texto snackbar',
      dialog: false,
      headers: [
        {
          text: 'ID',
          align: 'left',
          sortable: false,
          value: 'ID_ENTRY',
        },
        { text: 'Codigo', value:'CODE_PRODUCT_ENTRY'},
        { text: 'Producto', value:'NAME_PRODUCT_ENTRY'},
        { text: 'Cantidad Tomada', value: 'STOCK_ENTRY'},
        { text: 'Precio Unitario', value: 'UNITARY_PRICE_ENTRY'},
        { text: 'Unidad', value: 'UNIT_PRODUCT_ENTRY'},
        { text: 'Fecha de Entrada', value: 'DATE_OF_ENTRY'},
        { text: 'Cantidad Actual', value: 'STOCK_CURRENT'},
        { text: 'Opciones', value: 'accion', sortable: false },
      ],

        reportes: [],
        editedIndex: -1,
        editado: {
          ID_ENTRY: '',
          CODE_PRODUCT_ENTRY: '',
          NAME_PRODUCT_ENTRY: '',
          STOCK_ENTRY: '',
          UNITARY_PRICE_ENTRY: '',
          UNIT_PRODUCT_ENTRY: '',
          DATE_OF_ENTRY: '',
          STOCK_CURRENT: '',

        },
        defaultItem: {
          ID_ENTRY: '',
          CODE_PRODUCT_ENTRY: '',
          NAME_PRODUCT_ENTRY: '',
          STOCK_ENTRY: '',
          UNITARY_PRICE_ENTRY: '',
          UNIT_PRODUCT_ENTRY: '',
          DATE_OF_ENTRY: '',
          STOCK_CURRENT: '',
        },
    }),

    computed: {
       //Dependiendo si es Alta o Edición cambia el título del modal
       formTitle () {
         //operadores condicionales "condición ? expr1 : expr2"
         // si <condicion> es true, devuelve <expr1>, de lo contrario devuelve <expr2>
         return this.editedIndex === -1 ? 'Agregar Un Nuevo Producto' : 'Modificar Informacion'
       },
    },

    watch: {
      dialog (val) {
        val || this.cancelar()
      },
    },

    created () {
        this.listarInventario()
        this.rtdb()
    },

    // Metodos

    methods: {
      //PROCEDIMIENTOS para el CRUD

      //Procedimiento Listar moviles
      listarInventario:function (){
          axios.post(url, {opcion:4}).then(response =>{
            this.reportes = response.data;
          });
      },
      //Procedimiento Alta de moviles.
      altaMovil:function(){
          axios.post(url, {opcion:1, CODE_PRODUCT_ENTRY: this.CODE_PRODUCT_ENTRY, NAME_PRODUCT_ENTRY: this.NAME_PRODUCT_ENTRY, STOCK_ENTRY: this.STOCK_ENTRY,
            UNITARY_PRICE_ENTRY: this.UNITARY_PRICE_ENTRY, UNIT_PRODUCT_ENTRY: this.UNIT_PRODUCT_ENTRY, DATE_OF_ENTRY: this.DATE_OF_ENTRY, STOCK_CURRENT: this.STOCK_CURRENT }).then(response =>{
              this.listarInventario();
          });
           this.CODE_PRODUCT_ENTRY = "",
           this.NAME_PRODUCT_ENTRY = "",
           this.STOCK_ENTRY = "",
           this.UNITARY_PRICE_ENTRY = "",
           this.UNIT_PRODUCT_ENTRY = "",
           this.DATE_OF_ENTRY = "",
           this.STOCK_CURRENT = ""
      },
      //Procedimiento EDITAR.
      editarMovil:function(ID_ENTRY, CODE_PRODUCT_ENTRY, NAME_PRODUCT_ENTRY, STOCK_ENTRY, UNITARY_PRICE_ENTRY, UNIT_PRODUCT_ENTRY, DATE_OF_ENTRY, STOCK_CURRENT){
        axios.post(url, {opcion:2, ID_ENTRY: ID_ENTRY, CODE_PRODUCT_ENTRY: CODE_PRODUCT_ENTRY, NAME_PRODUCT_ENTRY: NAME_PRODUCT_ENTRY, STOCK_ENTRY: STOCK_ENTRY,
          UNITARY_PRICE_ENTRY: UNITARY_PRICE_ENTRY, UNIT_PRODUCT_ENTRY: UNIT_PRODUCT_ENTRY, DATE_OF_ENTRY: DATE_OF_ENTRY, STOCK_CURRENT: STOCK_CURRENT }).then(response =>{
          this.listarInventario();
        });
      },
      //Procedimiento BORRAR.
      borrarMovil:function(ID_ENTRY){
        axios.post(url, {opcion:3, ID_ENTRY: ID_ENTRY}).then(response =>{
          this.listarMoviles();
        });
      },
      editar (item) {
        this.editedIndex = this.reportes.indexOf(item)
        this.editado = Object.assign({}, item)
        this.dialog = true
      },
      borrar (item) {
        const index = this.reportes.indexOf(item)

        console.log(this.reportes[index].ID_ENTRY) //capturo el id de la fila seleccionada
          var r = confirm("¿Está seguro de borrar el registro?");
          if (r == true) {
            this.borrarMovil(this.reportes[index].ID_ENTRY)
            this.snackbar = true
            this.textSnack = 'Se eliminó el registro.'
          } else {
            this.snackbar = true
            this.textSnack = 'Operación cancelada.'
          }
      },

      rtdb() {
        setInterval(this.listarInventario, 1000)
      },

      cancelar () {
        this.dialog = false
        this.editado = Object.assign({}, this.defaultItem)
        this.editedIndex = -1
      },

      guardar () {
        if (this.editedIndex > -1) {
          //Guarda en caso de Edición
          this.ID_ENTRY = this.editado.ID_ENTRY
          this.CODE_PRODUCT_ENTRY = this.editado.CODE_PRODUCT_ENTRY
          this.NAME_PRODUCT_ENTRY = this.editado.NAME_PRODUCT_ENTRY
          this.STOCK_ENTRY = this.editado.STOCK_ENTRY
          this.UNITARY_PRICE_ENTRY = this.editado.UNITARY_PRICE_ENTRY
          this.UNIT_PRODUCT_ENTRY = this.editado.UNIT_PRODUCT_ENTRY
          this.DATE_OF_ENTRY = this.editado.DATE_OF_ENTRY
          this.STOCK_CURRENT = this.editado.STOCK_CURRENT

          this.snackbar = true
          this.textSnack = '¡Actualización Exitosa!'
          this.editarMovil(this.ID_ENTRY, this.CODE_PRODUCT_ENTRY, this.NAME_PRODUCT_ENTRY, this.STOCK_ENTRY, this.UNITARY_PRICE_ENTRY, this.UNIT_PRODUCT_ENTRY, this.DATE_OF_ENTRY, this.STOCK_CURRENT)
        } else {
          //Guarda el registro en caso de Alta
          if(this.editado.CODE_PRODUCT_ENTRY == "" || this.editado.NAME_PRODUCT_ENTRY == "" || this.editado.STOCK_ENTRY == "" || this.editado.UNITARY_PRICE_ENTRY == "" || this.editado.UNIT_PRODUCT_ENTRY == "" || this.editado.DATE_OF_ENTRY == "" || this.editado.STOCK_CURRENT == ""){
            this.snackbar = true
            this.textSnack = 'Datos incompletos.'
          }else{

            this.ID_ENTRY = this.editado.ID_ENTRY
            this.CODE_PRODUCT_ENTRY = this.editado.CODE_PRODUCT_ENTRY
            this.NAME_PRODUCT_ENTRY = this.editado.NAME_PRODUCT_ENTRY
            this.STOCK_ENTRY = this.editado.STOCK_ENTRY
            this.UNITARY_PRICE_ENTRY = this.editado.UNITARY_PRICE_ENTRY
            this.UNIT_PRODUCT_ENTRY = this.editado.UNIT_PRODUCT_ENTRY
            this.DATE_OF_ENTRY = this.editado.DATE_OF_ENTRY
            this.STOCK_CURRENT = this.editado.STOCK_CURRENT

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
