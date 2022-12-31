<template>
  <div>
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
  
        <ul class="navbar-nav ">
            <div class="d-flex justify-items-around text-danger">
            <li class="nav-item">
                <a class="nav-link  " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>

  
                <li class="nav-item d-none  d-sm-inline-block">
                    <Link :href="route('home')" class="nav-link "  :class="{ 'active text-success fw-bold': $page.component === 'Home' }">Home</Link>
                </li>

                <li class="nav-item d-none  d-sm-inline-block">
                    <Link :href="route('student.index')" class="nav-link "  :class="{ 'active  text-success fw-bold': $page.component === 'Student/Index' }">Students</Link>
                </li>

                <li class="nav-item d-none  d-sm-inline-block">
                    <Link :href="route('schoolevel.index')" class="nav-link "  :class="{ 'active  text-success fw-bold': $page.component === 'SchoolLevel/Index' }">Level School</Link>
                </li>
                
           
                
               
            </div>

        </ul>  
    </nav>
  </div>
</template>

<script setup>

</script>

<style>

</style>