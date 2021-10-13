import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import colors from 'vuetify/lib/util/colors'
// Importando a paleta de cores do Vuetify
import 'roboto-fontface/css/roboto/roboto-fontface.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';

Vue.use(Vuetify)

const vuetify = new Vuetify({
    theme: {
        themes: {
          light: {
            primary: colors.purple,
            secondary: colors.grey.darken1,
            accent: colors.shades.black,
            error: colors.red.accent3,
          },
          dark: {
            primary: colors.blue.lighten3,
          },
        },
      },
})

export default vuetify
