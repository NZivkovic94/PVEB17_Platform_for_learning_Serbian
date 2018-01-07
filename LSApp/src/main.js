// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import Router from './router/index.js'

//import our custom auth package
import Auth from './packages/auth/Auth'
//VueResource for http requests
import VueResource from 'vue-resource'


//we must first import all packages and then define which ones we use ( in that order !!!)

Vue.use(VueResource)
Vue.use(Auth)

Vue.config.productionTip = false


Vue.prototype.$bus = new Vue();

/*
-this method is called every time we want to go to some route
first it checks if we are authenticated and then if we are checks do users can go to that route
and if they cant it redirect them to /lessons
-if we are not authenticated it checks can guest go to that route if they cant they get redirected to
./signin
*/

Router.beforeEach(
    (to, from, next) => {
      if(Vue.auth.isAuthenticated()) {
        if(!to.matched.some(record => record.meta.forUser)) {
          next({
              path: '/lesson'
          })
        }
        else
          next()
      }
      else if(!Vue.auth.isAuthenticated()) {
          if(!to.matched.some(record => record.meta.forGuests)) {
              next({
                  path: '/signin'
              })
          }
          else
              next()
      }
      else
        next()
    }
)

Vue.http.headers.common['Authorization'] = 'Bearer ' + Vue.auth.getToken();

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router: Router,
  template: '<App/>',
  components: { App }
})
