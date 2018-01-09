<template>
    <div class = "adminDashboard">
        <h1>{{title}}</h1>
        <p>If you can see this you are Admin</p>

        <form v-on:submit = "addLesson">
            <input type="text" id="video_url"  name="video_url" v-model="lesson.video_url"><br>
            <input type="text" id="video_pass"><br>
            <input type="radio" id="vimeo" value="vimeo" name="source">Vimeo<br>
            <input type="radio" id="youtube" value="youtube" name="source">Youtube<br>
            <button type="submit" id="submit" value="submit">Submit</button><br>
        </form>
        <router-link to='/'>Back</router-link>
    </div>
</template>

<script>
    export default {
        name: "adminDashboard",
        data () {
            return {
                title: "Admin Dashboard",
                lesson : {}

            }
        },
        methods: {
            addLesson: function(e){
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/createLessonAsAdmin', {
                    video_url : this.lesson.video_url
                },
                {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('token'),
                    }
                }).then(response => {
                    console.log(response)
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
</style>

