<template>
    <div class="flex gap-5">
        <CategorizeView v-if="video" :video="video">
        </CategorizeView>
        <div>
            <CreateCategory/>
            <ListCategories :categories="this.$store.state.categories.items" class="mb-2"
                            v-on:picked="saveCategoryForItems"/>
        </div>
    </div>
</template>

<script>
import CategorizeView from "@/components/youtube/categorize/CategorizeView.vue";
import ListCategories from "@/components/youtube/categories/List.vue";
import CreateCategory from "@/components/youtube/categories/Create.vue";

export default {
    name: "video_id",
    components: {CategorizeView, ListCategories, CreateCategory},
    data() {
        return {
            video: null
        }
    },
    mounted() {
        axios.get('/api/youtube/categorize/' + this.$route.params.video_id).then((res) => {
            this.video = res.data;
        });
    },
    methods: {
        saveCategoryForItems(categoryId) {
            this.$store.dispatch('categories/addToVideo', {
                videoId: this.video.id,
                categoryId: categoryId
            })
        },
    }
}
</script>

<style scoped>

</style>
