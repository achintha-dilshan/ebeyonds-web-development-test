import "./assets/css/style.min.css";
import "aos/dist/aos.css";

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const app = createApp(App);

app.use(Toast, {});
app.use(router);

app.mount("#app");
