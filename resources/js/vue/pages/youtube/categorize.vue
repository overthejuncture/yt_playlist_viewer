<template>
    <div>
        <CategorizeView v-if="video" :video="video">
            <template v-slot:above>
                <CreateCategory/>
                <ListCategories :categories="this.$store.state.categories.items"
                                v-on:picked="saveCategoryForItems"/>
            </template>
            <template v-slot:below>
                <div class="btn btn-success" @click="get">Next</div>
            </template>
        </CategorizeView>
    </div>
</template>

<script>
import CategorizeView from "@/components/youtube/categorize/CategorizeView.vue";
import ListCategories from "@/components/youtube/categories/List.vue";
import CreateCategory from "@/components/youtube/categories/Create.vue";

export default {
    name: "categorize",
    components: {CategorizeView, ListCategories, CreateCategory},
    data() {
        return {
            video: null
        }
    },
    mounted() {
        this.get();
    },
    methods: {
        get() {
            axios.get('/api/youtube/categorize/get').then((res) => {
                this.video = res.data;
            });
        },
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
