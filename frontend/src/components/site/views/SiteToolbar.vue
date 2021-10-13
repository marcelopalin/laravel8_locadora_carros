<template>
  <nav>
    <v-app-bar
      :clipped-left="$vuetify.breakpoint.lgAndUp"
      app
      color="grey darken-3"
      dark
    >
      <!-- Ícone Menu lado Esquerdo - Mostra/Oculta -->
      <v-app-bar-nav-icon @click.stop="$emit('hide', !show)" />
      <!-- TOOLBAR TITULO -->
      <v-toolbar-title style="width: 300px" class="ml-0 pl-4">
        <span class="hidden-sm-and-down">
          <v-icon v-if="show_icon_logo" medium>fingerprint</v-icon>
          {{ title }}
        </span>
      </v-toolbar-title>
      <v-spacer />
      <!-- TOOLBAR SWITCH - DARK/WHITE -->
      <v-tooltip bottom>
        <template v-slot:activator="{ on }">
          <v-switch
            v-if="show_switch_dark"
            v-on="on"
            v-model="$vuetify.theme.dark"
            hide-details
            inset
            label
          ></v-switch>
        </template>
        <span>{{ $t("toolbar.switch_tema") }}</span>
      </v-tooltip>

      <!-- TOOLBAR CHANGE LANGUAGES -->
      <button
        class="buttonclass ma-2"
        v-for="entry in languages"
        :key="entry.title"
        @click="changeLocale(entry.language)"
      >
        <flag :iso="entry.flag" :title="entry.title" :squared="false" />
      </button>

      <!-- TOOLBAR ICON 1 - APPS -->
      <v-btn v-if="false" icon>
        <v-icon>mdi-apps</v-icon>
      </v-btn>

      <!-- TOOLBAR ICON 2 - SINO - APPS -->
      <v-btn icon>
        <v-icon>mdi-bell</v-icon>
      </v-btn>
    </v-app-bar>
  </nav>
</template>

<script>

export default {
  components: { },
  name: "SiteToolbar",
  props: { title: String, show: Boolean },
  data: () => ({
    show_search: false,
    dialog: false,
    show_icon_logo: false,
    show_switch_dark: true,
    locale: "",
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
  }),
  methods: {
    changeLocale(locale) {
      // console.log(locale);
      this.$i18n.locale = locale;
    }
  },
  model: {
    prop: "show",
    event: "hide"
  }
};
</script>
