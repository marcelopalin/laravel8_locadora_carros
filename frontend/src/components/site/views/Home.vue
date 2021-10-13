<template>
  <SiteLayout>
    <router-view />
  </SiteLayout>
</template>

<script>
import SiteLayout from "./SiteLayout.vue";

export default {
  name: "Home",
  components: {
    SiteLayout,
  },
  data() {
    return {
      items: [
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/squirrel.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/sky.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/bird.jpg",
        },
        {
          src: "https://cdn.vuetifyjs.com/images/carousel/planet.jpg",
        },
      ],
    };
  },
};
</script>
