import Vue from 'vue'
import App from './App.vue'
import vuetify from './plugins/vuetify'
import router from "@/router";
import i18n from "@/plugins/i18n";
import "@/plugins/flag-icon";
import * as GmapVue from 'gmap-vue'

Vue.use(GmapVue, {
    load: {
      key: 'COLOQUE_SEU_GOOGLE_MAPS_KEY_AQUI',
      libraries: 'places', // This is required if you use the Autocomplete plugin
    },

    installComponents: true
  })


Vue.config.productionTip = false

new Vue({
  i18n,
  vuetify,
  router,
  render: h => h(App)
}).$mount('#app')
