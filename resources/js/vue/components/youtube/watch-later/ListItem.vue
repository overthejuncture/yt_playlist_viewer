<template>
    <div class="card">
        <a class="p-3" :href="'https://www.youtube.com/watch?v=' + item.real_id">
            <img :src="item.thumbnail">
            <div class="h4">{{ item.title }}</div>
            <a class="my-2 border" :href="'https://www.youtube.com' + item.author_id">{{ item.author_title }}</a>
        </a>
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
