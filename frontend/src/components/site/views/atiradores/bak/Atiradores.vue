<template>
  <v-container>
    <v-tabs color="grey" slider-color="blue">
      <v-tab ripple>
        <v-icon color="blue">mdi-label</v-icon>
        Tarifa Azul
      </v-tab>
      <v-tab-item>
        <TabelaAtiradores></TabelaAtiradores>
      </v-tab-item>
      <v-tab ripple>
        <v-icon color="green">mdi-label</v-icon>
        Tarifa Verde
      </v-tab>
      <v-tab-item>
        <TabelaAtiradores></TabelaAtiradores>
      </v-tab-item>
    </v-tabs>
  </v-container>
</template>

<script>
import atiradores from "./data/atiradores";
import TabelaAtiradores from "./Tabela";

export default {
  name: "Atiradores",
  components: {
    TabelaAtiradores
  },
  data: () => ({
    listaAtiradores: {
      ...atiradores
    }
  })
};
</script>
