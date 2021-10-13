const Atiradores = () =>
  import("@/components/site/views/atiradores/Atiradores.vue");

export default [
  {
    path: "atiradores",
    component: Atiradores,
    meta: { requerAutenticacao: false }
  }
];
