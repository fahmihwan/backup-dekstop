import { createRouter, createWebHistory } from "vue-router";

const routes = [
    {
        path: "/",
        alias: "/login",
        name: "login",
        component: () => import("./views/auth/Login.vue"),
    },
    {
        path: "/register",
        alias: "/regiser",
        name: "register",
        component: () => import("./views/auth/Register.vue"),
    },
    {
        path: "/dashboard/list-books",
        name: "list-books",
        component: () => import("./views/dashboard/ListBooks.vue"),
    },
    {
        path: "/dashboard/create-book",
        name: "create",
        component: () => import("./views/dashboard/CreateBook.vue"),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
