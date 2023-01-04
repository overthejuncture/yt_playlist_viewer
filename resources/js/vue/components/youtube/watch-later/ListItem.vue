<template>
    <div class="col mb-3">
        <router-link style="text-decoration: none; color: inherit;" :to="'/youtube/categorize/' + item.id">
            <div class="card">
                <div class="p-3">
                    <img style="width: 100%" class="mb-2" :src="item.thumbnail" alt="">
                    <div class="h4 mb-2">{{ item.title }}</div>
                    <div>{{ item.author_title }}</div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
export default {
    name: "ListItem",
    props: ['item']
}
</script>

<style scoped>

</style>
