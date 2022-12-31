<template>

<div class="container-fluid  my-4">
    <div class="row">
        <div class="col-md-12">
            <section >
                <div class="container ">
                    <div class="modal fade" id="addLevel" tabindex="-1"  data-backdrop="static"   data-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">New Level</h5>
                                    <!-- add level -->
                                        <button type="button" class="btn-close bg-white border-0 fs-2" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fas fa-close"></i>
                                        </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6 my-5">

                                            <div class="my-5">
                                                <form class="mx-1 my-5  mx-md-4" @submit.prevent="addLevel">

                                                    
                                                    <div class="input-group ">
                                                            <span class="input-group-text" id="addon-wrapping">
                                                                <i class="fas fa-regular fa-school-circle-check"></i>
                                                            </span>
                                                            <input type="text" v-model="form.name" id="name" name="name" class="form-control"  placeholder="Level Name" ><br>
                                                    </div>                                                     
                                                    <!-- <small v-if="nomError!='' " class="text-danger my-1 " v-text="nomError ">  </small> -->
                                                    <small v-if="form.errors.name " class="text-danger my-1 " v-text="form.errors.name ">  </small>

                                                    <button type="submit" class="btn btn-primary my-4 btn-md w-100">Save</button>
                                                        

                                                </form>
                                            </div>

                                        </div>
                                        <div class="col-md-6   ">
                                            <img src="../../../imgs/student.svg"
                                            class="img-fluid  " alt="Sample image">
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
      
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3"
import { ref } from "@vue/reactivity"

defineProps({
    errors:Object
})

    const nomError = ref('')
   const form = useForm({
	name:'',
    terms: false,
   })

    let addLevel = ()=> {
		form.post(route('schoolevel.store'),{

            onSuccess : (res) => {console.log(res);},
            onError : (err)=> {
                if(err.name !== null){
                    nomError.value=err.name
                }
            }
        })
       
      
    }

</script>

<style>

</style>