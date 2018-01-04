// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'

//import our custom auth package
import Auth from './packages/auth/Auth'
//VueResource for http requests
import VueResource from 'vue-resource'

//we must first import all packages and then define which ones we use ( in that order !!!)

Vue.use(VueResource)
Vue.use(Auth)

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App }
})
