import axios from "axios"

let Api = axios.create({
    baseURL: "http://localhost:8080/loopit/loopit-backend/public/"
});


Api.defaults.headers.common['Authorization'] = 'Bearer ${access_token}'
Api.defaults.withCredentials = true;


export default Api;