<template>
  <span>
    <v-menu
      bottom
      dense
      :disabled="disabled"
      :absolute="absolute"
      :open-on-hover="openOnHover"
      :close-on-click="closeOnClick"
      :close-on-content-click="closeOnContentClick"
      :offset-x="offsetX"
      :offset-y="offsetY"
    >
      <template v-slot:activator="{ on }">
        <v-btn icon large v-on="on">
          <v-avatar size="32px" item>
            <Gravatar v-if="usuario" :email="usuario.email" alt="Usuário" />
            <v-img v-else src="@/assets/logo.svg" alt="Vuetify" />
          </v-avatar>
        </v-btn>
      </template>

      <!-- A propriedade dense do v-list (diminui a fonte e os ícones) -->
      <v-list dense>
        <v-subheader class="my-0 py-0">Usuário</v-subheader>
        <v-list-item class="my-0 py-0">{{ nomeUsuario }}</v-list-item>
        <v-divider class="mx-4 my-2" :inset="false"></v-divider>
        <v-list-item
          class="my-0 py-0"
          v-for="(item, i) in items"
          :key="i"
          :to="{ path: item.url }"
        >
          <v-list-item-icon>
            <v-icon v-text="item.icon"></v-icon>
          </v-list-item-icon>
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
        <v-divider class="mx-4 my-0" :inset="false"></v-divider>
        <v-list-item class="my-0 py-0" @click="logout">
          <v-list-item-icon>
            <v-icon>exit_to_app</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Sair</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </span>
</template>

<script>
// @ is an alias to /src
import { mapState } from "vuex";
import Gravatar from "vue-gravatar";

export default {
  components: {
    Gravatar
  },
  name: "AppUsuario",
  mounted() {},
  data: () => ({
    items: [
      {
        title: "Perfil",
        icon: "person",
        url: "/perfil",
        exact: true
      },
      {
        title: "Opções",
        icon: "settings",
        url: "/settings",
        exact: true
      }
    ],
    disabled: false,
    absolute: false,
    openOnHover: true,
    value: false,
    closeOnClick: true,
    closeOnContentClick: true,
    offsetX: false,
    offsetY: true
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
    logout() {
      localStorage.removeItem("token");
      this.$store.commit("setUsuario", null);
      // this.$router.push({ name: 'login' });
      this.$router.push("/login");
    }
  }
};
</script>
