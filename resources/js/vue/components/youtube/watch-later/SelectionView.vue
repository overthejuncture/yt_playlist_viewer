<template>
    <div class="border p-3">
        <Item :title="title"/>
    </div>
</template>

<script>
import Item from "@/components/youtube/watch-later/Item.vue";

export default {
    name: "SelectionView",
    components: {Item},
    props: {
        title: String
    }
}
</script>

<style scoped>

</style>
