import { createRouter, createWebHistory } from "vue-router"
import Login from "./Login.vue"
import Dashboard from "./Dashboard"

const routes = [
    {
        path: "/",
        name: "Login",
        component: Login,
        meta: { guestOnly: true }
    },
    {
        path: "/dashboard",
        name:"Dashboard",
        component: Dashboard,
        meta: { authOnly: true }
    },

]

const router = createRouter({
    history: createWebHistory(),
    base: process.env.BASE_URL,
    routes :routes
});

function isLoggedIn() {
    return localStorage.getItem("auth");
}

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.authOnly)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (!isLoggedIn()) {
            next({
                path: "/",
                query: { redirect: to.fullPath }
            });
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.guestOnly)) {
        // this route requires auth, check if logged in
        // if not, redirect to login page.
        if (isLoggedIn()) {
            next({
                path: "/dashboard",
                query: { redirect: to.fullPath }
            });
        } else {
            next();
        }
    } else {
        next(); // make sure to always call next()!
    }
});

export default router;