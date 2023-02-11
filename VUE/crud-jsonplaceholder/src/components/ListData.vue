<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>List data</h1>
                    <router-link to="/create">Create</router-link>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">isComplete</th>
                            <th scope="col">user_id</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody v-for="(item, index) in items">
                        <tr>
                            <th scope="row">{{ index + 1 }}</th>
                            <td>{{ item.title }}</td>
                            <td>{{ item.completed }}</td>
                            <td>{{ item.userId }}</td>
                            <td>
                                <button @click="deleteData(item.id)" class="btn btn-danger">delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import JsonApiService from "./../services/JsonApiService";
export default {
    name: "list-data",
    data() {
        return {
            items: [],
        };
    },
    methods: {
        getAll() {
            JsonApiService.getAll()
                .then((res) => {
                    this.items = res.data;
                    console.log(res.data);
                })
                .catch((err) => console.log(err));
        },
        deleteData(id) {
            JsonApiService.delete(id)
                .then((res) => {
                    console.log(res);
                    this.getAll();
                })
                .catch((err) => console.log(err));
        },
    },
    mounted() {
        this.getAll();
    },
};
</script>
