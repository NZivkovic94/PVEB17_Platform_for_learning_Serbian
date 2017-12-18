<template>
	<div class = "about">
		<h1>{{title}}</h1>
		<p>This is an application made by MATF students</p>
		<router-link to='/'>Back</router-link>
	</div>
</template>

<script>
	export default {
		name: "About",
		data () {
			return {
				title: "About"

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

