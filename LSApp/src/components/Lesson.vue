<template>
    <div class = "lesson container">
      <!-- Page Heading -->
      <h1 class="my-4">{{title}} </h1>
     <p>This is a user home page with his lessons, games, chat etc.</p>

      <!-- Lecture One -->
      <div class="row">
        <div class="col-md-7">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="Lecture 1">
        </div>
        <div class="col-md-5">
          <h3>Serbian alphabet</h3>
          <p>The Serbian Cyrillic alphabet (Serbian: српска ћирилица/srpska ćirilica) is an adaptation of the Cyrillic script for the Serbian language, developed in 1818 by Serbian linguist Vuk Karadžić. It is one of the two alphabets used to write standard modern Serbian, Bosnian and Montenegrin, the other being Latin.</p>
          <button class="btn btn-primary" href="#">View Lecture</button>
        </div>
      </div>
      <!-- /.row -->

      <hr>
      <!-- Lecture Two -->
      <div class="row">
        <div class="col-md-7">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="Lecture 2">
        </div>
        <div class="col-md-5">
          <h3>Serbian alphabet</h3>
          <p>The Serbian Cyrillic alphabet (Serbian: српска ћирилица/srpska ćirilica) is an adaptation of the Cyrillic script for the Serbian language, developed in 1818 by Serbian linguist Vuk Karadžić. It is one of the two alphabets used to write standard modern Serbian, Bosnian and Montenegrin, the other being Latin.</p>
          <button class="btn btn-primary" href="#">View Lecture</button>
        </div>
      </div>
      <!-- /.row -->

      <hr>
      <!-- Lecture Three -->
      <div class="row">
        <div class="col-md-7">
            <img class="img-fluid rounded mb-3 mb-md-0" src="http://placehold.it/700x300" alt="Lecture 3">
        </div>
        <div class="col-md-5">
          <h3>Serbian alphabet</h3>
          <p>The Serbian Cyrillic alphabet (Serbian: српска ћирилица/srpska ćirilica) is an adaptation of the Cyrillic script for the Serbian language, developed in 1818 by Serbian linguist Vuk Karadžić. It is one of the two alphabets used to write standard modern Serbian, Bosnian and Montenegrin, the other being Latin.</p>
          <button class="btn btn-primary" href="#">View Lecture</button>
        </div>
      </div>
      <!-- /.row -->

      <hr>
    </div>




</template>

<script>
    export default {
        name: "Lessons",
        data () {
            return {
                title: "Lessons",
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

    @media (min-width: 992px) {
    body {
        padding-top: 56px;
    }
    }

    .pagination {
    margin-bottom: 15px;
    }
</style>