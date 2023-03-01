<template>
    <div>
        <Create/>
        <div v-for="category in this.$store.state.categories.items">
            <Options :id="category.id" :title="category.title"/>
        </div>
    </div>
</template>

<script>
import Create from "@/components/youtube/categories/Create.vue";
import Options from "@/components/youtube/categories/Options.vue";

export default {
    name: "Categories",
    components: {Create, Options},
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
