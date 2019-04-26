import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import Home from '../components/home/Home';
import Services from '../components/service/Services';
import Service from '../components/service/SingleService';
import HomeInternet from '../components/pricing/HomeInternet';
import Corporate from '../components/pricing/Corporate';
import Coverage from '../components/pages/Coverage';
import Billing from '../components/pages/Billing';
import Support from '../components/pages/Support';
import About from '../components/pages/About';
import Contact from '../components/pages/Contact';

const routes = [
    { path: '/', component: Home },
    { path: '/services', component: Services },
    { path: '/service/:serviceId', component: Service },
    { path: '/coverage', component: Coverage },
    { path: '/home-internet', component: HomeInternet },
    { path: '/corporate', component: Corporate },
    { path: '/billing', component: Billing },
    { path: '/support', component: Support },
    { path: '/about-us', component: About },
    { path: '/contact-us', component: Contact },

]

const router = new VueRouter({
    mode: 'history',
    routes // short for `routes: routes`
})

export default router

