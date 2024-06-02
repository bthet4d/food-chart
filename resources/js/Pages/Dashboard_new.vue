<template>
<div>
  <div class="flex flex-col min-h-screen">
    <div class="bg-white shadow-md">
      <nav class="flex items-center h-12 px-4"></nav>
    </div>
    <div class="flex flex-grow bg-gradient-to-r from-pink-300 via-purple-300 to-indigo-300">
      <aside class="flex-shrink-0 w-64 bg-white shadow-md">
        <div class="h-full p-4">
          <div class="mb-4 text-lg font-bold text-gray-600">Menu</div>
        </div>
      </aside>
      <main class="flex-grow p-8">
        <div class="mb-6">
          <p class="text-xl font-bold text-gray-600">Dashboard</p>
          <div class="mt-4">
            <div class="p-4 mb-8 bg-white rounded-lg shadow-md">
              <div class="text-gray-600">Column 1 content</div>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
              <div class="p-4 text-gray-600 bg-white rounded-lg shadow-md">Column 1 content</div>
              <div class="p-4 text-gray-600 bg-white rounded-lg shadow-md">Column 2 content</div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <footer class="flex items-center justify-center h-12 bg-white shadow-md">
      <!-- Footer Content -->
    </footer>
  </div>
</div>
</template>

<script>
import { ref } from 'vue';

export default {
    name: 'Dashboard',
    setup() {
        const message = ref('Hello, Vue 3 Composition API!');
        
        return {
            message
        };
    }
};
</script>

<style scoped>
/* Add your styles here */
</style>