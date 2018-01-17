<template>
    <div class = "adminDashboard">
        <h1>{{title}}</h1>

        <!-- Small navbar for selecting admin action -->

        <ul class="nav nav-tabs text_form" >
            <li class="nav-item">
                 <div class="nav-link" v-bind:class="{ active: mode == 'statistics' }" 
                 v-on:click="changeMode('statistics');
                            getAllLessons();">
                 Statistics
                 </div>
            </li>
            <li class="nav-item">
                 <div class="nav-link" v-bind:class="{ active: mode == 'lesson'  }" 
                 v-on:click="changeMode('lesson')">Lessons
                 </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" v-bind:class="{ active: mode == 'tag' }" 
                v-on:click="changeMode('tag');  getAllLessons(); showAllTags();">
                Tags
                </div>
            </li>

        </ul>

        <!-- Lesson statistics main part -->
         <div role="main" class="col-sm-9 ml-sm-auto col-md-12 pt-3" v-if="mode === 'statistics'">
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
            <div class=" col-md-6 pt-3">
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
                <div class="btn-group btn-group-toggle" data-toggle="buttons" >
                    <label class="btn btn-secondary" v-for="tag in allTags" v-on:click="addIfSelected(tag)">
                         <input type="checkbox" id="tag" value="tag">{{ tag }}
                    </label>
                </div>
               <br>
               <br>
                <button class="btn btn-primary" type="submit" id="submit" value="submit">Submit</button><br/> 
                </form>
            </div>

            <!-- Delete Lessons tab -->
            <div class="col-md-6 pt-3">
            
                <form v-on:submit = "deleteLesson">
                    <h2>Delete lesson</h2>
                    <label for="lesson_id_delete">Enter ID of a lesson you want to delete</label>
                    <input type="number" id="lesson_id_delete"  name="lesson_delete" v-model="lesson.id_lesson_delete"
                   class="form-control"><br>
                    <button class="btn btn-primary" type="submit" id="deleteLesson" value="submit">Delete lesson</button><br>
                </form>
            </div>
        </div>

        <!-- Tag statistics -->
        <div class="text_form" v-if="mode === 'tag'">
            <h2>Tag</h2>
            <div class="row">
                <div class="col-md-6">
                    <form v-on:submit = "addTag" class="form-group">
                        <label for="tag_id">Enter new tag</label>
                        <input type="text" id="tag_id"  name="tag_add" v-model="lesson.id_tag" class="form-control"><br>
                        <button type="submit" id="submitTag" value="submit" class="btn btn-primary">Add tag</button><br>
                    </form>
                    <form v-on:submit = "deleteTag">
                        <label for="tag_id_delete">Delete tag</label>
                        <input type="text" id="tag_id_delete"  name="tag_delete" v-model="lesson.id_tag_delete" class="form-control"><br>
                        <button type="submit" id="deleteTag" value="submit" class="btn btn-primary" >Delete tag</button>
                        <br>
                    </form>
        
                </div>


                <div class="col-md-6">
                    <div v-for="tag in allTags">
                        {{tag}}
                        <div class="progress">
                        <div class="progress-bar" role="progressbar" 
                        v-bind:style="{ width: popularity(tag) + '%' }" 
                        aria-valuenow="25" 
                        aria-valuemin="0" 
                        aria-valuemax="100">
                        {{Math.round(popularity(tag) * 100) / 100}}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>



    </div>
</template>

<script>
    export default {
        name: "adminDashboard",
        created() {
            this.getAllLessons();
            this.showAllTags();
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
            showAllTags: function(){
                this.$http.get('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/showTagsAsAdmin',
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response => {
                        this.allTags = response.body
                })
                
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
                }).then(()=>{ this.showAllTags(); })

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
                    }).then(()=>{ this.showAllTags(); })

                e.preventDefault();
            },
            addIfSelected: function (tag) {
                let index = this.selectedTags.indexOf(tag);
                if(index > -1 ){
                    this.selectedTags.splice(index,1);
                }
                else{
                     this.selectedTags.push(tag)
                }
                console.log(this.selectedTags);
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
          
          popularity: function(tag){
            let total = this.lessons.length;
            let counter = 0;
            for (let i = 0; i < this.lessons.length; i++) {
                if(this.lessons[i].tags_array.includes(tag)){
                    counter++;
                }
            }
            return counter/total * 100.0;

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
 /* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
} 

</style>