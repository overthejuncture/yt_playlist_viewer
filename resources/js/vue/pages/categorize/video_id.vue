<template>
    <div class="flex gap-5">
        <CategorizeView v-if="video" :video="video"/>
        <div>
            <CreateCategory/>
            <ListCategories :categories="this.$store.state.categories.items" class="mb-2"
                            v-on:allPicked="saveCategoryForItems"
                            v-if="this.video"
                            :picked="this.calcCategories(this.video)"
            />
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
        this.loadVideo();
    },
    methods: {
        saveCategoryForItems(categories) {
            this.$store.dispatch('categories/addToVideo', {
                videoId: this.video.id,
                categories: categories
            });
            this.loadVideo();
        },
        loadVideo() {
            axios.get('/api/categorize/' + this.$route.params.video_id).then((res) => {
                this.video = res.data;
            });
        },
        calcCategories(video) {
            return video.categories.map(category => category.id);
        },
    }
}
</script>

<style scoped>

</style>
