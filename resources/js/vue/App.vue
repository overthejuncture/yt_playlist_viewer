<template>
    <div class="bg-primary min-h-screen mx-auto text-highlight bg-primary">
        <Header/>
        <div class="p-5">
            <router-view :key="$route.path"></router-view>
        </div>
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
