import "./assets/css/style.min.css";
import 'aos/dist/aos.css';

import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";

const app = createApp(App);

app.use(router);

app.mount("#app");
