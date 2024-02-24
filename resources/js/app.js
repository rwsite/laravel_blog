//default
import './bootstrap';
import '../css/app.css';

// my template
import '../css/blog.css';
// import '../sass/main.sass'

import.meta.glob([
    '../images/**',
    '../fonts/**',
]);

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
// @see https://laravel.com/docs/10.x/vite#working-with-stylesheets
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
