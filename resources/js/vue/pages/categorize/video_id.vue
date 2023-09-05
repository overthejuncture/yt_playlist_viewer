<template>
    <div class="flex gap-5">
        <CategorizeView v-if="video" :video="video"/>
        <div>
            <CreateCategory/>
            <ListCategories :categories="this.$store.state.categories.items" class="mb-2"
                            @allPicked="saveCategoryForItems"
                            v-if="this.video"
                            :picked="this.picked"
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
            video_id: null,
            picked: [],
            video: null
        }
    },
    async mounted() {
        this.video_id = this.$route.params.video_id;
        await this.loadVideo();
        this.picked = this.calcCategories();
    },
    methods: {
        saveCategoryForItems(categories) {
            this.$store.dispatch('categories/addToVideo', {
                videoId: this.video.id,
                categories: categories
            }).then(res => {
                this.loadVideo();
            });
        },
        async loadVideo() {
            return axios.get('/api/videos/' + this.video_id).then((res) => {
                this.video = res.data;
            });
        },
        calcCategories() {
            return this.video.categories.map(category => category.id);
        },
    }
}
</script>

<style scoped>

</style>
