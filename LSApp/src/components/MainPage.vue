<template>
  <div class="MainPage">
    <h1>{{mainTitle}}</h1>
    <router-link to='/signin'>Sign in </router-link>
    <br>
    <router-link to='/about'> About </router-link>
  </div>
</template>

<script>
  export default {
    name: 'MainPage',
    data () {
      return {
        mainTitle: "Welcome to page for learning serbian as a foreign language"
      }
    }
  }
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
  font-weight: normal;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>