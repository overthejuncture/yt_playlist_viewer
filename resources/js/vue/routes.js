import WatchLater from "@/pages/youtube/watch-later.vue";
import ExportPlaylists from "@/pages/youtube/export-playlists.vue";
import Categories from "@/pages/youtube/categories.vue";
import Categorize from "@/pages/youtube/categorize.vue";

export default [
    {path: '/youtube/watch-later', component: WatchLater},
    {path: '/youtube/export-playlists', component: ExportPlaylists},
    {path: '/youtube/categorize', component: Categorize},
    {path: '/youtube/categories', component: Categories},
]
