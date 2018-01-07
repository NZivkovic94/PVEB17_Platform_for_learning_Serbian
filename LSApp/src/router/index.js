import Vue from 'vue'
import VueRouter from 'vue-router'
import MainPage from '@/components/MainPage'
import About from '@/components/About'
import SignUp from '@/components/SignUp'
import SignIn from '@/components/SignIn'
import Lesson from '@/components/Lesson'
import AdminDashboard from '@/components/AdminDashboard'


Vue.use(VueRouter)

const router = new VueRouter({
  routes: [
      {
          path: '/',
          name: 'MainPage',
          component: MainPage,
          meta: {
              forGuests: true,
              forUser: true,
          }

      },
      {
          path: '/about',
          name: 'About',
          component: About,
          meta: {
              forGuests: true,
              forUser: true
          }

      },
      {
          path: '/signup',
          name: 'Signup',
          component: SignUp,
          meta: {
              forGuests: true,
              forUser: false
          }
      },
      {
          path: '/signin',
          name: 'Signin',
          component: SignIn,
          meta: {
              forGuests: true,
              forUser: false
          }
      },
      {
          path: '/admindashboard',
          name: 'AdminDashboard',
          component: AdminDashboard,
          meta: {
              forGuests: false,
              forUser: false
          }
      },
      {
          path: '/lesson',
          name: 'Lesson',
          component: Lesson,
          meta: {
              forGuests: false,
              forUser: true
          }
      }
  ]
})

export default router
