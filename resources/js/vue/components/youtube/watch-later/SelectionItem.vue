<template>
<div>
    <div class="h1">
        <img style="width: 100%" class="mb-2" :src="this.thumbnail" alt="">
        {{title}}
    </div>
</div>
</template>

<script>
export default {
    name: "SelectionItem",
    props: {
        title: String,
        thumbnail: String
    },
    data() {
        return {
        };
    }
}
</script>

<style scoped>

</style>
