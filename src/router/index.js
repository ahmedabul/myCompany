import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '../views/HomeView.vue';
import createCompany from '../views/createCompany.vue';
import employeeCreate from '../views/employee/employeeCreate';
import employeeShow from '../views/employee/employeeShow';
import employeeRead from '../views/employee/employeeRead';

const routes = [{
        path: '/',
        name: 'home',
        component: HomeView
    },
    {
        path: '/about',
        name: 'about',
        // route level code-splitting
        // this generates a separate chunk (about.[hash].js) for this route
        // which is lazy-loaded when the route is visited.
        component: () =>
            import ( /* webpackChunkName: "about" */ '../views/AboutView.vue')
    },
    {
        path: '/createCompany',
        name: 'createCompany',
        component: createCompany
    },
    {
        path: '/employee/employeeCreate/:id',
        name: 'employee.employeeCreate',
        component: employeeCreate
    },
    {
        path: '/employee/employeeShow/:companyId',
        name: 'employee.employeeShow',
        component: employeeShow,
    },
    {
        path: '/employee/employeeRead/:employeeId',
        name: 'employee.employeeUpdate',
        component: employeeRead,
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router