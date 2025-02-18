import "./assets/main.css";
import "primeicons/primeicons.css";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";
import router from "./router";
import { VueQueryPlugin } from "@tanstack/vue-query"; // Import QueryClient and QueryClientProvider
import { createApp } from "vue";
import App from "./App.vue";
import { createPinia } from "pinia";
const app = createApp(App);

app.use(VueQueryPlugin);

app.use(router);
app.use(Toast);
app.use(createPinia());

app.mount("#app");
