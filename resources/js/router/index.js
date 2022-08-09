import { createWebHistory, createRouter } from 'vue-router';
import AuthViewPage from '@/pages/views/auth-view/auth-view.vue';
import MainViewPage from '@/pages/views/main-view/main-view.vue';

import LoginPage from '@/pages/views/auth-view/login/login-page.vue';
import DashboardPage from '@/pages/views/main-view/dashboard/dashboard-page.vue';
import UserPage from '@/pages/views/main-view/user/user-page.vue';


const routes = [
    {
        path:'/',
        component: AuthViewPage,
        redirect: '/login',
        children: [
            {
                path:'/login',
                name:'login-page',
                component: LoginPage,
            }
        ],
        path: '/',
        component: MainViewPage,
        children: [
            {
                path:'/dashboard',
                name:'dashboard-page',
                component: DashboardPage,
                meta: { auth:true }
            },
            {
                path:'user',
                name:'user-page',
                component: UserPage,
                meta: { auth:true },
            },
        ]

    },
    
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router;