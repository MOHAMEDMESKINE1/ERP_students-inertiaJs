<template>
  <AuthLayout>
      <!-- flash message -->
        <div class="my-5 d-flex justify-content-center w-full">
          <FlashMessage/>
        </div>
      <!-- flash message -->
      <section>
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
        <div class="row gx-lg-5 align-items-center mb-5">
          <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
            <h1 class="my-5 display-5 fw-bold ls-tight text-primary" style="color: hsl(218, 81%, 95%)">
             Students Managment <br />
              <span style="color: hsl(218, 81%, 75%)">for your business</span>
            </h1>
            <p class="mb-4 display-4 " style="color: hsl(218, 81%, 85%)">
              Make Your School Esay To Manage 
            </p>
          </div>

          <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
            <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
            <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

            <div class="card bg-glass  ">
              <div class="card-body px-4 py-5 px-md-5">
                <form @submit.prevent="login">
                 

                  <!-- Email input -->
                  <div class="form-outline mb-4 text-left">
                    <label class="form-label" for="form3Example3">Email address</label>
                    <input type="email" v-model="form.email" id="form3Example3" class="form-control"  />
                    <small v-if="errors.email " class="text-danger my-1  " v-text="errors.email ">  </small>

                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4 text-left">
                    <label class="form-label " for="form3Example4">Password</label>
                    <input type="password" v-model="form.password" id="form3Example4" class="form-control"  />
                    <small v-if="errors.password " class="text-danger my-1  " v-text="errors.password ">  </small>

                  </div>

                 

                <div class="d-flex flex-col  justify-content-center">
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary w-75 p-1  mb-4 mr-2">
                    Sign In
                  </button>

                 <Link :href="route('registerForm')" class="text-center btn btn-success p-1  w-75  mb-4">
                     Register Now ! 
                 </Link>
                </div>
                  
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </AuthLayout>
</template>
<script>
import AuthLayout from "./AuthLayout.vue";
import FlashMessage from '../../Layouts/Partials/FlashMessage.vue'
export default {
  
  layout:AuthLayout
}
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

  defineProps({
    errors:Object
  })
  const form =useForm({
    email: '',
    password: ''
   })

   const login = ()=>{
      form.post(route('authenticate'));
   }

</script>

<style>
.background-radial-gradient {
  background-color: hsl(218, 41%, 15%);
  background-image: radial-gradient(650px circle at 0% 0%,
      hsl(218, 41%, 35%) 15%,
      hsl(218, 41%, 30%) 35%,
      hsl(218, 41%, 20%) 75%,
      hsl(218, 41%, 19%) 80%,
      transparent 100%),
    radial-gradient(1250px circle at 100% 100%,
      hsl(218, 41%, 45%) 15%,
      hsl(218, 41%, 30%) 35%,
      hsl(218, 41%, 20%) 75%,
      hsl(218, 41%, 19%) 80%,
      transparent 100%);
}

#radius-shape-1 {
  height: 220px;
  width: 220px;
  top: -60px;
  left: -130px;
  background: radial-gradient(#44006b, #ad1fff);
  overflow: hidden;
}

#radius-shape-2 {
  border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
  bottom: -60px;
  right: -110px;
  width: 300px;
  height: 300px;
  background: radial-gradient(#44006b, #ad1fff);
  overflow: hidden;
}

.bg-glass {
  background-color: hsla(0, 0%, 100%, 0.9) !important;
  backdrop-filter: saturate(200%) blur(25px);
}
</style>