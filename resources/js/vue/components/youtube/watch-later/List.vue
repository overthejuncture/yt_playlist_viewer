<template>
    <div>
        <label class="block">
            <span class="sr-only">Choose profile photo</span>
            <input type="file" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
            "/>
        </label>
        <div class="grid grid-cols-3 gap-4">
            <ListItem v-for="item in this.$store.state.watchLater.items" :item="item"/>
        </div>
    </div>
</template>

<script>
import CreateCategory from "@/components/youtube/categories/Create.vue";
import ListCategories from "@/components/youtube/categories/List.vue";
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
            axios.post('/api/youtube/watch-later/parse-html', formData)
                .then(res => {
                    this.items = res.data.items;
                });
        },
    },
    components: {CreateCategory, ListCategories, ListItem}
}
</script>

<style scoped>
</style>
