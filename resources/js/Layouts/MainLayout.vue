<template>
    <div class="wrapper">

        <!-- menu -->
            <Menu/>
        <!-- menu -->
  
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <a href="#" class="brand-link">
        
        <img src="~admin-lte/dist/img/adminLTELogo.png" width="45" alt="adminlte logo">
        
        <span class="brand-text text-center font-weight-light mx-3">AdminLTE 3</span>
    </a>
  
    <div class="sidebar">
  
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="image ">
            <img src="~admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>

        <div class="">
                <!-- <a href="#" class="d-block">{{$page.props.user.name}}</a> -->
                <a href="#" class="d-block mx-2 mt-1" >{{ConnctedUser}}</a>
        </div>

    </div>
<!--  -->
<!--  -->
  
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
        <li class="nav-item menu-open">
         
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <Link :href="route('home')"  class="nav-link"  :class="{ 'active': $page.component === 'Home' }">
              <!-- <i class="fas fa-home nav-icon"></i> -->
              <i class="fa-sharp fa-solid fa-house mr-2"></i>
              <p>Home</p>
            </Link>
        </li>
          
          <li class="nav-item">
              <Link :href="route('student.index')" class="nav-link"   :class="{ 'active': $page.component === 'Student/Index' }">
                <!-- <i class="fas fa-circle nav-icon"></i> -->
                <i class="fa-solid fa-graduation-cap mr-2"></i>
                <p>Students List</p>
              </Link>
            
            </li>
            <li class="nav-item ">
              <Link :href="route('schoolevel.index')" class="nav-link mt-3"   :class="{ 'active': $page.component === 'SchoolLevel/Index' }">
                <i class="fa-solid fa-school mr-2"></i>
                <p>School Level List</p>
              </Link>
            
            </li> 
        
        </ul>
        </li>
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
            Simple Link
            <span class="right badge badge-danger">New</span>
            </p>
            </a>
          </li> -->
      </ul>
    </nav>
  
    </div>
  
    </aside>
  
    <div class="content-wrapper">
   
    <!-- content -->
        <slot/>

    <!-- content -->
    </div>

    <!-- footer -->
    <Footer/>
    <!-- footer -->
</div>
</template>
  
<script setup>
import Footer from './Partials/Footer.vue'
import Menu from './Partials/Menu.vue'
import { usePage } from '@inertiajs/inertia-vue3';
import { computed } from '@vue/runtime-core';


let props= defineProps({
  user:Object
})


    const ConnctedUser = computed(()=>{
        return usePage().props.value.user.name
    })


</script>
  
<style>
</style>