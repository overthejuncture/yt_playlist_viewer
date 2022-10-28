<script>
import Item from "./../../components/youtube/watch-later/Item.vue"

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
        handler() {
            this.loading = true
            axios.post('/api/youtube/watch-later')
                .then(res => {
                        this.items = res.data.items;
                        this.loading = false;
                    }
                );
        },
        uploadFile() {
            const formData = new FormData();
            formData.append('html', this.$refs["upload-input"].files[0]);
            axios.post('/api/youtube/watch-later/parse-html', formData)
                .then(res => {
                    this.items = res.data.items;
                });
        },
        createCategory() {
            axios.post('/api/youtube/categories/create', {
                title: this.newCategoryTitle,
                video_id: this.currentItem.id
            }).then(() => {
                this.getCategories()
            })
        },
        getCategories() {
            axios.get('/api/youtube/categories').then(res => {
                this.categories = res.data;
            });
        },
        setCategory(id) {
            axios.post('/api/youtube/categories/set', {
                category_id: id,
                video_id: this.currentItem.id
            })
        },
    },
    mounted() {
        axios.get('/api/youtube/watch-later/get').then(res => {
            this.items = res.data;
            this.currentItem = this.items[Math.floor(Math.random() * this.items.length)]
        });
        this.getCategories()
    },
    components: {Item}
}
</script>

<template>
    <div class="my-3">
        <div class="btn btn-warning" v-on:click="pickingMode = !pickingMode">Switch mode</div>
    </div>
    <div>
        <input type="text" class="me-3" v-model="newCategoryTitle">
        <div class="btn btn-success" v-on:click="createCategory">Create a category</div>
    </div>
    <div class="mw-100">Categories:</div>
    <div class="btn btn-warning" v-for="category in categories"
        v-on:click="setCategory(category.id)">
        {{ category.title }}
    </div>
    <div v-if="pickingMode">
        <div class="border p-3">
            <Item :title="currentItem.title"/>
        </div>
    </div>


    <div v-else>
        <input type="file"
               id="avatar" name="avatar"
               ref="upload-input"
               @change="uploadFile">

<!--        <div class="btn btn-success" v-on:click="handler">Начать экспорт</div>-->
        <div v-if="loading">Loading...</div>
        <div v-for="item in items" class="card" style="width: 18rem;">
            <a class="p-3" :href="'https://www.youtube.com/watch?v=' + item.real_id">
                <div class="h3">{{ item.title }}</div>
                <a class="my-2 border" :href="'https://www.youtube.com/' + item.author_id">{{ item.author_title }}</a>
            </a>
        </div>
    </div>
</template>
