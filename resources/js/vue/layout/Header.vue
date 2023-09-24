<template>
    <div class="h-16 bg-secondary p-5 text-center flex justify-between items-center">
        <div class="container mx-auto flex justify-between items-center">
            <div>YouTube Watch Later Sorter</div>
            <div class="flex space-x-8">
                <router-link class="btn btn-light nav-link" to="/export-playlists">Export playlists</router-link>
                <router-link class="btn btn-light nav-link" to="/watch-later">Watch later</router-link>
                <router-link class="btn btn-light nav-link" to="/categorize">Categorize</router-link>
                <router-link class="btn btn-light nav-link" to="/categories">Categories</router-link>
            </div>
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
