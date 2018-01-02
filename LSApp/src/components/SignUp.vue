<template>
	<div class = "signup">
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

		<button @click="test">
			console.log data from laravel
		</button>

		<ul>
			<li v-for = "user in users">
				{{user.fullname}} {{user.username}} {{user.password}} {{user.email}} <button v-on:click= "deleteUser(user)">x</button>
			</li>
			
		</ul>

		<router-link to='/'>Back</router-link>
	</div>
</template>

<script>

export default {
		name: "SignUp",
		data () {
			return {
				title: "Sign up",
				newUser: {},
				users: []
			}
		},
		methods: {
		    //test method for geting data from laravel api/test route
            //it should be removed in the same time as /test route in api.php
			test: function() {
			  this.$http.get("http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/test")
				  .then(function (response) {
				      console.log(response.body)
				  });
			},
			addUser: function(e){


                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/addUser', {
                    name: this.newUser.name,
					last_name: this.newUser.lastname,
                    password: this.newUser.password,
                    email_adress: this.newUser.email,
                    username: this.newUser.username,


                });

			    /* This will stay for now */
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