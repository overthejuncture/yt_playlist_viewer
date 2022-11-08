<template>
    <div class="my-3 btn btn-warning" v-on:click="selectionMode = !selectionMode">Switch mode</div>
    <SelectionView v-if="selectionMode"/>
    <List v-else/>
</template>

<script>
import SelectionView from "@/components/youtube/watch-later/SelectionView.vue";
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
    components: {SelectionView, List}
}
</script>

