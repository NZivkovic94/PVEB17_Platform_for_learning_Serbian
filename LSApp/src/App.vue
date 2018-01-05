<template>
  <div id="app">
    <header class="app-header">
      <app-nav></app-nav>
    </header>
    <main class="container">
      <router-view></router-view>
    </main>
    
    <!--
    <footer class="footer">
       <app-footer></app-footer>
    </footer>
  -->

  </div>
</template>

<script>
import AppNav from './components/AppNav'
import AppFooter from './components/AppFooter'
export default {
  name: 'app' ,
  components: { AppNav , AppFooter }
}
</script>

<style type="text/css">

#app {
  height: 100%;
}

</style>
