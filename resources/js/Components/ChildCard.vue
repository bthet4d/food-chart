<template>
    <div class="bg-white overflow-hidden shadow rounded-lg">
      <div class="px-4 py-5 sm:p-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">{{ child.name }}</h3>
        <!-- Add more child details here -->
      </div>
    </div>
  </template>
  
  <script setup>
  
  // Define props using Composition API
  const props = defineProps({
    child: Object,
  })
  </script>