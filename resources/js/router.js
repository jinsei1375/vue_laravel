import { createRouter, createWebHistory } from 'vue-router';
import Home from './Pages/Home.vue';
import About from './Pages/About.vue';
import NotFound from './NotFound.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/:pathMatch(.*)*', component: NotFound }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;

// Inertia.jsを使用する場合は、vue-routerは不要