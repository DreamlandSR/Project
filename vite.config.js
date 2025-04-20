import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import inject from '@rollup/plugin-inject'; // ✅ tambahkan ini

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        inject({
            $: 'jquery',         // ✅ expose jQuery sebagai $
            jQuery: 'jquery',    // ✅ expose jQuery sebagai jQuery
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources/js'),
        },
    },

    server: {
        host: '127.0.0.1',
        port: 5174, // Ganti port ini agar tidak bentrok
    },
});
