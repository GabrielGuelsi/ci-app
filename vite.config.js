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
                'resources/css/new-shared.css',
                'resources/css/study-in-ireland.css',
                'resources/css/higher-education.css',
                'resources/css/career-bridge.css',
                'resources/css/for-employers.css',
                'resources/css/why-ci-ireland.css',
                'resources/css/start-your-plan.css',
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
