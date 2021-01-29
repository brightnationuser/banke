import Vue from 'vue'
import VueRouter from 'vue-router'

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
        component: () => import('./components/Forms'),
      }
    ]
  },
]

const router = new VueRouter({
  mode: '',
  routes
})

export default router