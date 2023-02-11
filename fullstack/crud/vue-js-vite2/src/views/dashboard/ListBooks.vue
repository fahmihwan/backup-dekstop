<script setup></script>

<template>
    <div>
        <div class="bg-purple-600 h-12 flex items-center px-5 text-white">Books App</div>
        <div class="p-2 md:p-10">
            <div className="overflow-x-auto w-full  md:w-1/2 ">
                <div class="flex items-center justify-between mb-5">
                    <p class="text-2xl font-bold">List Book</p>
                    <router-link to="/dashboard/create-book">
                        <button class="btn btn-primary">Create</button>
                    </router-link>
                </div>
                <table className="table border w-full ">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- row 1 -->
                        <tr>
                            <th>1</th>
                            <td>Cy Ganderton</td>
                            <td>Quality Control Specialist</td>
                            <td>Blue</td>
                        </tr>
                        <!-- row 2 -->
                        <tr>
                            <th>2</th>
                            <td>Hart Hagerty</td>
                            <td>Desktop Support Technician</td>
                            <td>Purple</td>
                        </tr>
                        <!-- row 3 -->
                        <tr>
                            <th>3</th>
                            <td>Brice Swyre</td>
                            <td>Tax Accountant</td>
                            <td>Red</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
