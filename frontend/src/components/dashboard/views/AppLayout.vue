<template>
  <div>
    <AppToolbar v-model="drawer" :title="tituloApp" />
    <AppMenu v-model="drawer" />

    <v-container grid-list-md>
      <v-layout>
        <v-flex xs12>
          <slot />
        </v-flex>
      </v-layout>
    </v-container>

    <AppFooter :empresa="nomeEmpresa" :ano="anoCopyright" />
    <!-- <AppFloatingButton /> -->
  </div>
</template>

<script>
// import AppFloatingButton from './AppFloatingButton.vue';
import AppMenu from "./AppMenu.vue";
import AppToolbar from "./AppToolbar.vue";
import AppFooter from "./AppFooter.vue";

export default {
  name: "AppLayout",
  components: {
    // AppFloatingButton,
    AppMenu,
    AppToolbar,
    AppFooter
  },
  data: () => ({
    drawer: true,
    darkmode: false,
    colorTheme: "light"
  }),
  computed: {
    propertyComputed() {
      // console.log('I change when this.property changes.');
      return this.colorTheme;
    },
    tituloApp() {
      return process.env.VUE_APP_TITLE;
    },
    nomeEmpresa() {
      return process.env.VUE_APP_EMPRESA;
    },
    anoCopyright() {
      return process.env.VUE_APP_ANO_COPYRIGHT;
    }
  },
  mounted() {
    this.$vuetify.theme.dark = this.darkmode;
    console.log(process.env.VUE_APP_TITLE);
  }
};
</script>
