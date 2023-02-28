<template>
    <div class="container mx-auto">
        <Header/>
        <router-view :key="$route.path"></router-view>
    </div>
</template>

<script>
import Sidebar from "@/layout/Sidebar.vue"
import Header from "@/layout/Header.vue";

export default {
    data() {
        return {}
    },
    components: {Header, Sidebar},
    created() {
        this.$store.dispatch('categories/load');
    }
}
</script>

<style>

</style>
