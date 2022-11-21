<template>
    <div class="sidebar border border-2 col-3" style="height: calc(100vh - 3rem)">
        <ul class="nav flex-column">
            <router-link class="btn btn-light nav-link" to="/youtube/export-playlists">Export playlists</router-link>
            <router-link class="btn btn-light nav-link" to="/youtube/watch-later">Watch later</router-link>
            <router-link class="btn btn-light nav-link" to="/youtube/categories">Categories</router-link>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Sidebar"
}
</script>

<style scoped>

</style>
