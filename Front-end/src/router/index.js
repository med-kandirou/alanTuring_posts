import { createRouter, createWebHistory } from 'vue-router'
import index from '../views/guest/index.vue'
import login from '../views/guest/login.vue'
import inscrire from '../views/guest/inscrire.vue'
import posts from '../views/user/posts.vue'
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
  },
  {
    path: '/posts',
    name: 'posts',
    component: posts
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router