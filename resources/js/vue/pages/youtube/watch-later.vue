<template>
    <div>
        <label class="block">
            <input type="file" class="block w-full text-sm text-slate-500
                file:mr-4 file:py-2 file:px-4
                file:rounded-full file:border-0
                file:text-sm file:font-semibold
                file:bg-violet-50 file:text-violet-700
                hover:file:bg-violet-100
            "/>
        </label>
        <List/>
    </div>
</template>

<script>
import List from "@/components/youtube/watch-later/List.vue";

export default {
    data() {
        return {
            file: null,
            selectionMode: false,
            categories: null,
            newCategoryTitle: null
        }
    },
    mounted() {
        this.$store.dispatch('videos/getItems');
        this.$store.dispatch('categories/load');
    },
    components: {List}
}
</script>

