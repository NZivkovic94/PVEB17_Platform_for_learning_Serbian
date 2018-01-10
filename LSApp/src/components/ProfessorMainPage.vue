<template>
    <div class = "professorMainPage">
        <h1>{{title}}</h1>
        <p>If you can see this you are Professor</p>

        <form v-on:submit = "addLesson">
            <input type="text" id="video_url"  name="video_url" v-model="lesson.video_url"><br/>
            <input type="text" id="video_pass"><br/>
            <input type="radio" id="vimeo" value="vimeo" name="source">Vimeo<br/>
            <input type="radio" id="youtube" value="youtube" name="source">Youtube<br/>

            <p>Pick tags you want to add:</p>
            <form v-on:submit = "showAllTags">
                <button type="submit" id="showTags" value="submit">Show tags</button><br>
            </form>
            <ul id="listTags">
                <li v-for="tag in allTags">
                    <input type="checkbox" id="tag" value="tag" v-on:click="addIfSelected(tag)">{{ tag }}
                </li>
            </ul>

            <button type="submit" id="submit" value="submit">Submit</button><br/>
        </form>
        <br/>
        <br/>

        <router-link to='/'>Back</router-link>
    </div>
</template>

<script>
    export default {
        name: "professorMainPage",
        data () {
            return {
                title: "Professor Main Page",
                lesson : {},
                allTags: [],
                selectedTags: []
            }
        },
        methods: {
            addLesson: function(e){
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/createLessonAsProfessor', {
                        video_url : this.lesson.video_url,
                        selectedTags : this.selectedTags
                    },
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response => {
                        console.log(response)
                        //this.$router.push('/')
                       })
                e.preventDefault();
            },
            showAllTags: function(e){
                this.$http.get('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/showTagsAsProfessor',
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response => {
                       /// console.log(response)
                        this.allTags = response.body
                        console.log(this.allTags)
                        console.log(this.selectedTags)
                     })
                e.preventDefault();
            },
            addIfSelected: function (tag) {
                this.selectedTags.push(tag)
            },
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