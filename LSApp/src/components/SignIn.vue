<template>
    <div class = "signin">
        <h1>{{title}}</h1>
        <div id="text_form">

        <form v-on:submit = "logUser">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" v-model="user.email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password"
            v-model="user.password" name= "password">
        </div>
        <button type="submit" value="Sign in" class="btn btn-primary">Submit</button>
        
        </form>

        </div>
    </div>
</template>

<script>

    export default {
        name: "SignIn",
        data() {
            return {
                title: "Sign in to LS",
                user: {},
            }
        },
        methods: {
            logUser: function (e) {
                //this route have to be checked because its not same on all machines
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/signIn', {
                    /*
                    client_id: 6,
                    //client secret should be copy-pasted from datebase on current machine
                    client_secret: 'QsoVcRinfuHctGCRNm7pbFBVMpXxrhJqPLIC6b3o',
                    grant_type: 'password',
                    */
                    //this field have to be called "username" and it must take email because passport look
                    //for field called "email" in our database but his controller method accepts "username" attribute
                    username: this.user.email,
                    password: this.user.password,
                }).then(response => {
                    //we store in local storage access token that we get from passport using
                    //setToken method from our custom auth model
                    /*
                    this.$auth.setToken(response.body.access_token, response.body.expires_in + Date.now())

                    //after we save tokens we get redirected to /lesson
                    this.$router.push('/lesson')
                    */
                    console.log(response.body)
                })

                e.preventDefault();
            }
        }
    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
    h1, h2 {
        margin: 2%;
        font-weight: normal;
        text-align: center
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
        margin: auto
        
    }

    #text_form input {
        width: 100%;
        clear: both;

    }
</style>