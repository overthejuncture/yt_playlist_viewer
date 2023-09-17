<template>
    <div class="mb-5">
        <div class="mb-1">Categories:</div>
        <div class="flex gap-4">
            <button
                :class="{'bg-highlight': pickedCat(category.id)}"
                v-for="category in this.categories"
                v-on:click="this.clicked(category)"
                class="min-w-[100px] bg-gray-700 text-white font-bold py-2 px-4 rounded"
            >
                {{ category.title }}
            </button>
        </div>
    </div>
</template>

<script>

export default {
    name: "CategoriesList",
    props: {
        categories: Array,
        picked: Array
    },
    methods: {
        clicked(category) {
            if (this.pickedCat(category.id)) {
                this.picked.splice(this.picked.indexOf(category.id), 1)
            } else {
                this.picked.push(category.id)
            }
            this.$emit('picked', category.id);
            this.$emit('allPicked', this.picked);
        },
        pickedCat(id) {
            return this.picked.indexOf(id) !== -1;
        }
    }
}
</script>

<style scoped>
</style>
