<script>
export default {
    data() {
        return {
            loading: false,
            file: null,
            items: []
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
    },
    mounted() {
        axios.get('/api/youtube/watch-later/get').then(res => {
            this.items = res.data;
        });
    }

}
</script>

<template>
    <input type="file"
           id="avatar" name="avatar"
           ref="upload-input"
           @change="uploadFile">

    <div class="btn btn-success" v-on:click="handler">Начать экспорт</div>
    <div v-if="loading">Loading...</div>
    <div v-for="item in items" class="card" style="width: 18rem;">
        <a class="p-3" :href="'https://www.youtube.com/watch?v=' + item.real_id">
            <div class="h3">{{item.title}}</div>
            <a class="my-2 border" :href="'https://www.youtube.com/' + item.author_id">{{item.author_title}}</a>
        </a>
    </div>
</template>
