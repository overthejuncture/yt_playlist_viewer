<template>
    <div>
        <slot name="above"></slot>
        <div v-if="video" class="max-w-md border-4 bg-gray-700 border-gray-700 rounded-[0.7rem]">
            <a :href="'https://www.youtube.com/watch?v=' + video.real_id">
                <img class="max-w-md rounded-lg aspect-[16/9] object-cover w-full" :src="video.thumbnail" alt="">
                <div class="p-5 grid grid-row-2">
                    <div class="mb-5 grow">{{ video.title }}</div>
                    <div class="flex-none">{{ video.author_title }}</div>
                </div>
            </a>
        </div>
        <slot name="below"></slot>
    </div>
</template>

<script>
export default {
    name: "CategorizeView",
    props: {
        video: Object
    }
}
</script>

<style scoped>
</style>
