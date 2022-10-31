<template>
    <div>
        <input type="file"
               id="avatar" name="avatar"
               ref="upload-input"
               @change="uploadFile">

        <CreateCategory/>
        <ListCategories/>

        <ListItem v-for="item in this.$store.state.watchLater.items" :item="item"/>
    </div>
</template>

<script>
import CreateCategory from "@/components/youtube/categories/Create.vue";
import ListCategories from "@/components/youtube/categories/List.vue";
import ListItem from "@/components/youtube/watch-later/ListItem.vue";

export default {
    name: "List",
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
