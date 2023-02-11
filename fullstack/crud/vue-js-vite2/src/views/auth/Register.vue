<script setup>
import { reactive, ref } from "vue";
</script>

<template>
    <div class="flex justify-center items-center h-screen">
        <div class="border w-96 text-center p-5 border-purple-500 rounded-md">
            <h1 class="text-4xl mb-5">Register</h1>
            <input
                type="text"
                placeholder="name"
                class="input input-bordered input-primary w-full max-w-xs mb-3"
            />
            <input
                type="text"
                placeholder="username"
                class="input input-bordered input-primary w-full max-w-xs mb-3"
            />
            <input
                type="text"
                placeholder="password"
                class="input input-bordered input-primary w-full max-w-xs mb-3"
            />
            <button class="btn btn-primary mr-5">Register</button>
            <router-link to="/">
                <button class="btn">back to login</button>
            </router-link>
        </div>
    </div>
</template>

<style scoped></style>
