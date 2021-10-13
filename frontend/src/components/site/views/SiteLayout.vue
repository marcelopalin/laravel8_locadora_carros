<template>
  <div>
    <SiteToolbar v-model="drawer" :title="tituloApp" />
    <SiteMenu v-model="drawer" />
    <v-container grid-list-md>
      <v-layout>
        <v-flex xs12>
          <slot />
        </v-flex>
      </v-layout>
    </v-container>

    <SiteFooter :empresa="nomeEmpresa" :ano="anoCopyright" />
  </div>
</template>

<script>
import SiteFooter from "./SiteFooter.vue";
import SiteToolbar from "./SiteToolbar.vue";
import SiteMenu from "./SiteMenu.vue";

export default {
  name: "AppLayout",
  components: {
    SiteFooter,
    SiteToolbar,
    SiteMenu
  },
  data: () => ({
    drawer: true,
    darkmode: false,
    colorTheme: "light"
  }),
  computed: {
    propertyComputed() {
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
    console.log(process.env.NODE_ENV);
    console.log(process.env.BASE_URL);
  }
};
</script>
