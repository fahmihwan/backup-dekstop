<script setup>
import { reactive, ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
const count = ref(0);
const teks = ref(" ");
const awesome = ref(true);

function increment() {
    count.value++;
}

function onInput(e) {
    teks.value = e.target.value;
}

function toggle() {
    awesome.value = !awesome.value;
}
</script>

<template>
    <button v-on:click="increment">{{ count }}</button>
    <input :value="teks" @input="onInput" />
    <p>{{ teks }}</p>
    <br />
    <!-- toggle -->
    <div style="margin-bottom: 10px">
        <button @click="toggle">toggel</button>
        <h1 v-if="awesome">vue is awsome</h1>
        <h1 v-else>oh no</h1>
    </div>
    <!-- todos -->
    <div>
        <form @submit="addTodos">
            <input v-model="newTodo" />
            <button>submit</button>
        </form>
    </div>
</template>
