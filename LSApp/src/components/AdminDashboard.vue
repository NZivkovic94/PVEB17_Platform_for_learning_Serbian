<template>
    <div class = "adminDashboard">
        <h1>{{title}}</h1>

        <ul class="nav nav-tabs text_form" >
            <li class="nav-item">
                 <div class="nav-link" v-bind:class="{ active: isLessonSelected }" v-on:click="changeMode(1)">Lessons
                 </div>
            </li>
            <li class="nav-item">
                <div class="nav-link" v-bind:class="{ active: !isLessonSelected }" v-on:click="changeMode(0)">Tags
                </div>
            </li>

        </ul>

        <div class="text_form" v-if="isLessonSelected === true">
        <br>
        <form v-on:submit = "addLesson">
            
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

        <br/>
        <br/>

        <div>
        <form v-on:submit = "deleteLesson">
            <label for="lesson_id_delete">Enter ID of a lesson you want to delete</label>
            <input type="number" id="lesson_id_delete"  name="lesson_delete" v-model="lesson.id_lesson_delete"
                   class="form-control"><br>
            <button class="btn btn-primary" type="submit" id="deleteLesson" value="submit">Delete lesson</button><br>
        </form>
        </div>


        </div>


        <div class="text_form" v-if="isLessonSelected === false">
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
        data () {
            return {
                title: "Admin Dashboard",
                lesson : {},
                allTags: [],
                selectedTags: [],

                isLessonSelected: true
            }
        },
        methods: {

            changeMode: function(mode){
                if(mode == 1)
                    this.isLessonSelected = true;
                else if(mode == 0){
                    this.isLessonSelected = false;
                }
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
                    console.log(response)
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
                    console.log(response)
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
  
.text_form{
    width: 50%;
    height:100%;
    clear: both;
    margin:auto;
}

.text_form input {
    width: 100%;
    clear: both;
    
}

</style>