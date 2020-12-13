import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import SingIn from '../views/SingIn.vue'
import RoutingTable from "@/views/RoutsTable";
import Registration from "@/views/Registration";
import Profile from "@/views/Profile";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/singin',
    name: 'SingIn',
    component: SingIn
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile
  },
  {
    path: '/registration',
    name: 'Registration',
    component: Registration
  },
  {
    path: '/routstable',
    name: 'RoutsTable',
    component: RoutingTable,
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
