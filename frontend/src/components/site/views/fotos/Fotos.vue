<template>
  <v-container>
    <v-carousel :show-arrows="false"
        height="950"
        cycle
        show-arrows-on-hover
    >
      <v-carousel-item
        v-for="(item, i) in items"
        :key="i"
        :src="item.src"
        reverse-transition="fade-transition"
        transition="fade-transition"
      ></v-carousel-item>
    </v-carousel>
  </v-container>
</template>

<script>
export default {
  name: "Fotos",
  components: {},
  data: () => ({
    items: [
      {
        src: "./slides/s1.jpg",
      },
      {
        src: "./slides/s2.jpg",
      },
      {
        src: "./slides/s3.jpg",
      },
      {
        src: "./slides/s4.jpg",
      },
      {
        src: "./slides/s5.jpg",
      },
    ],
  }),
};
</script>
