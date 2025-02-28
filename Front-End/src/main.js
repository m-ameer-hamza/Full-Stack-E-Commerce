import "./assets/main.css";
import "primeicons/primeicons.css";
import Toast, { POSITION } from "vue-toastification";
import "vue-toastification/dist/index.css";
import router from "./router";
import { VueQueryPlugin } from "@tanstack/vue-query"; // Import QueryClient and QueryClientProvider
import { createApp } from "vue";
import App from "./App.vue";
import { createPinia } from "pinia";
import piniaPluginPersistedstate from "pinia-plugin-persistedstate";

const app = createApp(App);

const pinia = createPinia();
pinia.use(piniaPluginPersistedstate);
app.use(pinia);
app.use(VueQueryPlugin);

app.use(router);
app.use(Toast, {
  position: POSITION.TOP_RIGHT,
  timeout: 3000,
  containerClassName: "custom-toast-container",
});
app.mount("#app");
