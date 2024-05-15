import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

//server: { host: '127.0.0.1' },
export default defineConfig({
    plugins: [
        laravel({
            input: [
                //App styles
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/default.js',
                //Admin styles
                'resources/js/admin.js',
                'resources/js/admin-additional.js',
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
