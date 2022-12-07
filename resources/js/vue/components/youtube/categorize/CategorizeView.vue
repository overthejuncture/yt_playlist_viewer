<template>
    <div>
        <slot name="above"></slot>
        <div v-if="video" class="h1">
            <a :href="'https://www.youtube.com/watch?v=' + video.real_id">
                <div>
                    <img style="width: 100%" class="mb-2 image" :src="video.thumbnail" alt="">
                    <div>{{ video.title }}</div>
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
.image {
    max-width: 400px;
}
</style>
