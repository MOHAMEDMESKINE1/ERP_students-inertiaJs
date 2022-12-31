<template>
    <Head title="Users" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-primary">Students List</h1>
              <div class="mt-5">
                
                <button type="button" class="btn btn-primary  btn-sm" data-bs-toggle="modal" data-bs-target="#student_modal">
                            <i class="fas fa-plus mr-2"></i>
                            Add Student
                </button>
              </div>

               <div class="my-3">
                <FlashMessage/>
               </div>
               <!-- create student componenet -->
                    <CreateStudent/>
                <!-- create student componenet -->
                    <!-- pagination -->
                   <div class="d-flex  justify-content-end align-items-end">
                    
                    <!-- <select @change="searchLevel" v-model="filter" class="select form-control w-25 mb-2">
                        <option disable selected>Per Name</option>
                        <option  v-for="level in props.school_level" :key="level.id" :value="level.id">
                            {{ level.name }}
                        </option>
                     
                                           
                    </select> -->
                   </div>
                  
                <div class="table-responsive   text-center  border border-1 rounded ">
                        <table class="table
                        table-hover	
                        table-bordered 
                        bg-light
                        align-middle">
                            <thead class="table-secondary">
                                <!-- filter by name -->
                                <tr  class="bg-light">
                                    <th colspan="7">
                                        <label for="">Filter By Level </label>
                                        <select @change="searchLevel" v-model="filter" class="select form-control w-full mb-2">
                                            <option value="" >all levels</option>
                                            <option  v-for="level in props.school_level" :key="level.id" :value="level.id">
                                                {{ level.name }}
                                            </option>
                                        
                                        </select>
                                    </th>
                                </tr>
                                <!-- search student by name -->
                                <tr class="bg-light">
                                    <th  colspan="3">
                                        <p>Search Student </p>    
                                        <input @keyup="searchLevel" type="text" v-model="search" placeholder="First Name " class="form-control">
                                    </th>
                                    
                                    <!-- filter by page  -->
                                    <th  colspan="4">
                                        <p>Schoo Level</p>                                               
                                       
                                        <select @change.prevent="searchLevel" v-model="per_page" class="select form-control">
                                            <option value="5" selected>5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                           
                                        </select>
                                         
                                    </th>
                                </tr>
                                <tr>
                                    
                                    <th>ID</th>
                                    <th>First Name</th>                                   
                                    <th>Last Name</th>                                   
                                    <th>Gender </th>                                   
                                    <th>   Schoo Level    </th>                                   
                                    <th>Photo</th>                                   
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody >
                                <tr v-for="(student,index) in props.students.data " :key="index" >
                                    <td >{{ student.id }}</td>
                                    <td >{{ student.first_name }}</td>
                                    <td>{{ student.last_name }}</td>
                                    <td class="text-capitalize" >{{ student.gender }}</td>
                                    <td>{{student.school_level.name}}</td>
                                    <td  v-if="student.photo">
                                        <img :src="'storage/'+student.photo" style="object-fit:cover;" width="75" height="75" alt="photo student">    
                                    </td>
                                    <td v-else>
                                        <img v-if="student.gender == 'Female'" src="avatar_imgs/woman.png"  width="75" height="75" alt="woman">
                                        <img v-else  src="avatar_imgs/man.png" width="75" height="75"  alt="man">
                                    </td>
                                    <td>
                                                                                   
                                        <Link :href="route('student.edit',student.id)" 
                                         class="btn btn-primary btn-sm btn-success ">
                                            <i class="fas fa-pencil "></i>
                                        </Link>
                                        <button @click="destroy(student.id)"   class="btn btn-primary btn-sm btn-danger ml-1 ">
                                            <i class="fas fa-trash "></i>
                                        </button> 
                                    </td>
                                </tr>
                                    
                            </tbody>
                                
                        </table>
                    </div>
                    <Pagination 
                        :links="props.students.links" 
                        :prev="props.students.prev_page_url"
                        :next="props.students.next_page_url"
                        />

            </div>
        </div>
    </div>
  
</template>

<script setup>
import CreateStudent from '../Student/Create.vue'
import FlashMessage from '../../Layouts/Partials/FlashMessage.vue'
import Pagination from '../../Layouts/Pagination.vue';
import { ref } from '@vue/reactivity';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from '@inertiajs/inertia-vue3';
import { Head } from '@inertiajs/inertia-vue3';
let props = defineProps({
    students : Object,
    filters:Object,
    school_level:Array
  
})

    const search =ref(props.filters.search ?? '')
    const filter =ref(props.filters.filter ?? '')
    const per_page =ref(props.filters.per_page ?? 5)
    
    // lazy search to not  send data every time when we saerch
    let searchLevel = _.throttle(()=>{
       
        Inertia.get(route('student.index'),{
           
            per_page:per_page.value,
            filter:filter.value,
            search:search.value,
        },
        {
            replace:true,
            preserveState:true
            
        })
    },500)
    const form = useForm();
   let destroy = (id)=> {
       if(confirm('Are You Sure ?')){

            form.delete(route('student.destroy',id))

            
       }
   }
</script>

<style>

</style>