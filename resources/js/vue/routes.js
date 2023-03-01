import WatchLater from "@/pages/watch-later.vue";
import ExportPlaylists from "@/pages/export-playlists.vue";
import Categories from "@/pages/categories.vue";
import Categorize from "@/pages/categorize.vue";
import CategorizeVideoId from "@/pages/categorize/video_id.vue";
import CategoriesCategoryId from "@/pages/categories/category_id.vue";

export default [
    {path: '/watch-later', component: WatchLater},
    {path: '/export-playlists', component: ExportPlaylists},
    {path: '/categorize', component: Categorize},
    {path: '/categorize/:video_id', component: CategorizeVideoId},
    {path: '/categories', component: Categories},
    {path: '/categories/:category_id', component: CategoriesCategoryId},
]
