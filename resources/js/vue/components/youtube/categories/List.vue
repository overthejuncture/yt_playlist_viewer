<template>
    <div>
        <div class="mw-100">Categories:</div>
        <div class="btn btn-warning m-1" v-for="category in this.$store.state.categories.items"
             v-on:click="this.$emit('picked', category.id)">
            {{ category.title }}
        </div>
    </div>
</template>

<script>

export default {
    name: "List"
}
</script>

<style scoped>
</style>
