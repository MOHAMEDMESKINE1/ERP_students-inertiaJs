<template>
   <div id="alert">
     <div v-if="$page.props.flash.message" class="alert alert-info  fade show" role="alert">
        <strong>{{$page.props.flash.message}}</strong> 
    </div>
   </div>
    
</template>

<script>
// setTimeout(() => {
//    document.getElementById('alert').style.display="none";

// }, 2000);
</script>

<style>

</style>