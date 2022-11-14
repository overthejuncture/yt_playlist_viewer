<template>
    <div class="container-md">
        <div class="d-flex flex-nowrap">
            <Sidebar/>
            <div class="border border-2 col container-fluid">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import Sidebar from "@/layout/Sidebar.vue"

export default {
    data() {
        return {
        }
    },
    components: {Sidebar}
}
</script>

<style>

</style>
