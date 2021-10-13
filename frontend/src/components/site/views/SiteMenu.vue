<template>
  <aside>
    <v-navigation-drawer
      :value="value"
      @input="$emit('input', $event)"
      :mini-variant="mini"
      :clipped="$vuetify.breakpoint.lgAndUp"
      app
    >
      <!-- MENU 01 - icones https://fonts.google.com/icons?selected=Material+Icons -->
      <v-list dense>
        <v-row row align-center>
          <v-col xs6>
            <v-subheader v-if="!mini" class="ml-2 title">
              <v-icon class="me-2">military_tech</v-icon> Início
            </v-subheader>
          </v-col>
        </v-row>

        <template v-for="item in itemsMenu01">
          <v-list-group
            v-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
          >
            <template v-slot:activator>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title class="subtitle-1">
                    {{ item.text }}
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template>

            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              :to="item.url"
            >
              <v-list-item-action v-if="child.icon">
                <v-icon class="ml-4">{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="ml-1 subtitle-2">{{
                  child.text
                }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item v-else :key="item.text" :to="item.url">
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title class="subtitle-1">{{
                item.text
              }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list>

      <!-- MENU 02 - Administração -->
      <!-- <v-list dense>
        <v-row row align-center>
          <v-col xs6>
            <v-subheader v-if="!mini" class="ml-2 title">
              <v-icon class="me-2">settings</v-icon> Adminstração
            </v-subheader>
          </v-col>
        </v-row>

        <template v-for="item in itemsMenu02">
          <v-list-group
            v-if="item.children"
            :key="item.text"
            v-model="item.model"
            :prepend-icon="item.model ? item.icon : item['icon-alt']"
            append-icon
          >
            <template v-slot:activator>
              <v-list-item>
                <v-list-item-content>
                  <v-list-item-title class="subtitle-1">
                    {{ item.text }}
                  </v-list-item-title>
                </v-list-item-content>
              </v-list-item>
            </template>

            <v-list-item
              v-for="(child, i) in item.children"
              :key="i"
              :to="item.url"
            >
              <v-list-item-action v-if="child.icon">
                <v-icon class="ml-4">{{ child.icon }}</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="ml-1 subtitle-2">{{
                  child.text
                }}</v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list-group>
          <v-list-item v-else :key="item.text" :to="item.url">
            <v-list-item-action>
              <v-icon>{{ item.icon }}</v-icon>
            </v-list-item-action>
            <v-list-item-content>
              <v-list-item-title class="subtitle-1">{{
                item.text
              }}</v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </template>
      </v-list> -->
    </v-navigation-drawer>
  </aside>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";

export default {
  components: {},
  name: "AppMenu",
  props: {
    value: Boolean
  },
  data: () => ({
    mini: false,
    itemsMenu01: [
      {
        icon: "camera",
        text: "Fotos",
        url: "/fotos"
      },
      {
        icon: "supervisor_account",
        text: "Atiradores",
        url: "/atiradores"
      },
      {
        icon: "beenhere",
        text: "Localização",
        url: "/localizacao"
      },
    ],
    itemsMenu02: [
      {
        // Lista de ícones https://iconify.desigfotosn/icon-sets/mdi/
        // https://fonts.google.com/icons?selected=Material+Icons
        icon: "supervisor_account",
        "icon-alt": "keyboard_arrow_down",
        text: "Usuários",
        url: "/dashboard/usuarios"
      },
      {
        // Lista de ícones https://iconify.design/icon-sets/mdi/
        icon: "domain",
        "icon-alt": "keyboard_arrow_down",
        text: "Distribuidoras",
        url: "/dashboard/distribuidoras"
      }
    ]
  }),
  computed: {
    ...mapState(["usuario"]),
    nomeUsuario() {
      if (this.usuario) {
        return this.usuario.email.split("@")[0];
      }
      return "Faça login";
    }
  },
  methods: {
    greet() {
      // alert('Você clicou no Menu!');
    }
  }
};
</script>
