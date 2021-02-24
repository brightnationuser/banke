import Vue from 'vue'
import VueRouter from 'vue-router'

import Specification from './pages/Specification'
import ThreeModels from "./pages/ThreeModels";
import Manuals from "./pages/Manuals";
import VideoGallery from "./pages/VideoGallery"
import Profile from "./pages/Profile";
import App from "../App";
import store from "./store/index"

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'App',
    component: App
  },
  {
    path: '/specification',
    name: 'Specification',
    component: Specification
  },
  {
    path: '/three-models',
    name: 'Three-models',
    component: ThreeModels
  },
  {
    path: '/manuals',
    name: 'Manuals',
    beforeEnter(to, from, next) {
      if (store.state.user.approved) {
        next()
      } else {
        next('/specification');
      }
    },
    component: Manuals
  },
  {
    path: '/video-gallery',
    name: 'Video-gallery',
    component: VideoGallery
  },
  {
    path: '/profile',
    name: 'Profile',
    component: Profile
  },
]

let base = icl_lang === 'en' ? '/account' : '/' + icl_lang + '/account'

const router = new VueRouter({
  mode: 'history',
  routes,
  base: base,
})

export default router
