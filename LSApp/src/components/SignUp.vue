<template>
	<div class = "signup">
		<h1>{{title}}</h1>


		<div id="text_form">
		<form v-on:submit = "addUser">

			<!-- First/Last name -->
			<div class="form-row">
			<div class="form-group col-md-6" >
    			<label for="fistName">First Name</label>
    			<input type="text" class="form-control" id="inputFirstName" placeholder="Name"
    			name="username" v-model ="newUser.name">
  			</div>
  			<div class="form-group col-md-6">
    			<label for="inputAddress">Last Name</label>
    			<input type="text" class="form-control" id="inputLastName" placeholder="Last name"
    			name="username" v-model="newUser.lastname">
  			</div>
  			</div>

  			<div class="form-group" >
    			<label for="fistName">Username</label>
    			<input type="text" class="form-control" id="inputUsername" placeholder="Username"
    			name="username" v-model="newUser.username">
  			</div>
  			<div class="form-row">
    			<div class="form-group col-md-6">
      				<label for="inputEmail4">Email</label>
      				<input type="email" class="form-control" id="inputEmail4" placeholder="Email"
      				name="email" v-model="newUser.email">
    			</div>
    			<div class="form-group col-md-6">
      				<label for="inputPassword4">Password</label>
      				<input type="password" class="form-control" id="inputPassword4" placeholder="Password"
      				name="password" v-model="newUser.password">
    			</div>
   			</div>

  			
    		<div class="form-group">
      		<label for="inputState">Role</label>
      		<select id="inputState" class="form-control">
        		<option selected>Student</option>
        		<option>Teacher</option>
        		<option>Admin</option>
        		<option>Guest</option>
      			</select>
      		</div>	
    	  	<button type="submit" class="btn btn-primary" value="Add User">Sign up</button>
    	  	<button type="button" class="btn btn-primary" @click="test">Test Laravel</button>
			</form>
		</div>
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
                    first_name: this.newUser.name,
					last_name: this.newUser.lastname,
                    password: this.newUser.password,
                    email: this.newUser.email,
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
	margin-top: 2%;
	margin-bottom: 5%;
   text-align: center;
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
	width:50%;
	margin:auto;
}

#text_form input {
	width: 100%;
    clear: both;
    
}
</style>