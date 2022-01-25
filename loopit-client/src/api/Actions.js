import Api from "./Api";
import Csrf from "./Csrf";

export default {

    async login(form) {
        await Csrf.getCookie();
        return Api.post("/api/login", form);
    },

    async logout() {
        await Csrf.getCookie();
        return Api.post("/api/logout");
    },

    async cars() {
        await Csrf.getCookie();
        return Api.get("/api/cars");
    }
};