<template>
    <List/>
</template>

<script>
import List from "@/components/youtube/watch-later/List.vue";

export default {
    data() {
        return {
            file: null,
            selectionMode: false,
            categories: null,
            newCategoryTitle: null
        }
    },
    mounted() {
        this.$store.dispatch('videos/getItems', {withoutCategories: true});
        this.$store.dispatch('categories/load');
    },
    components: {List}
}
</script>

<style scoped>

</style>
