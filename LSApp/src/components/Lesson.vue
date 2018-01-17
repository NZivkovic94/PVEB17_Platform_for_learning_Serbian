<template>
    <div class = "lesson container">

      <div class="row">
        <div class="col-md-8">

          <h1 class="my-4">Lessons
            <small>{{activeLesson.title}}</small>
          </h1>
  

          <!-- Lessons -->
          <div class="card mb-4">
            <div id="videoLesson" class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" :src="activeLesson.video_url" 
            allowfullscreen ></iframe></div>
            <div class="card-body">
              <h2 class="card-title">{{activeLesson.title}}</h2>
              <p class="card-text">{{activeLesson.description_lesson}}</p>
              
              <span v-for="tag in activeLesson.tags_array">
                <a class="badge badge-primary"
                      v-on:click="findLessonsbyTag(tag)"
                      href="#"> 
                    {{tag}} &rarr;</a>
                    &nbsp;

              </span>
            </div>
            <div class="card-footer text-muted">
              Posted on January 1, 2017 by
              {{activeLesson.id_author}}
            </div>

          </div>

        </div>

        <div class="col-md-4">
          
          <!-- Search Widget -->
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <form class="input-group" v-on:submit="findLessonsbyTag(search)">
                <input type="text" class="form-control" placeholder="Search for..." v-model="search">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </form>
              <br>
              <button type="button" class="btn btn-primary" v-on:click="showAllLessons()">Clear filter</button>
            </div>

          </div>

          <!-- Lessons Sidebar -->
          <div class="card my-4">
            <h5 class="card-header">Lessons</h5>
            <div class="nav flex-column list-group" role="tablist">
              <div class="list-group-item list-group-item-action"
                  v-for="(lesson, index) in this.lessons" 
                  v-on:click="changeLesson(index)"
                  role="tab">
                  {{lesson.title}}
              </div>
            </div>
          </div>    
        </div>

      </div>
      <!-- /.row -->
    </div>




</template>

<script>
    export default {
        name: "Lessons",
        created(){
          this.showAllLessons();
        },
        data () {
            return {
                title: "Lessons",
                search: "",
                lessons: [],
                activeLesson: {}
            }
        },
        methods : {
          changeLesson: function(lesson_num){

              this.activeLesson = this.lessons[lesson_num];
              /*
              console.log(lesson_num);
              var found_lesson = this.lessons.findIndex(i => i.id_lesson === lesson_num);
              this.activeLesson = this.lessons[found_lesson];
              */
          },
          showAllLessons: function(){
                this.$http.get('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/getAllLessons',
                    {   /*
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                        */
                    }).then(response => {
                        this.lessons = response.body;
                        this.activeLesson = this.lessons[0];
                        this.search = "";
                })
            },
          findLessonsbyTag: function(tag_name){
            this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/findLessonsByTag', {
                        id_tag : tag_name.toLowerCase().trim()
                    },
                    {
                        headers: {
                            'Authorization': 'Bearer ' + localStorage.getItem('token'),
                        }
                    }).then(response =>{
                        console.log(response.body);
                        if(response.body.length > 0){
                          this.lessons = response.body;
                          this.activeLesson = this.lessons[0]; 
                        }
                        else{
                          this.showAllLessons();
                        }
                    });
          }

          }
}

</script>
<style scoped>
    
  body {
  padding-top: 54px;
  }

  @media (min-width: 992px) {
  body {
    padding-top: 56px;
  }
}

</style>