<template>
    <div class = "adminDashboard">
        <h1>{{title}}</h1>

        <!-- Small navbar for selecting admin action -->

        <ul class="nav nav-tabs text_form" >
            <li class="nav-item">
                 <div class="nav-link" v-bind:class="{ active: mode == 'statistics' }" v-on:click="changeMode('statistics')">Statistics
                 </div>
            </li>
            <li class="nav-item">
                 <div class="nav-link" v-bind:class="{ active: mode == 'lesson'  }" v-on:click="changeMode('lesson'); getAllLessons();">Lessons
                 </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" v-bind:class="{ active: mode == 'tag' }" v-on:click="changeMode('tag')">Tags
                </div>
            </li>

        </ul>

        <!-- Initial main part -->

         <div role="main" class="col-sm-9 ml-sm-auto col-md-12 pt-3" v-if="mode === 'statistics'">
            <h2>Statistics</h2>
<!--          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <div class="text-muted">Something else</div>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAAJ12AAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIABAADcgwAAACwAAAAAAQABAAACAkQBADs=" width="200" height="200" class="img-fluid rounded-circle" alt="Generic placeholder thumbnail">
              <h4>Label</h4>
              <span class="text-muted">Something else</span>
            </div>
          </section>
-->
          <h2>Lesson statistics</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Title</th>
                  <th>Tags</th>
                  <th>Author</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="lesson in this.lessons">
                  <td>{{lesson.id_lesson}}</td>
                  <td>{{lesson.title}}</td>
                  <td>{{trimTags(lesson.tags_array)}}</td>
                  <td>{{lesson.id_author}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>


        <!-- Lessons tab -->
        <div class="text_form row" v-if="mode === 'lesson'">
            
             <!-- Add Lessons tab -->
            <div class=" col-md-4 pt-3">
                <form v-on:submit = "addLesson">
                <h2>Add lesson</h2>
                <div class="form-group">
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

            <!-- Delete Lessons tab -->
            <div class="col-md-4 pt-3">
            
                <form v-on:submit = "deleteLesson">
                    <h2>Delete lesson</h2>
                    <label for="lesson_id_delete">Enter ID of a lesson you want to delete</label>
                    <input type="number" id="lesson_id_delete"  name="lesson_delete" v-model="lesson.id_lesson_delete"
                   class="form-control"><br>
                    <button class="btn btn-primary" type="submit" id="deleteLesson" value="submit">Delete lesson</button><br>
                </form>
            </div>
        </div>


        <div class="text_form" v-if="mode === 'tag'">
        <br>
        <form v-on:submit = "addTag" class="form-group">
            <label for="tag_id">Enter new tag</label>
            <input type="text" id="tag_id"  name="tag_add" v-model="lesson.id_tag" class="form-control"><br>
            <button type="submit" id="submitTag" value="submit" class="btn btn-primary">Add tag</button><br>
        </form>
        <form v-on:submit = "deleteTag">
            <label for="tag_id_delete">Delete tag</label>
            <input type="text" id="tag_id_delete"  name="tag_delete" v-model="lesson.id_tag_delete" 
            class="form-control"><br>
            <button type="submit" id="deleteTag" value="submit" class="btn btn-primary">Delete tag</button><br>
        </form>


        
        <form v-on:submit = "showAllTags">
            <br>
            <button type="submit" id="showTags" value="submit" class="btn btn-primary">Show tags</button><br>
        </form>
        </div>



    </div>
</template>

<script>
    export default {
        name: "adminDashboard",
        created() {
            this.lessons = this.getAllLessons();
        },
        data () {
            return {
                title: "Admin Dashboard",
                lesson : {},
                allTags: [],
                selectedTags: [],
                lessons: [],
                mode: "statistics"
            }
        },
        methods: {

            changeMode: function(new_mode){
                this.mode = new_mode;
            },
            addLesson: function(e){
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/createLessonAsAdmin', {
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
                })
                e.preventDefault();
            },
            deleteLesson: function(e){
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/deleteLessonAsAdmin', {
                        id_lesson : this.lesson.id_lesson_delete
                    },
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response => {
                })
                e.preventDefault();
            },
            showAllTags: function(e){
                this.$http.get('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/showTagsAsAdmin',
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response => {
                        //console.log(response)
                        this.allTags = response.body
                        console.log(this.allTags)
                        console.log(this.selectedTags)
                })
                e.preventDefault();
            },
            addTag: function(e){
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/createTagAsAdmin', {
                        id_tag : this.lesson.id_tag.toLowerCase().trim()
                    },
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response => {
                    console.log(response)
                })
                e.preventDefault();
            },
            deleteTag: function(e){
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/deleteTagAsAdmin', {
                        id_tag : this.lesson.id_tag_delete.toLowerCase().trim()
                    },
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response => {
                    console.log(response)
                })
                e.preventDefault();
            },
            addIfSelected: function (tag) {
                this.selectedTags.push(tag)
            },
            getAllLessons: function(){
                this.$http.get('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/getAllLessons',
                    {   /*
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                        */
                    }).then(response => {
                        this.lessons = response.body;
                })
            },
            trimTags: function(tags_array){

            if(tags_array.length == 0){
                return "No tags"
            }

            let result = tags_array[0];
            for (var i=1 ; i < tags_array.length ; i++) {
               result += ", " + tags_array[i];
            }
            return result;
          },
          popularity: function(){
            for(let i = 0 ; i < this.lessons.length; i++){
                
            }
          }
        }


    }

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h1, h2 {
    margin-top: 2%;
    margin-bottom: 5%;
   text-align: left;
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
  
.text_form{
    width: 100%;
    height:100%;
    clear: both;
    margin:auto;
}

.text_form input {
    width: 100%;
    clear: both;
    
}

</style>