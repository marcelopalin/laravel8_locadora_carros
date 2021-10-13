import Vue from "vue";
import VueRouter from "vue-router";
Vue.use(VueRouter);
import site_routes from "@/components/site/router";
const routes = [...site_routes]
const router = new VueRouter({
    mode: "history",
    base: process.env.BASE_URL,
    routes
  });

export default router
