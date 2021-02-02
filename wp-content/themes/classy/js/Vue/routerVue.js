import Vue from 'vue'
import VueRouter from 'vue-router'

import Forms from './components/Forms/Forms'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    component: {
      template: "<router-view></router-view>"
    },
    children: [
      {
        path: '/profile/test',
        name: 'test',
        component: () => Forms,
      }
    ]
  },
]

const router = new VueRouter({
  routes
})

export default router