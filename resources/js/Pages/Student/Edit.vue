<template>
    <div class="container-fluid  my-4">
        <div class="row">
               <div class="col-md-6">
                  <div class="mt-5">
                    <h2 class="mx-4 text-primary" >Update Student</h2>
                  </div>
                    <form class="mx-1 my-5  mx-md-4" @submit.prevent="updateStudent">
                            <!-- firstname -->
                                <div class=" mb-4">

                                    <div class="input-group flex-nowrap">
                                    
                                        <input type="text" name="first_name" v-model="form.first_name" class="form-control" placeholder="First Name" >
                                    
                                    </div>   
                                    <!-- <small v-if="errors.first_name " class="text-danger my-1 " v-text="errors.first_name ">  </small> -->
                                                        
                            
                                </div>      
                                <!-- lastname -->
                                <div class="mb-4">
                                    <div class="input-group flex-nowrap">
                                    
                                    <input type="text" name="last_name" v-model="form.last_name" class="form-control" placeholder="Last Name" >
                                    </div>
                                    <!-- <small v-if="errors.last_name " class="text-danger " v-text="errors.last_name ">  </small> -->

                                                    
                                </div>   
                                <!-- school Level -->
                                <div class="mb-4">										
                                        
                                    <select  name="level_school" v-model="form.level_school" class="select form-control w-full ">
                                            <option value="" selected disabled>Level</option>
                                            <option  v-for="lv in $page.props.level_school" :key="lv.id" :value="lv.id"  >{{ lv.name }} </option>
                                    </select>
                                    
                                    <!-- <small v-if="errors.level_school " class="text-danger my-1 " v-text="errors.level_school ">  </small>													 -->
                                </div>                                      
                                <!-- gender -->
                                <div class="mb-4">

                                    <select  name="gender" v-model="form.gender" class="select form-control w-full ">
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <!-- <small v-if="errors.gender " class="text-danger my-1 " v-text="errors.gender ">  </small> -->

                                </div>
                                
                                <!-- age -->
                                <div class="mb-4">
                                
                                    <input type="number" name="age" v-model="form.age" min="18" max="25" class="form-control" placeholder="Age" >
                                    
                                    <!-- <small v-if="errors.age " class="text-danger  " v-text="errors.age ">  </small> -->

                                </div>

                                <!-- photo -->
                                <div class="mb-3 ">

                                    <input type="file" name="photo" @change="previewImage" class="form-control form-control-sm mb-1 w-full py-2 border border-1 " id="formFileSm"  >
                                    <!-- preview image
                                    <img v-if="url" :src="url" id="image-preview" class=" border my-2 rounded rounded-1 " style="object-fit:cover;" width="90"  height="90"  alt="">
                                    <img v-else src="" id="image-preview" class="d-none " style="object-fit:cover;" width="90"  height="90"  alt=""> -->

                                    <!-- if photo exist -->
                                    <img v-if="student.photo"  :src="'/storage/'+student.photo " id="image-preview"  class=" border my-2 rounded rounded-1 " style="object-fit:cover;" width="90"  height="90"  alt="">
                                    <img v-else   src="" id="image-preview"  class=" border my-2 d-none rounded rounded-1 " style="object-fit:cover;" width="90"  height="90"  alt="">

                                </div>
                            
                                <!-- save -->
                                                                        
                                <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                                                
                                    <button type="submit" class="btn btn-primary btn-md w-100">Save</button>
                                                                        
                                </div>

                                                                
                    </form>

                </div>
                <div class="col-md-6 ">
                    <img src="../../../imgs/student1.svg"
                    class="img-fluid " alt="Sample image">
                </div>
                                       
            </div>
                                       
                                   
        </div>
                               

</template>


<script setup>
import { useForm } from "@inertiajs/inertia-vue3"
import { ref } from "@vue/reactivity"

let props = defineProps({
    student:Object,
    errors : Object
})

    const form = useForm({
        id:props.student.id,
        first_name : props.student.first_name,
        last_name : props.student.last_name,
        age : props.student.age,
        gender : props.student.gender,
        level_school:props.student.schoo_level_id,
        photo:null
    })

    let url = ref(null)

	
    let previewImage = (e) =>{
    
        const file = e.target.files[0];
        form.photo = file
        url.value = URL.createObjectURL(file);

    }
    let updateStudent = ()=>{

       form.put(route('student.update',form.id))
   

    }
</script>

<style>

</style>