<template>
    <div class="my-3 btn btn-warning"
         v-on:click="pickingMode = !pickingMode">Switch mode
    </div>

    <div v-if="pickingMode">
        <SelectionView :id="currentItem.id" :title="currentItem.title"/>
    </div>

    <div v-else>
        <input type="file"
               id="avatar" name="avatar"
               ref="upload-input"
               @change="uploadFile">

        <div v-if="loading">Loading...</div>
        <CreateCategory/>
        <ListCategories/>
        <div v-for="item in items" class="card" style="width: 18rem;">
            <a class="p-3" :href="'https://www.youtube.com/watch?v=' + item.real_id">
                <img :src="item.thumbnail">
                <div class="h4">{{ item.title }}</div>
                <a class="my-2 border" :href="'https://www.youtube.com' + item.author_id">{{ item.author_title }}</a>
            </a>
        </div>
    </div>
</template>

<script>
import SelectionView from "@/components/youtube/watch-later/SelectionView.vue";
import CreateCategory from "@/components/youtube/categories/Create.vue";
import ListCategories from "@/components/youtube/categories/List.vue";

export default {
    data() {
        return {
            loading: false,
            file: null,
            items: [],
            pickingMode: false,
            currentItem: null,
            categories: null,
            newCategoryTitle: null
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
        getItems() {
            axios.get('/api/youtube/watch-later/get').then(res => {
                this.items = res.data;
                this.currentItem = this.items[Math.floor(Math.random() * this.items.length)]
            });
        }
    },
    mounted() {
        this.getItems();
    },
    components: {SelectionView, CreateCategory, ListCategories}
}
</script>

