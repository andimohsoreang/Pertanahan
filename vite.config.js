import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    server: {
        host: '127.0.0.1',
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/highlight.min.css',
                'resources/css/easymde.min.css',
                'resources/css/fancybox.css',
                'resources/css/flatpickr.min.css',
                'resources/css/font-awesome.min.css',
                'resources/css/fullcalendar.min.css',
                'resources/css/highlight.min.css',
                'resources/css/markdown-editor.css',
                'resources/css/nice-select.css',
                'resources/css/nice-select2.css',
                'resources/css/nouislider.min.css',
                'resources/css/quill.snow.css',
                'resources/css/swiper-bundle.min.css',
                'resources/css/tippy.css',
            ],
            refresh: true,
        }),
    ],
});
