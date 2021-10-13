<template>
  <v-row>
    <v-footer app class="footer white--text">
      <span>{{ empresa }}</span>
      <v-spacer />
      <span>&copy; {{ ano }}</span>
    </v-footer>
  </v-row>
</template>

<script>
export default {
  name: "AppFooter",
  props: ["empresa", "ano"],
  components: {},
  data: () => ({}),
  methods: {
    adicionar() {
      this.contador += 1;
    }
  }
};
</script>

<style>
.footer {
  grid-area: footer;
  background: linear-gradient(to right, #1e469a, #49a7c1);
  color: #333; /** cor da fonte */
  /* align-items: center;
  justify-content: flex-end;
  padding-right: 10px; * para não ficar colado no lado direito da página */
}
</style>
