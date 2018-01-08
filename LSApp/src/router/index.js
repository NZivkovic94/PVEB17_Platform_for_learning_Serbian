import Vue from 'vue'
import VueRouter from 'vue-router'
import MainPage from '@/components/MainPage'
import About from '@/components/About'
import SignUp from '@/components/SignUp'
import SignIn from '@/components/SignIn'
import Lesson from '@/components/Lesson'
import AdminDashboard from '@/components/AdminDashboard'
import ProfessorMainPage from '@/components/ProfessorMainPage'
import StudentMainPage from '@/components/StudentMainPage'


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
              forProfessor: true,
              forStudent: true,
          }

      },
      {
          path: '/about',
          name: 'About',
          component: About,
          meta: {
              forGuests: true,
              forUser: true,
              forProfessor: true,
              forStudent: true,
          }

      },
      {
          path: '/signup',
          name: 'Signup',
          component: SignUp,
          meta: {
              forGuests: true,
              forUser: false,
              forProfessor: false,
              forStudent: false,
          }
      },
      {
          path: '/signin',
          name: 'Signin',
          component: SignIn,
          meta: {
              forGuests: true,
              forUser: false,
              forProfessor: false,
              forStudent: false,
          }
      },
      {
          path: '/professormainpage',
          name: 'ProfessorMainPage',
          component: ProfessorMainPage,
          meta: {
              forGuests: false,
              forUser: false,
              forProfessor: true,
              forStudent: false,
          }
      },
      {
          path: '/studentmainpage',
          name: 'StudentMainPage',
          component: StudentMainPage,
          meta: {
              forGuests: false,
              forUser: false,
              forProfessor: false,
              forStudent: true,
          }
      },
      {
          path: '/admindashboard',
          name: 'AdminDashboard',
          component: AdminDashboard,
          meta: {
              forGuests: false,
              forUser: false,
              forProfessor: false,
              forStudent: false,
          }
      },
      {
          path: '/lesson',
          name: 'Lesson',
          component: Lesson,
          meta: {
              forGuests: false,
              forUser: true,
              forProfessor: true,
              forStudent: true,
          }
      }
  ]
})

export default router
