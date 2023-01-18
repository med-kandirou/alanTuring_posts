import { createRouter, createWebHistory } from 'vue-router'
import index from '../views/guest/index.vue'
import login from '../views/guest/login.vue'
import inscrire from '../views/guest/inscrire.vue'
const routes = [
  {
    path: '/',
    name: 'home',
    component: index
  },
  {
    path: '/login',
    name: 'login',
    component: login
  },
  {
    path: '/inscrire',
    name: 'inscrire',
    component: inscrire
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router