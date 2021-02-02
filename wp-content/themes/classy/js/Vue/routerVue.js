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
    path: '/account/specification',
    name: '/account/specification',
    component: Specification
  },
  {
    path: '/account/three-models',
    name: '/account/three-models',
    component: ThreeModels
  },
  {
    path: '/account/manuals',
    name: '/account/manuals',
    component: Manuals
  },
  {
    path: '/account/video-gallery',
    name: '/account/video-gallery',
    component: VideoGallery
  },
]

const router = new VueRouter({
  mode: 'history',
  routes,
})

export default router