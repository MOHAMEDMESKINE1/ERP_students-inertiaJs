<template>
        <div class="d-flex justify-content-center my-5  " v-if="links.length">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    :disabled="link.url === null"
                    class="mr-1 mb-1 px-4 py-1 text-sm border border-secondary cursor-pointer rounded"
                    v-html="link.label"
                />

                <Link
                    v-else
                    class="mr-1 mb-1 px-4 py-1 text-sm  border border-secondary rounded"
                    :class="{ 'bg-primary text-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
       
 </template>
 
 <script setup>
 defineProps({
   links:Array
   })
 </script>
 
 <style>
 
 </style>