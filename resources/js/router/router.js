

import Vue from 'vue' // import vue menandakan aplikasi dengan memakai vue
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import HomeComponent from '../components/Home.vue';
import ViewBiodata from '../views/biodata/view.vue';
import CreateComponent from '../views/biodata/Input.vue';
import EditComponent from '../views/biodata/Edit.vue';

//DEFINE ROUTE
const router_Exd = new VueRouter({
    mode: 'history',
    routes: [
        {
            name: 'home',
            path: '/',
            component: HomeComponent
        },
        {
            name: 'biodata',
            path:  '/biodata',
            component: ViewBiodata
        },
        {
            name: 'addBiodata', // name diambil dari router link
            path: '/create',  //adalah path URl
            component: CreateComponent
        },
        {
            name: 'edit',
            path: '/edit/:id',
            component: EditComponent
        }
    ]
});

// const routes_spa = [
//     {
//         name: 'biodata',
//         path: '/',
//         component: IndexComponent
//     },
//     {
//         name: 'addBiodata', // name diambil dari router link
//         path: '/create',  //adalah path URl
//         component: CreateComponent
//     },
//     {
//         name: 'edit',
//         path: '/edit/:id',
//         component: EditComponent
//     }
// ];

// const router_Exd = new VueRouter({
//     mode: 'history',
//     routes: routes_spa
// });



export default router_Exd
