import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);

import auth_routes from "@/components/auth/router";
import dash_routes from "@/components/dashboard/router";
import site_routes from "@/components/site/router";

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [...site_routes, ...auth_routes, ...dash_routes]
});

export default router;
