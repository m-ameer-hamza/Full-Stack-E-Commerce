import { createRouter, createWebHistory } from "vue-router";
import LoginView from "../views/LoginView.vue";
import RegisterView from "@/views/RegisterView.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: RegisterView,
    },
    // {
    //   path: "/register",
    //   name: "home",
    //   component: RegisterView,
    // },
    {
      path: "/login",
      name: "login",
      component: LoginView,
    },
  ],
});

export default router;
