<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
    <router-link class="navbar-brand" to="/">Learn Serbian</router-link>
    <button class="navbar-toggler" 
            type="button" 
            data-toggle="collapse" 
            data-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" 
            aria-expanded="false" 
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
    </button>

  

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      

      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <router-link class="nav-link" 
                       to="/" 
                       active-class="active"
                       exact>
          Home
          </router-link>
        </li>
        <li class="nav-item ">
          <router-link class="nav-link" 
                       to="/lesson" 
                       active-class="active"
                       exact>
          Lectures 
          </router-link>
        </li>
         <li class="nav-item ">
          <router-link class="nav-link" 
                       to="/quiz" 
                       active-class="active"
                       exact
                       disabled>
          Quizzes 
          </router-link>
        </li>
         <li class="nav-item ">
          <router-link class="nav-link" 
                       to="/dictionary" 
                       active-class="active"
                       exact
                       disabled>
          Dictionary
          </router-link>
        </li>
         <li class="nav-item ">
          <router-link class="nav-link" 
                       to="/settings" 
                       active-class="active"
                       exact
                       disabled>
          Settings
          </router-link>
        </li>



        <!-- dropdown button
        <li class="nav-item dropdown">
          <router-link class="nav-link dropdown-toggle" to="#" 
                        id="navbarDropdown" 
                        role="button" 
                        data-toggle="dropdown" 
                        aria-haspopup="true" 
                        aria-expanded="false">
            MyProfile
          </router-link>
  
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <router-link class="dropdown-item" to="#">Home</router-link>
            <router-link class="dropdown-item" to="#">Lectures</router-link>
            <router-link class="dropdown-item" to="#">Quizzes</router-link>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Settings</a>
          </div>
        </li>
      -->


      </ul>

      <form class="form-inline my-5 my-lg-0">
         <router-link class="nav-link" to='/signin'>Sign in <span class="sr-only">(current)</span></router-link>
         or 
         <router-link class="nav-link" to='/signup'>Sign up <span class="sr-only">(current)</span></router-link>
      </form>
    
    </div>
  </nav>
</template>



<script>
export default {
}
</script>

