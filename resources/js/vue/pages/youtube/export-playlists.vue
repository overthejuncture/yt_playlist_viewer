<script>
export default {
    data() {
        return {
            loading: false,
            items: []
        }
    },
    methods: {
        handler() {
            this.loading = true
            axios.post('/api/export-playlists')
                .then(res => {
                        this.items = res.data.items;
                        this.loading = false;
                    }
                );
        },
        getThumbnail(data) {
            if ('high' in data) {
                return data.high.url;
            }
        },
    },
    mounted() {
        axios.get('/api/playlists').then(res => {
            this.items = res.data.items;
        });
    }

}
</script>

<template>
    <div class="btn btn-success" v-on:click="handler">Начать экспорт</div>
    <div v-if="loading">Loading...</div>
    <div v-for="item in items" class="card" style="width: 18rem;">
        <img :src="this.getThumbnail(JSON.parse(item.thumbnails))" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ item.title }}</h5>
            <p class="card-text">{{ item.description }}</p>
            <a :href="'https://www.youtube.com/playlist?list=' + item.youtube_id" class="btn btn-primary">Link</a>
        </div>
    </div>
</template>
