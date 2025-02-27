import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/timer.js',
                'resources/js/menu.js',
                'resources/js/cube.js',
                'resources/scss/app.scss',
            ],
            refresh: true,
        }),
    ],
});
