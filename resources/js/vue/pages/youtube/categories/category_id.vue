<template>
    <div>
        <h1>{{this.category.title}}</h1>
        <div v-for="subcat in this.category.subcategories">
            <Options :id="subcat.id" :title="subcat.title"/>
        </div>
        <input type="text" class="me-3" v-model="newSubcategoryTitle">
        <div @click="addSubcategory" class="btn btn-success">Add subcategory</div>
    </div>
</template>

<script>
import Options from "@/components/youtube/categories/Options.vue";

export default {
    name: "category_id",
    components: {Options},
    data() {
        return {
            category: {},
            newSubcategoryTitle: ''
        }
    },
    async mounted() {
        await this.getSubcategories();
    },
    methods: {
        getSubcategories() {
            axios.get('/api/youtube/categories/' + this.$route.params.category_id)
                .then(res => {
                    this.category = res.data;
                });
        },
        addSubcategory() {
            axios.post('/api/youtube/categories/' + this.category.id + '/addSubcategory', {
                parentId: this.category.id,
                title: this.newSubcategoryTitle
            }).then(res => {
                this.getSubcategories();
                this.newSubcategoryTitle = '';
            });
        },
    }
}
</script>

<style scoped>

</style>
