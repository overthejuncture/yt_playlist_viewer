<template>
    <div class="flex gap-5">
        <!--       // @todo this is just a card, like the one used in the grid of all videos -->
        <CategorizeView style="min-width: 30%;" v-if="video" :video="video"/>
        <div>
            <CreateCategory/>
            <CategoriesList :categories="this.$store.state.categories.items" class="mb-2"
                            @allPicked="saveCategoryForItems"
                            v-if="this.video"
                            :picked="this.picked"
            />
            <div class="btn btn-primary bg-secondary w-fit p-4 rounded-md cursor-pointer"
                 @click="loadNextVideo"
            >
                NEXT
            </div>
        </div>
    </div>
</template>

<script>
import CategorizeView from "@/components/youtube/categorize/CategorizeView.vue";
import CategoriesList from "@/components/youtube/categories/CategoriesList.vue";
import CreateCategory from "@/components/youtube/categories/Create.vue";

export default {
    name: "video_id",
    components: {CategorizeView, CategoriesList, CreateCategory},
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
        loadNextVideo() {
            let request = this.$store.getters['videos/getRandomVideoWithoutCategories'];
            request.then(res => {
                this.video = res.data;
                this.video_id = this.video.id;
                this.picked = this.calcCategories();
            });
        },
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
