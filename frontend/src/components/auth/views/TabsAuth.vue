<template>
  <v-container fluid fill-height class="login pl-8">
    <v-row align="center" justify="center">
      <v-col cols="12" sm="8" md="6">
        <!-- <v-tabs color="grey lighten-3" slider-color="blue"> -->
        <v-tabs
          class="elevation-12"
          centered
          dark
          background-color="blue darken-3"
          icons-and-text
        >
          <v-tab ripple>
            {{ $t("login.abas.tabs.login") }}
            <v-icon>fingerprint</v-icon>
          </v-tab>
          <v-tab ripple>
            {{ $t("login.abas.tabs.registrar") }}
            <v-icon>how_to_reg</v-icon>
          </v-tab>
          <v-tab-item>
            <Login :show_result="false" :show_logo="false" />
          </v-tab-item>
          <v-tab-item>
            <Register :show_result="false" />
          </v-tab-item>
        </v-tabs>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import Register from "./Register.vue";
import Login from "./Login.vue";

export default {
  name: "TabsAuth",
  components: { Register, Login },
  data() {
    return {
      languages: [
        {
          flag: "br",
          language: "pt",
          title: "Português",
          label: "Português"
        },
        {
          flag: "us",
          language: "en",
          title: "English",
          label: "English"
        }
      ]
    };
  },
  methods: {
    changeLocale(locale) {
      this.$i18n.locale = locale;
    }
  }
};
</script>

<style>
.login {
  /** Se resolver colocar cor de fundo devemos tirar o max-width */
  /* background-color: whitesmoke; */
  max-width: 1200px;
}
</style>
