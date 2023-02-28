<template>
    <div class="h-16 bg-slate-800 text-cyan-500 text-center flex px-20 justify-between items-center">
        <div>Logo</div>
        <div class="flex space-x-8">
            <router-link class="btn btn-light nav-link" to="/youtube/export-playlists">Export playlists</router-link>
            <router-link class="btn btn-light nav-link" to="/youtube/watch-later">Watch later</router-link>
            <router-link class="btn btn-light nav-link" to="/youtube/categorize">Categorize</router-link>
            <router-link class="btn btn-light nav-link" to="/youtube/categories">Categories</router-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>

</style>
