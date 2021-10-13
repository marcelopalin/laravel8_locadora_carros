const Localizacao = () =>
  import("@/components/site/views/localizacao/Localizacao.vue");

export default [
  {
    path: "localizacao",
    component: Localizacao,
    meta: { requerAutenticacao: false }
  }
];
