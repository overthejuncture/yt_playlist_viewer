<template>
    <div>
        <CreateCategory/>
        <ListCategories class="mb-2" v-on:picked="saveCategoryForItems"/>
        <div class="h1">
            <a :href="'https://www.youtube.com/watch?v=' + src">
                <div>
                    <img style="width: 100%" class="mb-2 image" :src="this.thumbnail" alt="">
                    <div>{{ title }}</div>
                </div>
            </a>
        </div>
        <div class="btn btn-success" @click="nextSelected">Next</div>
    </div>
</template>

<script>
import SelectionItem from "@/components/youtube/watch-later/SelectionItem.vue";
import ListCategories from "@/components/youtube/categories/List.vue";
import CreateCategory from "@/components/youtube/categories/Create.vue";

export default {
    name: "SelectionView",
    components: {SelectionItem, ListCategories, CreateCategory},
    computed: {
        title() {
            return this.$store.state.watchLater.current.title
        },
        thumbnail() {
            return this.$store.state.watchLater.current.thumbnail
        },
        src() {
            return this.$store.state.watchLater.current.real_id
        },
    },
    methods: {
        saveCategoryForItems(categoryId) {
            this.$store.dispatch('categories/addToVideo', {
                videoId: this.$store.state.watchLater.current.id,
                categoryId: categoryId
            })
        },
        nextSelected() {
            this.$store.dispatch('watchLater/nextSelected')
        }
    }
}
</script>

<style scoped>
.image {
    max-width: 400px;
}
</style>
