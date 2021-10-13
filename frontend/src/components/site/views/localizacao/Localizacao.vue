<template>
  <v-container>
    <GoogleMap/>
  </v-container>
</template>

<script>
// https://fonts.google.com/icons?selected=Material+Icons
import GoogleMap from './GoogleMap.vue'
export default {
  name: "Localizacao",
  components: {
      GoogleMap
  },
  data: () => ({})
};
</script>
