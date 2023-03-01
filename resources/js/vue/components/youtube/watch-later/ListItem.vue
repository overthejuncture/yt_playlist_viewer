<template>
    <div class="border-4 bg-secondary border-secondary rounded-[0.7rem]">
        <router-link class="block h-full" style="text-decoration: none; color: inherit;" :to="'/categorize/' + item.id">
            <img class="rounded-lg aspect-[16/9] object-cover w-full" :src="item.thumbnail" alt="">
            <div class="p-5 grid grid-row-2">
                <div class="mb-5 grow">{{ item.title }}</div>
                <div class="flex-none">{{ item.author_title }}</div>
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
