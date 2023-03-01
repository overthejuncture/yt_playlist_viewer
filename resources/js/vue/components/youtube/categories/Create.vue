<template>
    <div class="mb-5 flex items-center">
        <label class="block text-gray-500 font-bold text-right mb-1 mb-0 pr-4" for="category">
            Create category
        </label>
        <div class="grow max-w-lg">
            <input v-model="title"
                   class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                   id="category" type="text" placeholder="Category title">
        </div>
        <button v-on:click="create"
                class="ml-5 bg-secondary hover:bg-highlight text-white font-bold py-2 px-4 rounded">
            Create a category
        </button>
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
            axios.post('/api/categories', {
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
