<template>
  <v-container>
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
      ></v-text-field>
    </v-card-title>
    <v-data-table
      dense
      :headers="headers"
      :items="items"
      :search="search"
      :items-per-page="15"
      class="elevation-1"
    ></v-data-table>
  </v-container>
</template>

<script>
import atiradores from "./data/atiradores";

export default {
  name: "Atiradores",
  components: {},
  data: () => ({
    search: '',
    headers: [
      {
        text: "Número Atirador ",
        align: "start",
        sortable: true,
        value: "NUMERO",
      },
      {
        text: "Nome Atirador ",
        sortable: true,
        value: "NOME_COMPLETO",
      },
      {
        text: "Nome Guerra",
        sortable: true,
        value: "NOME_GUERRA",
      },
    ],
    items: [...atiradores],
  }),
};
</script>
