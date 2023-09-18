<template>
    <div>
        <div class="grid grid-cols-3 gap-4">
            <ListItem v-for="item in this.$store.state.videos.items" :item="item"/>
        </div>
    </div>
</template>

<script>
import CreateCategory from "@/components/youtube/categories/Create.vue";
import CategoriesList from "@/components/youtube/categories/CategoriesList.vue";
import ListItem from "@/components/youtube/watch-later/ListItem.vue";

export default {
    name: "List",
    data() {
        return {
            filters: {}
        }
    },
    methods: {
    },
    components: {CreateCategory, CategoriesList, ListItem}
}
</script>

<style scoped>
</style>
