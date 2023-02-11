import { createRouter, createWebHistory } from "vue-router";

import ListData from "./components/ListData.vue";
import Create from "./components/Create.vue";

const routes = [
    { path: "/", component: ListData },
    { path: "/create", component: Create },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
