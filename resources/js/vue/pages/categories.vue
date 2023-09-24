<template>
    <div class="container mx-auto">
        <Create/>
        <div class="flex flex-row flex-wrap gap-3">
            <Options v-for="category in this.$store.state.categories.items" :id="category.id" :title="category.title"/>
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

</style>
