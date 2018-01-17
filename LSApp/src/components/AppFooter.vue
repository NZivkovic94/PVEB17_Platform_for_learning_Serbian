<template>


    <footer class="footer">
        
        <div class="container text-right">

                <span class="text-muted text-left">Developed by Matf students </span>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-skype"></i></a>
        </div>
    </footer>

</template>



<script>
export default {
}
</script>

<style type="text/css" scoped>

.footer {
  position: fixed;
  bottom: 0;
  width: 100%;
  height: 60px; /* Set the fixed height of the footer here */
  line-height: 60px; /* Vertically center the text there */
  background-color: #f5f5f5;
  }
.footer a {
  color: #70726F;
  font-size: 20px;
  padding: 10px;
  border-right: 1px solid #70726F;
  transition: all .5s ease;
}
.footer a:first-child {
  border-left: 1px solid #70726F;
}
.footer a:hover {
  color: white;
}



</style>