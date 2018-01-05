<template>
  <div class="MainPage">
    <div class="jumbotron my-4">
        <h1 class="display-3">{{mainTitle}}</h1>
        <p class="lead">Welcome to the page for learning Serbian as a foreign language. This page was created
        by Dusica, Aleksandar , Djordje, Nikola and Nikola and its going to be the best page eva </p>
        <router-link to="/signin" tag="button" class="btn btn-primary btn-lg">Sign in!</router-link>
      </div>

      <!-- Page Features -->
      <div class="row text-center">

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">Easy to learn</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
             <router-link to="/signup" tag="button" class="btn btn-primary btn-lg">Get Started!</router-link>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">Literature</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
            </div>
            <div class="card-footer">
              <router-link to="/signup" tag="button" class="btn btn-primary btn-lg">Get Started!</router-link>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">Great teachers</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
            </div>
            <div class="card-footer">
              <router-link to="/signup" tag="button" class="btn btn-primary btn-lg">Get Started!</router-link>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
            <img class="card-img-top" src="http://placehold.it/500x325" alt="">
            <div class="card-body">
              <h4 class="card-title">Dictionary</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo magni sapiente, tempore debitis beatae culpa natus architecto.</p>
            </div>
            <div class="card-footer">
              <router-link to="/signup" tag="button" class="btn btn-primary btn-lg">Get Started!</router-link>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>
  </div>
</template>

<script>
  export default {
    name: 'MainPage',
    data () {
      return {
        mainTitle: "Dobrodošli!"
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

body {
  padding-top: 54px;
}
/*
@media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
}
*/
.card {
  height: 100%;
}

</style>