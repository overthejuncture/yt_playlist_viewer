import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
const path = require('path')

export default defineConfig({
    css: {
        preprocessorOptions: {
            scss: {
                additionalData: '@import "@/../../sass/_variables.scss";'
            }
        }
    },
    plugins: [
        vue(),
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/vue/index.js',
            ],
            refresh: true,
        }),
    ],
    resolve:{
        alias:{
            '@' : path.resolve(__dirname, './resources/js/vue')
        },
    },
    server: {
        hmr: {
            host: 'localhost',
        },
    }
});
