import atiradores_routes from "@/components/site/views/atiradores/router";
import localizacao_routes from "@/components/site/views/localizacao/router";
import fotos_routes from "@/components/site/views/fotos/router";
const Home = () => import("@/components/site/views/Home.vue");

const routes = [
    {
      path: '/',
      name: 'Home',
      component: Home,
      children: [ ...atiradores_routes, ...localizacao_routes, ...fotos_routes ]
    }
  ]

export default routes;
