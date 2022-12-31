<template>
	 <div class="container-fluid  my-4">
		  <div class="row">
				<div class="col-md-12">
					 <section >
					 <div class="container ">
						  <div class="modal fade" id="student_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
								<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
												<h5 class="modal-title" id="modalTitleId">New Level</h5>
													<button type="button" class="btn-close bg-white border-0 fs-2" data-bs-dismiss="modal" aria-label="Close">
														<i class="fas fa-close"></i>
													</button>
										</div>
						<div class="modal-body">
						<div class="row justify-content-center">
							<div class="col-md-6 ">

						<div class="my-5">
							<form class="mx-1 my-5  mx-md-4" @submit.prevent="addStudent">
							<!-- firstname -->
								<div class=" mb-4">

									<div class="input-group flex-nowrap">
									
										<input type="text" v-model="form.first_name" class="form-control" placeholder="First Name" aria-label="first_name" aria-describedby="addon-wrapping">
									
									</div>   
									<small v-if="form.errors.first_name " class="text-danger my-1 " v-text="form.errors.first_name ">  </small>
                                                        
							
								</div>      
								<!-- lastname -->
								<div class="mb-4">
									<div class="input-group flex-nowrap">
									
									<input type="text" v-model="form.last_name" class="form-control" placeholder="Last Name" aria-label="last_name" aria-describedby="addon-wrapping">
									</div>
									<small v-if="form.errors.last_name " class="text-danger " v-text="form.errors.last_name ">  </small>

													
								</div>   
								<!-- school Level -->
								<div class="mb-4">										
										
									<select  v-model="form.level_school" class="select form-control w-full ">
											<option value="" selected disabled>Level</option>
                                            <option  v-for="lv in $page.props.level_school" :key="lv.id" :value="lv.id" >{{ lv.name }} </option>
                                    </select>
									
									<small v-if="form.errors.level_school " class="text-danger my-1 " v-text="form.errors.level_school ">  </small>													
								</div>                                      
							
								<div class="mb-4">

									<select  v-model="form.gender" class="select form-control w-full ">
										<option value="Male" selected>Male</option>
										<option value="Female">Female</option>
									</select>
									<small v-if="form.errors.gender " class="text-danger my-1 " v-text="form.errors.gender ">  </small>

								</div>
								
								<!-- age -->
								<div class="mb-4">
								
									<input type="number" v-model="form.age" min="18" max="25" class="form-control" placeholder="Age" >
									
									<small v-if="form.errors.age " class="text-danger  " v-text="form.errors.age ">  </small>

								</div>

								<!-- photo -->
								<div class="mb-3 ">

									<input type="file"  class="form-control form-control-sm mb-1 w-full py-2 border border-1 " id="formFileSm" @change="previewImage" >
									
									<img v-if="url" :src="url" id="image-preview" class=" border my-2 rounded rounded-1 " style="object-fit:cover;" width="90"  height="90"  alt="">
									
									<!-- <progress v-if="form.progress" :value="form.progress.percentage" max="100">
									{{ form.progress.percentage }}%
									</progress> -->
																
								</div>
							
								<!-- save -->
																		
								<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
																				
									<button type="submit" :disabled="form.processing" class="btn btn-primary btn-md w-100">Save</button>
																		
								</div>

																
						</form>
					</div>

													
					</div>
						<div class="col-md-6 ">
							<img src="../../../imgs/student1.svg"
							class="img-fluid " alt="Sample image">
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

import {useForm} from '@inertiajs/inertia-vue3'
import { ref } from '@vue/reactivity'

let props = defineProps({
	school_level:Array,
	errors:Object
})
	let InputKey =ref(0);
	 const form =useForm({
	     first_name:'',
	     last_name:'',
	     gender:'',
		 age:'',
		 level_school:'',
	     photo:null,
	 })

	 let url = ref(null)

	
	 let previewImage = (e) =>{
		
		 const file = e.target.files[0];
		 form.photo = file
         url.value = URL.createObjectURL(file);
	
	 }
	 let addStudent = () => {

			form.post(route('student.store'),{
				forceFormData: true,
				onSuccess : ()=> {
					form.reset()
					InputKey.value += 1
					document.getElementById('image-preview').style.display='none'
				},
				onError : (err)=> {console.log(err);},
				
			});
	 }
</script>

<style>

</style>