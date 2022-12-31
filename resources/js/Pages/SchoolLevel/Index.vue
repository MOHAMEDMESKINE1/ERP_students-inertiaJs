<template>
   <div class="container">
        <div class="row mb-2">
            <div class="col-md-12 mx-auto ">
                    
                    <h1 class="mb-4">Levels List</h1>

                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addLevel">
                            <i class="fas fa-plus mr-2"></i>
                            Add Level
                        </button>
                        <!-- create componenet -->
                        <CreateLevel/>
                       <!-- create componenet -->  
                       
                       <!-- flash message -->
                        <Alert/>
                       <!-- flash message -->
                        <div class="table-responsive   text-center  border border-1 rounded ">
                        <table class="table
                        table-hover	
                        table-bordered 
                        table-white
                        align-middle">
                            <thead class="table-secondary">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>                                   
                                    <th>Action</th>                                   
                                </tr>
                            </thead>
                            <tbody >
                                    <tr v-for="(level,index) in levels.data " :key="index" >
                                        <td >{{ level.id }}</td>
                                        <td >{{ level.name }}</td>
                                        <td>
                                            
                                            <Link :href="route('schoolevel.edit',level.id)"  class="btn btn-primary btn-sm btn-secondary ">
                                                <i class="fas fa-pencil "></i>
                                            </Link>
                                            <button @click="destroy(level.id)"   class="btn btn-primary btn-sm btn-danger ml-1 ">
                                                <i class="fas fa-trash "></i>
                                            </button>
                                        </td>
                                    </tr>
                                    
                            </tbody>
                                
                        </table>
                    </div>
                     <!-- pagination -->
                     <Pagination :links="levels.links"/>
                    <!-- pagination -->
            </div>
        </div>
    </div>
    
    <div class="content">
        <div class="container-fluid">
        
        </div>
    </div>   
</template>

<script setup>
import Pagination from '../../Layouts/Pagination.vue'
import CreateLevel from '../SchoolLevel/Create.vue'
import Alert from '../../Layouts/Partials/FlashMessage.vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
 let props = defineProps({
            levels:Object,
           
        })

       let destroy = (id)=>{
           if(confirm('Are You Sure !')){
             Inertia.delete(route('schoolevel.destroy',id))
           }
       }
</script>

<style>

</style>