<template>
    <div class = "adminDashboard">
        <h1>{{title}}</h1>
        <p>If you can see this you are Admin</p>

        <form v-on:submit = "addLesson">
            <input type="text" id="video_url"  name="video_url" v-model="lesson.video_url"><br>
            <input type="text" id="video_pass"><br>
            <input type="radio" id="vimeo" value="vimeo" name="source">Vimeo<br>
            <input type="radio" id="youtube" value="youtube" name="source">Youtube<br>

            <p>Pick tags you want to add:</p>
            <form v-on:submit = "showAllTags">
                <button type="submit" id="showAllTags" value="submit">Show tags</button><br>
            </form>
            <ul id="listTags">
                <li v-for="tag in allTags">
                    <input type="checkbox" id="tag" value="tag" v-on:click="addIfSelected(tag)">{{ tag }}
                </li>
            </ul>

            <button type="submit" id="submitLesson" value="submit">Submit</button><br>
        </form>
        <br/>
        <br/>
        <form v-on:submit = "addTag">
            <label for="tag_id">Enter new tag</label>
            <input type="text" id="tag_id"  name="tag_add" v-model="lesson.id_tag"><br>
            <button type="submit" id="submitTag" value="submit">Add tag</button><br>
        </form>
        <form v-on:submit = "deleteTag">
            <label for="tag_id_delete">Delete tag</label>
            <input type="text" id="tag_id_delete"  name="tag_delete" v-model="lesson.id_tag_delete"><br>
            <button type="submit" id="deleteTag" value="submit">Delete tag</button><br>
        </form>
        <form v-on:submit = "showAllTags">
            <label for="showTags">Console log all tags</label>
            <button type="submit" id="showTags" value="submit">Show tags</button><br>
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
                lesson : {},
                allTags: [],
                selectedTags: []
            }
        },
        methods: {
            addLesson: function(e){
                this.$http.post('http://localhost/PVEB17_Platform_for_learning_Serbian/laravel/public/api/createLessonAsAdmin', {
                    video_url : this.lesson.video_url,
                    selectedTags : this.selectedTags
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

