<template>
    <div class="col mb-3">
        <div class="card">
            <a class="p-3" :href="'https://www.youtube.com/watch?v=' + item.real_id">
                <img style="width: 100%" class="mb-2" :src="item.thumbnail" alt="">
                <div class="h4 mb-2">{{ item.title }}</div>
                <a :href="'https://www.youtube.com' + item.author_id">{{ item.author_title }}</a>
            </a>
        </div>
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
