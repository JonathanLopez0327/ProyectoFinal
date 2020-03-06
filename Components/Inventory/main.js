$(document).ready(function () {
  console.log("Jquery esta en funcion");

  var url = "../../Backend/Inventory/Inventory.php";

  // Vuetify
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),

    data: () => ({
      search: '',
      panel: [1],
      accordion: true,
      snackbar: false,
      textSnack: 'texto snackbar',
      dialog: false,
      headers: [
        {
          text: 'ID',
          align: 'left',
          sortable: false,
          value: 'ID_INVENTORY',
        },
        { text: 'Codigo', value:'CODE_PRODUCT'},
        { text: 'Producto', value:'NAME_PRODUCT'},
        { text: 'Unidad', value: 'UNIT_PRODUCT'},
        { text: 'Cantidad Actual', value: 'STOCK'},
        { text: 'Fecha Inicial', value: 'DATE_INITIAL'},
        { text: 'Categoria', value: 'CATEGORY'},
        { text: 'Precio Unitario', value: 'UNITARY_PRICE'},
        { text: 'Opciones', value: 'accion', sortable: false },
      ],

        productos: [],
        editedIndex: -1,
        editado: {
          ID_INVENTORY: '',
          CODE_PRODUCT: '',
          NAME_PRODUCT: '',
          UNIT_PRODUCT: '',
          STOCK: '',
          DATE_INITIAL: '',
          CATEGORY: '',
          UNITARY_PRICE: '',

        },
        defaultItem: {
          ID_INVENTORY: '',
          CODE_PRODUCT: '',
          NAME_PRODUCT: '',
          UNIT_PRODUCT: '',
          STOCK: '',
          DATE_INITIAL: '',
          CATEGORY: '',
          UNITARY_PRICE: '',
        },
    }),

    computed: {
       //Dependiendo si es Alta o Edición cambia el título del modal
       formTitle () {
         //operadores condicionales "condición ? expr1 : expr2"
         // si <condicion> es true, devuelve <expr1>, de lo contrario devuelve <expr2>
         return this.editedIndex === -1 ? 'Entrada de Producto' : 'Modificar Informacion'
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
            this.productos = response.data;
          });
      },
      //Procedimiento Alta de moviles.
      altaMovil:function(){
          axios.post(url, {opcion:1, CODE_PRODUCT: this.CODE_PRODUCT, NAME_PRODUCT: this.NAME_PRODUCT, UNIT_PRODUCT: this.UNIT_PRODUCT,
            STOCK: this.STOCK, DATE_INITIAL: this.DATE_INITIAL, CATEGORY: this.CATEGORY, UNITARY_PRICE: this.UNITARY_PRICE }).then(response =>{
              this.listarInventario();
          });
           this.CODE_PRODUCT = "",
           this.NAME_PRODUCT = "",
           this.UNIT_PRODUCT = "",
           this.STOCK = "",
           this.DATE_INITIAL = "",
           this.CATEGORY = "",
           this.UNITARY_PRICE = ""
      },
      //Procedimiento EDITAR.
      editarMovil:function(ID_INVENTORY, CODE_PRODUCT, NAME_PRODUCT, UNIT_PRODUCT, STOCK, DATE_INITIAL, CATEGORY, UNITARY_PRICE){
        axios.post(url, {opcion:2, ID_INVENTORY: ID_INVENTORY, CODE_PRODUCT: CODE_PRODUCT, NAME_PRODUCT: NAME_PRODUCT, UNIT_PRODUCT: UNIT_PRODUCT,
          STOCK: STOCK, DATE_INITIAL: DATE_INITIAL, CATEGORY: CATEGORY, UNITARY_PRICE: UNITARY_PRICE }).then(response =>{
          this.listarInventario();
        });
      },
      //Procedimiento BORRAR.
      borrarMovil:function(ID_INVENTORY){
        axios.post(url, {opcion:3, ID_INVENTORY: ID_INVENTORY}).then(response =>{
          this.listarMoviles();
        });
      },
      editar (item) {
        this.editedIndex = this.productos.indexOf(item)
        this.editado = Object.assign({}, item)
        this.dialog = true
      },
      borrar (item) {
        const index = this.productos.indexOf(item)

        console.log(this.productos[index].ID_INVENTORY) //capturo el id de la fila seleccionada
          var r = confirm("¿Está seguro de borrar el registro?");
          if (r == true) {
            this.borrarMovil(this.productos[index].ID_INVENTORY)
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
          this.ID_INVENTORY = this.editado.ID_INVENTORY
          this.CODE_PRODUCT = this.editado.CODE_PRODUCT
          this.NAME_PRODUCT = this.editado.NAME_PRODUCT
          this.UNIT_PRODUCT = this.editado.UNIT_PRODUCT
          this.STOCK = this.editado.STOCK
          this.DATE_INITIAL = this.editado.DATE_INITIAL
          this.CATEGORY = this.editado.CATEGORY
          this.UNITARY_PRICE = this.editado.UNITARY_PRICE

          this.snackbar = true
          this.textSnack = '¡Actualización Exitosa!'
          this.editarMovil(this.ID_INVENTORY, this.CODE_PRODUCT, this.NAME_PRODUCT, this.UNIT_PRODUCT, this.STOCK, this.DATE_INITIAL, this.CATEGORY, this.UNITARY_PRICE)
        } else {
          //Guarda el registro en caso de Alta
          if(this.editado.CODE_PRODUCT == "" || this.editado.NAME_PRODUCT == "" || this.editado.UNIT_PRODUCT == "" || this.editado.STOCK == "" || this.editado.DATE_INITIAL == "" || this.editado.CATEGORY == "" || this.editado.UNITARY_PRICE == ""){
            this.snackbar = true
            this.textSnack = 'Datos incompletos.'
          }else{

            this.ID_INVENTORY = this.editado.ID_INVENTORY
            this.CODE_PRODUCT = this.editado.CODE_PRODUCT
            this.NAME_PRODUCT = this.editado.NAME_PRODUCT
            this.UNIT_PRODUCT = this.editado.UNIT_PRODUCT
            this.STOCK = this.editado.STOCK
            this.DATE_INITIAL = this.editado.DATE_INITIAL
            this.CATEGORY = this.editado.CATEGORY
            this.UNITARY_PRICE = this.editado.UNITARY_PRICE

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
