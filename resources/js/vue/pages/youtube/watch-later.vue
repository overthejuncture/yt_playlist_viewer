<template>
    <div>
        <List/>
    </div>
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
        this.$store.dispatch('watchLater/getItems');
        this.$store.dispatch('categories/load');
    },
    components: {List}
}
</script>

