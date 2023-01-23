<template>
    <div class="cat-container">
        {{ title }}
        <div class="cat-buttons">
            <router-link
                style="text-decoration: none; color: inherit;"
                :to="'/youtube/categories/' + id" class="cat-button"
            >
                <div @click="edit">Edit</div>
            </router-link>
            <div @click="this.$store.dispatch('categories/delete', id)" class="cat-button">Delete</div>
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
