<template>
    <div class="container pt-5">
        <div class="col-md-6">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Craete Data</h1>
                <router-link to="/">back</router-link>
            </div>
            <form @submit="submit">
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input
                        type="text"
                        v-model="data.title"
                        class="form-control"
                        id="title"
                        placeholder="title"
                    />
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">body</label>
                    <input
                        type="text"
                        v-model="data.body"
                        class="form-control"
                        id="body"
                        placeholder="body"
                    />
                </div>
                <button class="btn btn-primary me-2">Submit</button>
                <button class="btn btn-warning">clear</button>
            </form>
        </div>
    </div>
</template>
<script>
import JsonApiService from "../services/JsonApiService";

export default {
    data() {
        return {
            data: {
                title: "",
                body: "",
                userId: 1,
            },
        };
    },
    methods: {
        submit(e) {
            e.preventDefault();
            JsonApiService.create(this.data)
                .then((res) => console.log(res))
                .catch((err) => console.log(err));
        },
    },
};
</script>
