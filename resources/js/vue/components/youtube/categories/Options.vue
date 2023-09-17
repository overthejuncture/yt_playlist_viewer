<template>
    <div class="text-gray-600 hover:text-gray-900 cat-container flex bg-slate-100 items-center rounded-md h-12 overflow-hidden font-semibold w-fit">
        <div class="px-3 cursor-default">
            {{ title }}
        </div>
        <router-link
            style="text-decoration: none; color: inherit;"
            :to="'/categories/' + id"
            class="h-full align-items-center flex items-center transition-colors duration-300 px-3 bg-blue-300 hover:bg-blue-500"
        >
            Edit
        </router-link>
        <div @click="this.$store.dispatch('categories/delete', id)"
             class="cat-button bg-red-300 hover:bg-red-500 transition-colors duration-300 h-full flex items-center px-3 cursor-pointer"
        >
            Delete
        </div>
    </div>
</template>

<script>

export default {
    name: "List",
    props: ['id', 'title'],
    data() {
        return {}
    },
}
</script>

<style lang="scss" scoped>

</style>
