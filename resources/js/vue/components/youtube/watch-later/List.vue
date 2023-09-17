<template>
    <div>
        <div class="grid grid-cols-3 gap-4">
            <ListItem v-for="item in this.$store.state.videos.items" :item="item"/>
        </div>
    </div>
</template>

<script>
import CreateCategory from "@/components/youtube/categories/Create.vue";
import CategoriesList from "@/components/youtube/categories/CategoriesList.vue";
import ListItem from "@/components/youtube/watch-later/ListItem.vue";

export default {
    name: "List",
    data() {
        return {
            filters: {}
        }
    },
    methods: {
        uploadFile() {
            const formData = new FormData();
            formData.append('html', this.$refs["upload-input"].files[0]);
            axios.post('/api/watch-later/parse-html', formData)
                .then(res => {
                    this.items = res.data.items;
                });
        },
    },
    components: {CreateCategory, CategoriesList, ListItem}
}
</script>

<style scoped>
</style>
