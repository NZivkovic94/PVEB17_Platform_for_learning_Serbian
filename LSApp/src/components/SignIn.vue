<template>
	<div class = "signin">
		<h1>{{title}}</h1>
		<div id="text_form">
			<form v-on:submit = "addUser">
				<label>Enter name </label>
				<input type="text" name="username" v-model="newUser.name"> 
				<br>
				<label>Enter lastname</label>
				<input type="text" name="username" v-model="newUser.lastname"> 
				<br>
				<label>Enter email  </label>
				<input type="email" name="email" v-model="newUser.email"> 
				<br>
				<label>Enter username</label>
				<input type="text" name="username" v-model="newUser.username"> 
				<br>
				<label>Enter password</label>
				<input type="password" name="password" v-model="newUser.password"> 
				<br>
				<input type= "submit" value="Add User">
			</form>
		</div>

		<ul>
			<li v-for = "user in users">
				{{user.fullname}} {{user.username}} {{user.password}} {{user.email}} <button v-on:click= "deleteUser(user)">x</button>
			</li>
			
		</ul>

		<router-link to='/'>Back</router-link>
	</div>
</template>

<script> //src="https://unpkg.com/axios/dist/axios.min.js" this link is broken we need another way to import axios


//this should import axios if node_modules is library root
import Vue from 'vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

export default {
		name: "SignIn",
		data () {
			return {
				title: "Sign in",
				newUser: {},
				users: []
			}
		},
		methods: {
			addUser: function(e){

			    /*We are going to post to do laravel model using axios*/

				/*!IMPORTANT We need to check if vue.js router's "/" is same as laravel router's "/"
				(is root route the same?)

				edit: it is not and adding full adress also dont work !!!

				*/



                Vue.axios.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/addUser', {
                    name: this.newUser.name,
                    last_Name: this.newUser.lastname,
					password: this.newUser.password,
					email_adress: this.newUser.email,
					username: this.newUser.username,
                })


			    /* This output will stay for now */
				this.users.push({
					fullname: this.newUser.name + " " + this.newUser.lastname,
					email: this.newUser.email,
					username: this.newUser.username,
					password: this.newUser.password,

				})
				e.preventDefault();
			},
			deleteUser: function(user){
				var idRemoveUsr = this.users.indexOf(user);
				this.users.splice(idRemoveUsr,1);
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
#text_form{
	width:200px;
	margin:auto;
}

#text_form input {
	width: 100%;
    clear: both;
    
}
</style>