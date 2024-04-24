import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                //App styles
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/default.js',
                //Admin styles
                'resources/sass/admin-page-content.scss',
                'resources/js/admin-page-content.js',

                'resources/css/mishka-mebel.css',
                'resources/css/normalize.css'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
        },
    },
});
