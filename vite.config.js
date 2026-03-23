import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/base.css',
                'resources/css/welcome.css',
                'resources/css/about.css',
                'resources/css/higher-education.css',
                'resources/css/erasmus.css',
                'resources/css/teens.css',
                'resources/css/corporate.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
    },
});
