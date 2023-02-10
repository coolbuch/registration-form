import Vue from 'vue'
import VueRouter from 'vue-router'
import RegistrationForm from "@/components/RegistrationForm"
import RecordsView from "@/components/RecordsView"
Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'home',
    component: RegistrationForm,
  },
  {
    path: '/records',
    name: 'records',
    component: RecordsView,
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
