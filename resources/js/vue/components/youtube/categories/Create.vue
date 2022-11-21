<template>
    <div>
        <input type="text" class="me-3" v-model="title">
        <div class="btn btn-success" v-on:click="create">Create a category</div>
    </div>
</template>

<script>
export default {
    name: "Create",
    data() {
        return {
            title: ""
        }
    },
    methods: {
        create() {
            axios.post('/api/youtube/categories', {
                title: this.title,
            }).then(() => {
                this.$store.dispatch('categories/load')
            })
        }
    }
}
</script>

<style scoped>

</style>
