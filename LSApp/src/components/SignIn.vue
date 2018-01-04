<template>
    <div class = "signin">
        <h1>{{title}}</h1>
        <div id="text_form">
            <form v-on:submit = "logUser">
                <label>Enter email  </label>
                <input type="email" name="email" v-model="user.email">
                <br>
                <label>Enter password</label>
                <input type="password" name="password" v-model="user.password">
                <br>
                <input type= "submit" value="Sign in">
            </form>
        </div>

        <br>
        <router-link to='/signup'>Sign Up</router-link>
        <br>
        <router-link to='/'>Back</router-link>
    </div>
</template>

<script>

    export default {
        name: "SignIn",
        data() {
            return {
                title: "Sign in",
                user: {},
            }
        },
        methods: {
            logUser: function (e) {
                //this route have to be checked because its not same on all machines
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/oauth/token', {
                    client_id: 2,
                    //client secret should be copy-pasted from datebase on current machine
                    client_secret: 'hT99JqrbCFHUF2jMlsf29FeVgSEWb0nZVRJ8tbtp',
                    grant_type: 'password',

                    //this field have to be called "username" and it must take email because passport look
                    //for field called "email" in our database but his controller method accepts "username" attribute
                    username: this.user.email,
                    password: this.user.password,
                }).then(response => {
                    //we store in local storage access token that we get from passport using
                    //setToken method from our custom auth model
                    this.$auth.setToken(response.body.access_token, response.body.expires_in + Date.now())

                    //after we save tokens we get redirected to /lesson
                    this.$router.push('/lesson')
                })

                e.preventDefault();
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