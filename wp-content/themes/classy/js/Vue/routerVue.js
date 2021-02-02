import Vue from 'vue'
import VueRouter from 'vue-router'

import Specification from './pages/Specification'
import ThreeModels from "./pages/ThreeModels";
import Manuals from "./pages/Manuals";
import VideoGallery from "./pages/VideoGallery"
import App from "../App";

Vue.use(VueRouter)

const routes = [
  {
    path: '/account',
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
    component: Manuals
  },
  {
    path: '/video-gallery',
    name: 'Video-gallery',
    component: VideoGallery
  },
]

const router = new VueRouter({
  mode: 'history',
  routes,
  base: '/account'
})

export default router