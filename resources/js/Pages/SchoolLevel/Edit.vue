<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 my-5">

            <div class="my-5">
                <form class="mx-1 my-5  mx-md-4" @submit.prevent="updateLevel">
                    <h1 class="text-primary mb-4">Edit Level</h1>
                    <div class="input-group ">
                            <span class="input-group-text" id="addon-wrapping">
                                <i class="fas fa-regular fa-school-circle-check"></i>
                            </span>
                            <input type="text" v-model="form.name" id="name" name="name" class="form-control"  placeholder="Level Name" ><br>
                    </div>                                                     
                    <!-- <small v-if="nomError!='' " class="text-danger my-1 " v-text="nomError ">  </small> -->
                    <small v-if="form.errors.name " class="text-danger my-1 " v-text="form.errors.name ">  </small>

                    <button type="submit" class="btn btn-primary my-2 btn-md w-100">Save</button>
                    <Link :href="route('schoolevel.index')" class="btn btn-secondary btn-md w-100">Cancel</Link>
                        

                </form>
            </div>

        </div>
        <div class="col-md-6   ">
            <img src="../../../imgs/student.svg"
            class="img-fluid  my-5" alt="Sample image">
        </div>
</div>
</div>
</template>

<script setup>

import { useForm } from "@inertiajs/inertia-vue3"

let props = defineProps({
    errors:Object,
    level :Object
})

   
   const form = useForm({
    id:props.level.id,
	name:props.level.name,
    terms: false,
   })

    let updateLevel = ()=> {
		form.put(route('schoolevel.update',form.id),{

            onSuccess : (res) => {console.log(res);},
           
        })
       
      
    }
</script>

<style>

</style>