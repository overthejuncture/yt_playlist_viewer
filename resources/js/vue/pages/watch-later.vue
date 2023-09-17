<template>
    <div>
        <label class="block">
            <input type="file" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
            "/>
        </label>
        <CategoriesList :categories="this.$store.state.categories.items"
                        :picked="pickedSearchCategories"
                        @allPicked="searchCategories"
        />
        <List/>
    </div>
</template>

<script>
import List from "@/components/youtube/watch-later/List.vue";
import CategoriesList from "@/components/youtube/categories/CategoriesList.vue";

export default {
    methods: {
        searchCategories(e) {
            // todo move to store? but it shouldn't be in global store
            this.pickedSearchCategories = e;
            axios.post('/api/categories/search', {
                categories: this.pickedSearchCategories
            }).then((res) => {
                this.$store.dispatch('videos/setItems', res.data);
            });
        }
    },
    data() {
        return {
            file: null,
            selectionMode: false,
            categories: null,
            newCategoryTitle: null,
            pickedSearchCategories: []
        }
    },
    mounted() {
        this.$store.dispatch('videos/getItems');
        this.$store.dispatch('categories/load');
    },
    components: {CategoriesList, List}
}
</script>

