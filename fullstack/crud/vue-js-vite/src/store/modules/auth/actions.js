import axios from "axios";
import { REGISTER_ACTIONS } from "../../storeConstants";

const API = "http://127.0.0.1:8000/api/user/login";
export default {
    async [REGISTER_ACTIONS](content, payload) {
        let postData = {
            name: payload.name,
            username: payload.username,
            password: payload.password,
        };
        axios
            .post(API, postData)
            .then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
    },
};
