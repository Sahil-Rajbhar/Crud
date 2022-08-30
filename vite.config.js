import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import swal from 'sweetalert';
import { $, jquery } from 'jquery';
import datatable from 'datatables.net'

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/scss/custom.scss',
            ],
            refresh: true,
        }),
    ],
});
