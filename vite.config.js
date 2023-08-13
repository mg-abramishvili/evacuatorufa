import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import vue from '@vitejs/plugin-vue'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/front.css',
                'resources/js/front.js',
                'resources/css/admin.css',
                'resources/js/admin.js'
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    includeAbsolute: false
                }
            }
        }),
    ],
});
