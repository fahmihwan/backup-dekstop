import { createApp } from "vue";
import "./style.css";
import App from "./App.vue";
// import store from "./store";
import router from "./router";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

createApp(App)
    .use(router)
    // .use(store)
    .component("font-awesome-icon", FontAwesomeIcon)
    .mount("#app");
