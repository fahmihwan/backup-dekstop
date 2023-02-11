<script setup>
import { reactive, ref } from "vue";
import AuthService from "./../../services/AuthService";
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { faHome, faUser, faUserPlus, faSignInAlt, faSignOutAlt } from "@fortawesome/free-solid-svg-icons";

const dataForm = reactive({
    username: "",
    password: "",
});

const login = (e) => {
    e.preventDefault();
    AuthService.login(dataForm)
        .then((res) => {
            if (res.data.authorization.token) {
                console.log(res.data);
                // localStorage.setItem("token", JSON.stringify(res.data));
            }
        })
        .catch((err) => console.log(err));
};
</script>

<template>
    <div class="flex justify-center items-center h-screen">
        <div class="border w-96 text-center p-5 border-purple-500 rounded-md">
            <h1 class="text-4xl mb-5">Login</h1>
            <form @submit="login">
                <input
                    type="text"
                    placeholder="username"
                    class="input input-bordered input-primary w-full max-w-xs mb-3"
                    v-model="dataForm.username"
                />
                <input
                    type="password"
                    placeholder="password"
                    v-model="dataForm.password"
                    class="input input-bordered input-primary w-full max-w-xs mb-3"
                />
                <button class="btn btn-primary mr-5">Login</button>
                <router-link to="/regiser">
                    <button class="btn">u dont have account?</button>
                </router-link>
            </form>
        </div>
    </div>
</template>

<style scoped></style>
