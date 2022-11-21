<template>
    <div>
        <Create/>
        <div class="cat-container" v-for="category in this.$store.state.categories.items">
            {{ category.title }}
            <div class="cat-buttons">
                <div @click="edit" class="cat-button">Edit</div>
                <div @click="this.$store.dispatch('categories/delete', category.id)" class="cat-button">Delete</div>
            </div>
        </div>
    </div>
</template>

<script>
import Create from "@/components/youtube/categories/Create.vue";

export default {
    name: "Categories",
    components: {Create},
    data() {
        return {}
    },
    methods: {}
}
</script>

<style lang="scss" scoped>
.cat-container {
    width: fit-content;
    background-color: lightblue;
    display: inline-flex;
    align-content: center;
    align-items: center;
    margin-right: 1rem;
    height: 3rem;
    padding-left: 1rem;
    border-radius: 7px;
    overflow: hidden;
}

.cat-buttons {
    margin-left: 1rem;
    height: 100%;
    display: flex;
}

.cat-button {
    min-width: 3rem;
    width: fit-content;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    display: flex;
    background-color: pink;
    align-items: center;
    justify-content: center;

    &:hover {
        background-color: red;
    }
}

</style>
