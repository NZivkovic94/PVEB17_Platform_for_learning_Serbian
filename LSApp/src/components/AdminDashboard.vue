<template>
    <div class = "adminDashboard">
        <h1>{{title}}</h1>
        <p>If you can see this you are Admin</p>
        <router-link to='/'>Back</router-link>
    </div>
</template>

<script>
    export default {
        name: "adminDashboard",
        data () {
            return {
                title: "Admin Dashboard"

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

