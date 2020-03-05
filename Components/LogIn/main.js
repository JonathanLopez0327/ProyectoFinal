new Vue({
  el: '#app',
  vuetify: new Vuetify(),

  data: () => ({
      valid: true,
      name: '',
      nameRules: [
        v => !!v || 'El nombre de usuario es requerido',
        v => (v && v.length <= 25) || 'El nombre no puede pasar de los 10 caracteres',
      ],
      select: null,
      items: [
        'Item 1',
        'Item 2',
      ],
      checkbox: false,
      lazy: false,

      show1: false,
        show2: true,
        show3: false,
        show4: false,
        password: '',
        rules: {
          required: value => !!value || 'Required.',
          min: v => v.length >= 8 || 'Minimo 8 caracteres',
          emailMatch: () => ('The email and password you entered don\'t match'),
        },
    }),

    methods: {
      validate () {
        if (this.$refs.form.validate()) {
          this.snackbar = true
        }
      },
      reset () {
        this.$refs.form.reset()
      },
      resetValidation () {
        this.$refs.form.resetValidation()
      },
    },
  });
