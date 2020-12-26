import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import SingIn from '../views/SingIn.vue'
import RoutingTable from "@/views/RoutsTable";
import Registration from "@/views/Registration";
import Profile from "@/views/Profile";
import Tickets from "@/views/BuyTickets";
import MyTickets from "@/views/MyTickets";

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    meta: {title: "Домашняя"}
  },
  {
    path: '/singin',
    name: 'SingIn',
    component: SingIn,
    meta: {title: "Вход"}
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile,
    meta: {title: "Профиль"}
  },
  {
    path: '/registration',
    name: 'Registration',
    component: Registration,
    meta: {title: "Регистрация"}
  },
  {
    path: '/routstable',
    name: 'RoutsTable',
    component: RoutingTable,
    meta: {title: "Маршруты"}
  },
  {
    path: '/buytickets',
    name: 'BuyTickets',
    component: Tickets,
    meta: {title: "Покупка билетов"}
  },
  {
    path: '/mytickets',
    name: 'MyTickets',
    component: MyTickets,
    meta: {title: "Мои билеты"}
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  document.title = to.meta.title
  next()
})

export default router
