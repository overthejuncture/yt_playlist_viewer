<template>
    <router-view></router-view>
</template>

<script>
import WatchLater from "@/pages/youtube/watch-later.vue";

export default {
    data() {
        return {
            greeting: 'Hello World!'
        }
    },
    components: {WatchLater}
}
</script>

<style>
.greeting {
    color: red;
    font-weight: bold;
}
</style>
