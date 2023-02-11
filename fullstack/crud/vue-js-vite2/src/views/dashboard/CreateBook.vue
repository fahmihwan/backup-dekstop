<script setup>
import { reactive, ref } from "vue";
</script>

<template>
    <div class="p-10">
        <div class="w-2/5">
            <div class="flex mb-5 items-center justify-between">
                <p class="text-2xl font-bold">Create new book</p>
                <router-link to="/dashboard/list-books" class="link link-primary"> Back </router-link>
            </div>
            <form action="">
                <div class="form-control w-full mb-5">
                    <input type="text" placeholder="Title" class="input input-bordered w-full" />
                    <!-- <label class="label">
            <span class="label-text-alt text-error">title mustbe required</span>
        </label> -->
                </div>
                <div class="form-control w-full mb-5">
                    <input type="text" placeholder="Author" class="input input-bordered w-full" />
                    <!-- <label class="label">
            <span class="label-text-alt text-error">title mustbe required</span>
        </label> -->
                </div>
                <button class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-secondary">clear</button>
            </form>
        </div>
    </div>
</template>

<style scoped></style>
