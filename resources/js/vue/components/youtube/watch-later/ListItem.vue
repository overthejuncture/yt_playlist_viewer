<template>
    <div class="card col">
        <a class="p-3" :href="'https://www.youtube.com/watch?v=' + item.real_id">
            <img style="width: 100%" :src="item.thumbnail" alt="">
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
