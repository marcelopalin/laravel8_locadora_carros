const Fotos = () =>
  import("@/components/site/views/fotos/Fotos.vue");

export default [
  {
    path: "fotos",
    component: Fotos,
    meta: { requerAutenticacao: false }
  }
];
