<template>
    <div class="border">
        <CreateCategory/>
        <ListCategories v-on:picked="saveCategoryForItems"/>
        <SelectionItem :title="this.$store.state.watchLater.current.title"/>
    </div>
</template>

<script>
import SelectionItem from "@/components/youtube/watch-later/SelectionItem.vue";
import ListCategories from "@/components/youtube/categories/List.vue";
import CreateCategory from "@/components/youtube/categories/Create.vue";

export default {
    name: "SelectionView",
    components: {SelectionItem, ListCategories, CreateCategory},
    props: {
        title: String,
        id: Number
    },
    methods: {
        saveCategoryForItems(id) {
           console.log('asdasdfsa: ' + id)
        }
    }
}
</script>

<style scoped>

</style>
