<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"></li>
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">List</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/create" class="nav-link">create</router-link>
                    </li>
                    <li class="nav-item"></li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
export default {};
</script>
