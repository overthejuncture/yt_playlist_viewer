<template>
    <div>
        <div class="mw-100">Categories:</div>
        <div class="btn btn-warning m-1"
             :class="{'border border-4': pickedCat(category.id)}"
             v-for="category in this.$store.state.categories.items"
             v-on:click="this.clicked(category)"
        >
            {{ category.title }}
        </div>
    </div>
</template>

<script>

export default {
    name: "List",
    data() {
        return {
            picked: []
        }
    },
    methods: {
        clicked(category) {
            if (this.pickedCat(category.id)) {
                this.picked.splice(this.picked.indexOf(category.id), 1)
            } else {
                this.picked.push(category.id)
            }
            this.$emit('picked', category.id);
            this.$emit('pickedAll', this.picked);
        },
        pickedCat(id) {
            return this.picked.indexOf(id) !== -1;
        }
    }
}
</script>

<style scoped>
</style>
