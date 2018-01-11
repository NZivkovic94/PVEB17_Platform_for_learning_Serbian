<template>
    <div class = "professorMainPage">
        <h1>{{title}}</h1>

        <div id="text_form">

        <form v-on:submit = "addLesson">
            
            <div class="form-group" >
                    <label for="video_url">Video url</label>
                    <input type="url" class="form-control" id="video_url" placeholder="Video url"
                    name="video_url" v-model="lesson.video_url">
            </div>

            <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Lesson title"
                    v-model="lesson.title">
            </div>

            <div class="form-group">
                    <label for="description">Desription</label>
                    <textarea class="form-control" rows="5" id="description" name="description" placeholder="Enter lesson description" v-model="lesson.description"></textarea>
            </div>

            <form v-on:submit = "showAllTags">
                    <button class="btn btn-primary" type="submit" id="showTags" value="submit">Show tags</button><br>
            </form>

                <ul id="listTags">
                    <li v-for="tag in allTags">
                        <input type="checkbox" id="tag" value="tag" v-on:click="addIfSelected(tag)">{{ tag }}
                    </li>
                </ul>

            <button class="btn btn-primary" type="submit" id="submit" value="submit">Submit</button><br/> 

        </form>

    </div>

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
                console.log(this.lesson);
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/createLessonAsProfessor', {
                        video_url : this.lesson.video_url,
                        selectedTags : this.selectedTags,
                        title: this.lesson.title,
                        description_lesson: this.lesson.description

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
    width: 50%;
    height:100%;
    clear: both;
    margin:auto;
}

#text_form input {
    width: 100%;
    clear: both;
    
}
</style>