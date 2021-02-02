import Vue from 'vue'
import VueRouter from 'vue-router'

import Specification from './pages/Specification'


Vue.use(VueRouter)

const routes = [
  {
    path: '/',
  },
  {
    path: '/specification',
    name: 'Specification',
    component: Specification
  },
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router