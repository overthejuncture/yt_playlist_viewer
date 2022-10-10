<script>
export default {
    data() {
        return {
            text: 'vue page',
            loading: false
        }
    },
    methods: {
        handler() {
            this.loading = true
            axios.get('/api/youtube/export-playlists')
                .then();
        }
    }
}
</script>

<template>
    <div class="btn btn-success" v-on:click="handler">Начать экспорт</div>
    <div v-if="loading">Loading...</div>
</template>
