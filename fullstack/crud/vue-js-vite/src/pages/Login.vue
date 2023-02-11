<template>
    <div>
        <div>login page {{ firstName }}</div>
        <form @submit.prevent="onLogin">
            <input type="text" v-model="username" placeholder="username" />
            <div v-if="errors?.username">{{ errors?.username }}</div>
            <br />
            <input type="password" v-model="password" placeholder="password" />
            <div v-if="errors?.password">{{ errors?.password }}</div>
            <br />
            <button>Submit</button>
        </form>
    </div>
</template>
<script>
import { mapActions, mapState } from "vuex";
import LoginValidations from "./../services/LoginValidations";
import { REGISTER_ACTIONS } from "./../store/storeConstants";

export default {
    // computed: {
    //     ...mapState("auth", {
    //         firstName: (state) => state.name,
    //     }),
    // },
    data() {
        return {
            username: "",
            password: "",
            errors: [],
        };
    },
    methods: {
        ...mapActions("auth", {
            register: REGISTER_ACTIONS,
        }),
        onLogin() {
            let validations = new LoginValidations(this.username, this.password);
            this.errors = validations.checkValidations();

            if ("email" in this.errors || "password" in this.errors) {
                return false;
            }
            this.register({
                username: this.username,
                password: this.password,
            });
        },
    },
};
</script>
