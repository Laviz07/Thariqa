import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    base: "https://010f-180-252-114-68.ngrok-free.app ",
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                // "resources/css/filament/admin/theme.css",
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: true,
        hmr: {
            // host: "127.0.0.1",
            host: "https://010f-180-252-114-68.ngrok-free.app ",
        },
    },
});
