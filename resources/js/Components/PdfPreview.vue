<template>
  <div>
    <div v-if="!fullScreen" @click="toggleFullScreen" class="w-full h-full flex justify-center items-center">
      
    <div class="p-1 bg-white text-center text-xs md:text-xl font-bold rounded border-2 hover:border-gray-400 transition duration-300">
      <img :src="pdfImage" alt="Thumbnail" class="cursor-pointer h-32 md:h-48 w-screen" />
      <p >{{ pdfName }}</p>
    </div>

    
    

    </div>
    <div v-else class="fixed left-0 w-full h-full z-50 bg-gray-900 bg-opacity-90 flex justify-center pt-10">
      <button @click="toggleFullScreen" class="absolute top-4 right-4 text-white cursor-pointer"><i class="material-icons">close</i></button>
      <iframe  class="md:w-1/2 " :src="pdfUrl" type="application/pdf"></iframe>
    </div>
  </div>
</template>

<script setup>
import { defineProps, ref } from 'vue';
import Card from 'primevue/card';

const props = defineProps({
  pdfUrl: {
    type: String,
    required: true
  },
  pdfImage: {
    type: String,
    required: true
  },
  pdfName: {
    type: String,
    required: true
  }
});

const fullScreen = ref(false);

function toggleFullScreen() {
  fullScreen.value = !fullScreen.value;
}
</script>

<style scoped>
/* Add any Tailwind CSS classes or custom styles here */
</style>
