<template>
  <AppLayout>
    <router-view />
  </AppLayout>
</template>

<script>
import AppLayout from "./AppLayout.vue";

export default {
  name: "Dashboard",
  components: {
    AppLayout
  },
  created() {}
};
</script>
